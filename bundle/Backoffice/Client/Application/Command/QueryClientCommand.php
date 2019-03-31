<?php

namespace Backoffice\Client\Application\Command;

class QueryClientCommand {
    
    /** @var array */
    private $data;
     
    public function setData(array $data) {
      $this->data = $data;  
    }
    
    public function getData(): array {
        return $this->data;
    }    

}