<?php

namespace Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Buyers\Infrastructure\Persistence\Orm\Eloquent\EloquentBaseModel;

/**
 * @property int $transactionsSlipDetailsId
 * @property string $number
 * @property int $transactionId
 * @property Transaction $transaction
 */
class EloquentSlipDetailsModel extends EloquentBaseModel
{
    
    /** @var string */
    protected $table = 'transactions_slip_details';        
    
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'transactionsSlipDetailsId';

    protected $guarded = ['number'];    
    
    protected $hidden = ['modifiedDate', 'createdDate', 'transactionsSlipDetailsId', 'transactionId'];        
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo('\Backoffice\Transactions\Infrastructure\Persistence\Orm\Eloquent\EloquentTransactionsModel', 'transactionId', 'transactionId');
    }
    
    /**
     * Set slip fake.
     *
     * @return void
     */
    public function setNumberAttribute($value)
    {
        $this->attributes['number'] = str_pad(mt_rand(1,99999999),10,'0',STR_PAD_LEFT);
    }
    
    public function getNumberAttribute(){
        return substr($this->attributes['number'], 0, 10) . "...";
    }    
    
}
