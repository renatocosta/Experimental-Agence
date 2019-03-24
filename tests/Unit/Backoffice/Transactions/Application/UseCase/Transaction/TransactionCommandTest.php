<?php

namespace Tests\Unit\Backoffice\Transactions\Application\UseCase\Transaction;

use Tests\TestCase;
use Backoffice\Transactions\Domain\Repositories\TransactionsRepository;
use Backoffice\Payments\Domain\Repositories\CardDetailsRepository;
use Backoffice\Payments\Domain\Repositories\SlipDetailsRepository;
use Tests\Unit\Backoffice\Transactions\Domain\Entity\Transaction\TransactionsTest;
use Backoffice\Transactions\Application\Command\CreateTransactionCommand;
use Backoffice\Transactions\Application\Command\Handler\CreateTransactionCommandHandler;
use Backoffice\Payments\Application\Command\Handler\CreateCreditCardTransactionCommandHandler;
use Backoffice\Payments\Application\Command\CreateCreditCardTransactionCommand;
use Backoffice\Payments\Application\Command\Handler\CreateSlipTransactionCommandHandler;
use Backoffice\Payments\Application\Command\CreateSlipTransactionCommand;

class TransactionCommandTest extends TestCase
{

    private $fixture = [];
    
    private $slipNumber;
    
    public function setUp()
    {
        
        $this->fixture['transactionRepo'] = self::getMockBuilder(TransactionsRepository::class)
            ->setMethods(['add', 'transactionsById', 'nextIdentity', 'save', 'getAll'])->getMock();
        
        $this->fixture['creditCardRepo'] = self::getMockBuilder(CardDetailsRepository::class)
            ->setMethods(['add', 'findByTransactionsId', 'nextIdentity', 'save',])->getMock();

        $this->fixture['slipRepo'] = self::getMockBuilder(SlipDetailsRepository::class)
            ->setMethods(['add', 'findByTransactionsId', 'nextIdentity', 'save', 'getNumber'])->getMock();
        
        $this->fixture['transaction'] = TransactionsTest::create(9, 2, '', 0);
        
        $this->fixture['transactionRepo']->method('getAll')->willReturn($this->fixture['transaction']);
        $this->fixture['transactionRepo']->method('add')->willReturn($this->fixture['transaction']->getTransactionId());
        $this->fixture['creditCardRepo']->method('add')->willReturn($this->fixture['transaction']->getTransactionId());
        $this->fixture['slipRepo']->method('add')->willReturn($this->fixture['transaction']->getTransactionId());
        $this->slipNumber = TransactionsTest::getRandomNumber();
        
        $this->fixture['transactionHandler'] = new CreateTransactionCommandHandler($this->fixture['transactionRepo']); 
        $this->fixture['creditCardHandler'] = new CreateCreditCardTransactionCommandHandler($this->fixture['creditCardRepo']); 
        $this->fixture['slipHandler'] = new CreateSlipTransactionCommandHandler($this->fixture['slipRepo']); 
        
    }    
    
    public function testShouldCreateTransaction()
    {
        
        $transaction = $this->fixture['transaction'];
        
        $command = new CreateTransactionCommand($transaction->getBuyerId(), $transaction->getWayPaymentId(), $transaction->getAmount()); 
        $this->fixture['transactionHandler']->handle($command);
        
        $this->assertEquals($this->fixture['transaction']->getTransactionId(), $command->getTransactionId());
        $this->assertEquals($this->fixture['transaction']->getBuyerId(), $command->getBuyerId());
        $this->assertEquals($this->fixture['transaction']->getWayPaymentId(), $command->getWayPaymentId());
        $this->assertEquals($this->fixture['transaction']->getAmount(), $command->getAmount());   
        
        return $command->getTransactionId();
        
    }
    
    /**
     * @depends testShouldCreateTransaction
     */
    public function testShouldCreateTransactionWithNewCreditCard(int $transactionId)
    {

        $this->fixture['creditCard'] = TransactionsTest::createCreditCard($transactionId);
        
        $creditCard = $this->fixture['creditCard'];
        $command = new CreateCreditCardTransactionCommand($transactionId, $creditCard->getHolderName(), $creditCard->getNumber(), $creditCard->getExpirationDate(), $creditCard->getCvv()); 
        $this->fixture['creditCardHandler']->handle($command);
         
        $this->assertEquals($transactionId, $command->getTransactionId());
        
    }    
    
    /**
     * @depends testShouldCreateTransaction
     */
    public function testShouldCreateTransactionWithNewSlip(int $transactionId)
    {
        
        $this->fixture['slipRepo']->method('getNumber')->willReturn($this->slipNumber);
        $this->fixture['slip'] = TransactionsTest::createSlip($transactionId);
        $command = new CreateSlipTransactionCommand($transactionId); 
        
        $this->fixture['slipHandler']->handle($command);
         
        $this->assertEquals($transactionId, $command->getTransactionId());
        $this->assertEquals($this->slipNumber, $command->getNumber());
        
    }        
    
}
