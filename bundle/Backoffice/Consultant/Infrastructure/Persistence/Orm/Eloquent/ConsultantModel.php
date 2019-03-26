<?php

namespace Backoffice\Consultant\Infrastructure\Persistence\Orm\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $co_usuario
 * @property string $co_usuario_autorizacao
 * @property string $ds_bairro
 * @property string $ds_comp_end
 * @property string $ds_endereco
 * @property string $ds_senha
 * @property string $dt_admissao_empresa
 * @property string $dt_alteracao
 * @property string $dt_desligamento
 * @property string $dt_expedicao
 * @property string $dt_expiracao
 * @property string $dt_inclusao
 * @property string $dt_nascimento
 * @property int $icq
 * @property string $instant_messenger
 * @property string $msn
 * @property string $no_cidade
 * @property string $no_email
 * @property string $no_email_pessoal
 * @property string $no_orgao_emissor
 * @property string $no_usuario
 * @property string $nu_cep
 * @property string $nu_cpf
 * @property integer $nu_matricula
 * @property string $nu_rg
 * @property string $nu_telefone
 * @property string $uf_cidade
 * @property string $uf_orgao_emissor
 * @property string $url_foto
 * @property string $yms
 * @property CaoConhecimento[] $caoConhecimentos
 * @property CaoHistOcorrenciasO[] $caoHistOcorrenciasOs
 * @property CaoPermissao[] $caoPermissaos
 * @property CaoPontosConhecimento[] $caoPontosConhecimentos
 * @property CaoSalarioPag[] $caoSalarioPags
 */
class ConsultantModel extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cao_usuario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'co_usuario';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['co_usuario_autorizacao', 'ds_bairro', 'ds_comp_end', 'ds_endereco', 'ds_senha', 'dt_admissao_empresa', 'dt_alteracao', 'dt_desligamento', 'dt_expedicao', 'dt_expiracao', 'dt_inclusao', 'dt_nascimento', 'icq', 'instant_messenger', 'msn', 'no_cidade', 'no_email', 'no_email_pessoal', 'no_orgao_emissor', 'no_usuario', 'nu_cep', 'nu_cpf', 'nu_matricula', 'nu_rg', 'nu_telefone', 'uf_cidade', 'uf_orgao_emissor', 'url_foto', 'yms'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function caoConhecimentos()
    {
        return $this->hasMany('App\CaoConhecimento', 'usuario', 'co_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function caoHistOcorrenciasOs()
    {
        return $this->hasMany('App\CaoHistOcorrenciasO', 'co_usuario', 'co_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function PermissionsSystem()
    {
        return $this->hasMany('Backoffice\UserPermissions\Infrastructure\Persistence\Orm\Eloquent\PermissionSystemModel', 'co_usuario', 'co_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function caoPontosConhecimentos()
    {
        return $this->hasMany('App\CaoPontosConhecimento', 'co_coordenador', 'co_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function caoSalarioPags()
    {
        return $this->hasMany('App\CaoSalarioPag', 'co_usuario', 'co_usuario');
    }
}
