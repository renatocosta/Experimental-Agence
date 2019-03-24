<?php

namespace Backoffice\Transactions\Application\Command;

class QueryTransactionCommand {
    
    /** @var array */
    private $data;
    
    public function setData(array $data) {
      $this->data = $data;  
    }
    
    public function getData(): array {
        return $this->data;
    }

}