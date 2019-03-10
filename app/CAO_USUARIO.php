<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAO_USUARIO extends Model
{

    /**
     * primaryKey 
     * 
     * @var integer
     * @access protected
     */
    protected $primaryKey = null;
    
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cao_usuario';
    
    public function permissoes()
    {
        return $this->hasMany('App\PERMISSAO_SISTEMA', 'co_usuario', 'co_usuario');
    }
    
}
