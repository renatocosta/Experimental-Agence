<?php

namespace Tests\Unit\Backoffice\Transactions\Domain\Entity\Transaction;

use Tests\TestCase;
use Backoffice\Transactions\Domain\Entity\Transactions;
use Backoffice\Transactions\Domain\ValueObject\TransactionsStatus;
use Backoffice\Payments\Domain\Entity\CreditCard;
use Backoffice\Payments\Domain\Entity\Slip;

class TransactionsTest extends TestCase
{
    
    const transactionIdDefault = 300;
    
    /**
     * @group unit
     */
    public function testGettersTransaction()
    {
        $transaction = new Transactions(
            0,
            $buyerId = 2,
            $wayPaymentId = 8,
            $status = TransactionsStatus::CREATED,
            $amount = 10.24
        );
        
        self::assertNotNull($transaction->getBuyerId());
        self::assertNotNull($transaction->getWayPaymentId());        
        self::assertNotNull($transaction->getStatusPayment());        
        self::assertNotNull($transaction->getAmount());        
        
    }
    
    public static function create(int $buyerId, int $wayPaymentId, string $status = TransactionsStatus::CREATED, $amount = 0)
    {
        
        $transaction = new Transactions(0, 
                                 $buyerId ?? 1, 
                                 $wayPaymentId ?? 8, 
                                 $status, 
                                 $amount ?? 60.00);
        
        $transaction->setTransactionId(self::transactionIdDefault);
        
        return $transaction;
        
    }
  
    public static function createCreditCard($transactionId, $holderName = null, $number = null, $expiration_date = null, $cvv = null)
    {
        
       return new CreditCard($transactionId, 
                             $holderName ?? "José Gomes da Silva",
                             $number ?? "8683738783.7868768722.1111111",
                             $expiration_date ?? "2020-01-01", 
                             $cvv ?? "333");        
        
    }  
    
    public static function createSlip($transactionId)
    {
        
       return new Slip($transactionId);        
        
    }     
 
    public static function getRandomNumber(){
        return str_pad(mt_rand(1,99999999),10,'0',STR_PAD_LEFT);        
    }
    
}