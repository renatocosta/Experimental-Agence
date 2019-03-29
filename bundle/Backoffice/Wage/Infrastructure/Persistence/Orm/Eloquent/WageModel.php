<?php

namespace Backoffice\Wage\Infrastructure\Persistence\Orm\Eloquent;

use Illuminate\Database\Eloquent\Model;

class WageModel extends Model
{

   /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cao_salario';

    /**
     * @var array
     */
    protected $fillable = ['brut_salario', 'co_usuario', 'dt_alteracao', 'liq_salario'];
    
    
}