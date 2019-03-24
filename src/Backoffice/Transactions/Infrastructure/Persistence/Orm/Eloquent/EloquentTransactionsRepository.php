<?php

namespace Backoffice\Transactions\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Transactions\Domain\Repositories\TransactionsRepository;
use Backoffice\Transactions\Domain\ValueObject\TransactionsId;
use Backoffice\Transactions\Domain\Entity\Transactions;
use Backoffice\Transactions\Infrastructure\Persistence\Orm\Eloquent\EloquentTransactionsModel;
use Shared\Application\Request\Common\PaginationUtils;

class EloquentTransactionsRepository implements TransactionsRepository {

    /**
     *
     * @var EloquentTransactionsModel 
     */
    private $model;

    public function __construct(EloquentTransactionsModel $model) {
        $this->model = $model;
    }

    public function add(Transactions $transaction) {

        $this->model->buyerId = $transaction->getBuyerId();
        $this->model->wayPaymentId = $transaction->getWayPaymentId();
        $this->model->status_payment = $transaction->getStatusPayment();
        $this->model->amount = $transaction->getAmount();

        $this->model->save();

        return $this->model->transactionId;
    }

    public function save(Transactions $transaction) {
        
    }

    public function findByTransactionsId(TransactionsId $transactionId): Transactions {
        
    }

    public function nextIdentity(): TransactionsId {
        return new TransactionsId();
    }

    public function transactionsById(int $transactionId): int {
        
    }

    public function getAll() {

        return $this->model->with('buyer:buyerId,name,mail')
                        ->with('wayPayment:wayPaymentId,name')
                        ->orderBy('transactionId', 'DESC')
                        ->paginate(PaginationUtils::LIMIT);
    }

}
