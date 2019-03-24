<?php

namespace Backoffice\Transactions\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Transactions\Infrastructure\Persistence\Orm\Eloquent\EloquentBaseModel;

/**
 * @property int $transactionId
 * @property int $buyerId
 * @property int $wayPaymentId
 * @property string $status_payment
 * @property int $amount
 * @property string $createdDate
 * @property string $modifiedDate
 * @property Buyer $buyer
 * @property WayPayment $wayPayment
 * @property TransactionsCardDetail[] $transactionsCardDetails
 * @property TransactionsSlipDetail[] $transactionsSlipDetails
 */
class EloquentTransactionsModel extends EloquentBaseModel
{
    
    /** @var string */
    protected $table = 'transactions';    
    
    protected $hidden = ['modifiedDate', 'buyerId', 'wayPaymentId'];
    
    protected $status_payment_label = ['created' => 'AGUARDANDO', 'done' =>'PAGO', 'fail' => 'NÃO PAGO'];

    protected $appends = ['createdDate'];
    
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'transactionId';

    /**
     * @var array
     */
    protected $fillable = ['buyerId', 'wayPaymentId', 'status_payment', 'amount', 'createdDate', 'modifiedDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo('Backoffice\Buyers\Infrastructure\Persistence\Orm\Eloquent\EloquentBuyerModel', 'buyerId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wayPayment()
    {
        return $this->belongsTo('Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent\EloquentWayPaymentsModel', 'wayPaymentId', 'wayPaymentId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionsCardDetails()
    {
        return $this->hasMany('Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent\EloquentCardDetailsModel', 'transactionId', 'transactionId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionsSlipDetails()
    {
        return $this->hasMany('App\TransactionsSlipDetail', 'transactionId', 'transactionId');
    }
    
    public function getStatusPaymentAttribute(){
        
        return $this->status_payment_label[$this->attributes['status_payment']];
        
    }

    public function getCreatedDateAttribute(){
        
        return \Carbon\Carbon::parse($this->attributes['createdDate'])->format('d/m/Y');
        
    }
    
    public function getAmountAttribute(){
        
      return number_format($this->attributes['amount'], 2, ',', '.');
        
    }    
    
}
