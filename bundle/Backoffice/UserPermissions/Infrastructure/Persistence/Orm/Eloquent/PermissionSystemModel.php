<?php

namespace Backoffice\UserPermissions\Infrastructure\Persistence\Orm\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $co_usuario
 * @property integer $co_tipo_usuario
 * @property integer $co_sistema
 * @property string $co_usuario_atualizacao
 * @property string $dt_atualizacao
 * @property string $in_ativo
 */
class PermissionSystemModel extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'permissao_sistema';

    /**
     * @var array
     */
    protected $fillable = ['co_usuario_atualizacao', 'dt_atualizacao', 'in_ativo'];

}
