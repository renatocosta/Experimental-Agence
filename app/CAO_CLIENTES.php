<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAO_CLIENTES extends Model
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
    protected $table = 'cao_cliente';
    
}
