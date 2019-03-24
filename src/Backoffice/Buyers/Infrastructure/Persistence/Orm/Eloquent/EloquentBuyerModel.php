<?php

namespace Backoffice\Buyers\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Buyers\Infrastructure\Persistence\Orm\Eloquent\EloquentBaseModel;

/**
 * @property int $buyerId
 * @property string $name
 * @property string $mail
 * @property string $cpf
 * @property string $createdDate
 * @property string $modifiedDate
 * @property int $clientId
 * @property Client $client
 * @property Transaction[] $transactions
 */
class EloquentBuyerModel extends EloquentBaseModel {

    /** @var string */
    protected $table = 'buyers';

    protected $hidden = ['modifiedDate', 'buyerId'];        
    
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'buyerId';

    /**
     * @var array
     */
    protected $fillable = ['name', 'mail', 'cpf', 'createdDate', 'modifiedDate', 'clientId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client() {
        return $this->belongsTo('App\Client', 'clientId', 'clientId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions() {
        return $this->hasMany('App\Transaction', 'buyerId', 'buyerId');
    }

}
