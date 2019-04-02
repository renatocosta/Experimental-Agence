<?php

namespace Backoffice\Invoice\Infrastructure\Persistence\Orm\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $co_fatura
 * @property int $co_cliente
 * @property int $co_os
 * @property int $co_sistema
 * @property float $comissao_cn
 * @property string $corpo_nf
 * @property string $data_emissao
 * @property int $num_nf
 * @property float $total
 * @property float $total_imp_inc
 * @property float $valor
 */
class InvoiceModel extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cao_fatura';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'co_fatura';

    /**
     * @var array
     */
    protected $fillable = ['co_cliente', 'co_os', 'co_sistema', 'comissao_cn', 'corpo_nf', 'data_emissao', 'num_nf', 'total', 'total_imp_inc', 'valor'];

}