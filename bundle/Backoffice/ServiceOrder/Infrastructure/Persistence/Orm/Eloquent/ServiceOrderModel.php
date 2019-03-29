<?php

namespace Backoffice\ServiceOrder\Infrastructure\Persistence\Orm\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $co_os
 * @property int $co_arquitetura
 * @property int $co_email
 * @property int $co_os_prospect_rel
 * @property int $co_sistema
 * @property int $co_status
 * @property string $co_usuario
 * @property string $ddd_tel_sol
 * @property string $ddd_tel_sol2
 * @property string $diretoria_sol
 * @property string $ds_caracteristica
 * @property string $ds_os
 * @property string $ds_requisito
 * @property string $dt_fim
 * @property string $dt_garantia
 * @property string $dt_imp
 * @property string $dt_inicio
 * @property string $dt_sol
 * @property int $nu_os
 * @property string $nu_tel_sol
 * @property string $nu_tel_sol2
 * @property string $usuario_sol
 * @property CaoHistOcorrenciasO[] $caoHistOcorrenciasOs
 */
class ServiceOrderModel extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cao_os';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'co_os';

    /**
     * @var array
     */
    protected $fillable = ['co_arquitetura', 'co_email', 'co_os_prospect_rel', 'co_sistema', 'co_status', 'co_usuario', 'ddd_tel_sol', 'ddd_tel_sol2', 'diretoria_sol', 'ds_caracteristica', 'ds_os', 'ds_requisito', 'dt_fim', 'dt_garantia', 'dt_imp', 'dt_inicio', 'dt_sol', 'nu_os', 'nu_tel_sol', 'nu_tel_sol2', 'usuario_sol'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function caoHistOcorrenciasOs()
    {
        return $this->hasMany('App\CaoHistOcorrenciasO', 'co_os', 'co_os');
    }
}