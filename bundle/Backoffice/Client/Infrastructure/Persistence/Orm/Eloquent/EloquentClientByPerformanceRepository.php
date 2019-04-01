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

        $query = DB::table("cao_cliente AS c")
                ->select('c.co_cliente',
                        'c.no_razao AS user',
                        DB::raw('ROUND(fat.valor - (fat.total_imp_inc * fat.valor) / 100, 2) AS net_income'))
                ->join('cao_fatura AS fat', function ($join) {
                    $join->on('c.co_cliente', '=', 'fat.co_cliente');
                })                
                ->join('cao_os AS os', function ($join) {
                    $join->on('fat.co_os', '=', 'os.co_os');
                });

        if (!empty($criteria['user'])) {
            $query->whereIn('c.co_cliente', $criteria['user']);
        }

        if (!empty($criteria['period'])) {

            if (!empty($criteria['period']['start'])) {
                $query->where('dt_sol', '>=', $criteria['period']['start'] . ' 00:00:00');
            }

            if (!empty($criteria['period']['end'])) {
                $query->where('dt_sol', '<=', $criteria['period']['end'] . '23:59:59');
            }
        }

        return $query;
        
    }

    /**
     * Building a query to get the results
     * @param string $raw_query_invoice
     * @return model
     */
    private function getResult($raw_query_invoice) {

        $query = DB::table(DB::raw("(" . $raw_query_invoice->toSql() . ") as tab_result"))
                        ->select(
                                'user',
                                DB::raw('SUM(net_income) AS net_income')
                        )
                        ->mergeBindings($raw_query_invoice)
                        ->groupBy('co_cliente')->orderBy('net_income', 'DESC')->get();

        return $query;
    }

    public function getByCriteria($filter = []) {

        $net_invoice = $this->getQueryInvoice($filter);
        $result = $this->getResult($net_invoice);

        return $result;
    }

}
