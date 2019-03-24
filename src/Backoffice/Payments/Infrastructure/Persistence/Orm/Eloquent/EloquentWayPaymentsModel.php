<?php

namespace Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Backoffice\Transactions\Infrastructure\Persistence\Orm\Eloquent\EloquentBaseModel;

/**
 * @property int $wayPaymentId
 * @property string $name
 * @property string $description
 * @property string $createdDate
 * @property string $modifiedDate
 * @property Transaction[] $transactions
 */
class EloquentWayPaymentsModel extends EloquentBaseModel
{
    
    /** @var string */
    protected $table = 'way_payments';    
    
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'wayPaymentId';

    protected $hidden = ['modifiedDate', 'wayPaymentId'];    
    
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'createdDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction', 'wayPaymentId', 'wayPaymentId');
    }
}
