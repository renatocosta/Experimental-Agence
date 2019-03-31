<?php

namespace Backoffice\Client\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Client\Domain\Repositories\ClientByPerformanceRepository;
use Backoffice\Client\Infrastructure\Persistence\Orm\Eloquent\ClientModel;
use Backoffice\UserPermissions\Domain\ValueObject\UserTypes;
use Illuminate\Support\Facades\DB;

class EloquentClientByPerformanceRepository implements ClientByPerformanceRepository {

    /**
     *
     * @var ClientModel 
     */
    private $model;

    public function __construct(ClientModel $model) {
        $this->model = $model;
    }

    /**
     * Building a raw query to get invoice rows
     * @param array $criteria
     * @return model
     */
    private function getQueryInvoice($criteria = []) {

        $query = DB::table("cao_usuario AS u")
                ->select('u.co_usuario',
                        'os.co_os',
                        'os.co_sistema',
                        'os.dt_sol',
                        'fat.valor',
                        'fat.total_imp_inc',
                        'sal.brut_salario AS fixed_cost_Client',
                        DB::raw('ROUND(fat.valor - (fat.total_imp_inc * fat.valor) / 100, 2) AS net_value_invoice'),
                        'fat.comissao_cn AS comissao_percent')
                ->join('permissao_sistema AS ps', function ($join) {
                    $join->on('u.co_usuario', '=', 'ps.co_usuario');
                })
                ->join('cao_os AS os', function ($join) {
                    $join->on('u.co_usuario', '=', 'os.co_usuario');
                })
                ->join('cao_fatura AS fat', function ($join) {
                    $join->on('os.co_os', '=', 'fat.co_os');
                })
                ->join('cao_salario AS sal', function ($join) {
                    $join->on('u.co_usuario', '=', 'sal.co_usuario');
                })
                ->where('ps.in_ativo', 'S')
                ->where('ps.co_sistema', 1)
                ->whereIn('ps.co_tipo_usuario', UserTypes::TYPES);

        if (!empty($criteria['user'])) {
            $query->whereIn('u.co_usuario', $criteria['user']);
        }

        if (!empty($criteria['period'])) {

            if (!empty($criteria['period']['start'])) {
                $query->where('dt_sol', '>=', $criteria['period']['start'] .' 00:00:00');
            }

            if (!empty($criteria['period']['end'])) {
                $query->where('dt_sol', '<=', $criteria['period']['end'] . '23:59:59');
            }
        }

        return $query;
    }

    /**
     * Building a raw query to get comission rows
     * @param string $raw_query_net_invoice
     * @return model
     */
    private function getQueryComission($raw_query_net_invoice) {

        $query = DB::table(DB::raw("(" . $raw_query_net_invoice . ") as tab_invoice"))
                ->select('co_usuario',
                'co_os',
                'co_sistema',
                'dt_sol',
                'valor',
                'total_imp_inc',
                'fixed_cost_Client',
                'net_value_invoice',
                DB::raw('ROUND((comissao_percent * net_value_invoice / 100), 2) AS commisson'));

        return $query;
    }

    /**
     * Building a raw query to sum all of comission rows
     * @param string $raw_query_comission
     * @return model
     */
    private function getResultBySum($raw_query_comission) {

        $query = DB::table(DB::raw("(" . $raw_query_comission . ") as tab_sum"))
                        ->select(
                                DB::raw('MAX(co_usuario) AS user'),
                                DB::raw('SUM(net_value_invoice) AS net_value_invoice'),
                                DB::raw('SUM(fixed_cost_Client) AS fixed_cost_Client'),
                                DB::raw('SUM(commisson) AS commisson')
                        )->groupBy('co_usuario');

        return $query;
    }

    /**
     * Building a query to get the results
     * @param model $bindings
     * @param string $raw_query_sum
     * @return model
     */
    private function getResult($bindings, $raw_query_sum) {

        $query = DB::table(DB::raw("(" . $raw_query_sum . ") as tab_result"))
                        ->select(
                                'user',
                                DB::raw('MAX(net_value_invoice) AS net_value_invoice'),
                                DB::raw('ROUND(MAX(fixed_cost_Client), 2) AS fixed_cost_Client'),
                                DB::raw('MAX(commisson) AS commisson'),
                                DB::raw('ROUND(MAX(net_value_invoice - (fixed_cost_Client + commisson)), 2) AS net_income')
                        )
                        ->mergeBindings($bindings)
                        ->groupBy('user')->get();

        return $query;
    }

    public function getByCriteria($filter = []) {

        $net_invoice = $this->getQueryInvoice($filter);
        $comission = $this->getQueryComission($net_invoice->toSql());
        $sum = $this->getResultBySum($comission->toSql());
        $result = $this->getResult($net_invoice, $sum->toSql());
        
        return $result;
    }    

}
