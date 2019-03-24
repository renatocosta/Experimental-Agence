<?php

namespace Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Buyers\Infrastructure\Persistence\Orm\Eloquent\EloquentBaseModel;

/**
 * @property int $transactionCardDetailsId
 * @property string $holder_name
 * @property string $number
 * @property string $expiration_date
 * @property string $cvv
 * @property int $transactionId
 * @property string $createdDate
 * @property string $modifiedDate
 * @property Transaction $transaction
 */
class EloquentCardDetailsModel extends EloquentBaseModel
{
    
    /** @var string */
    protected $table = 'transactions_card_details';    
    
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'transactionCardDetailsId';

    /**
     * @var array
     */
    protected $fillable = ['holder_name', 'number', 'expiration_date', 'cvv', 'transactionId', 'createdDate', 'modifiedDate'];

    protected $hidden = ['modifiedDate', 'cvv', 'expiration_date','createdDate', 'transactionCardDetailsId', 'transactionId'];    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo('\Backoffice\Transactions\Infrastructure\Persistence\Orm\Eloquent\EloquentTransactionsModel', 'transactionId', 'transactionId');
    }
    
    public function getNumberAttribute(){
        return substr($this->attributes['number'], 0, 10) . "...";
    }
}
