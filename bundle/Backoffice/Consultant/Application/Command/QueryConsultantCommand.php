<?php

namespace Backoffice\Consultant\Application\Command;

class QueryConsultantCommand {
    
    /** @var array */
    private $data;
     
    public function setData(array $data) {
      $this->data = $data;  
    }
    
    public function getData(): array {
        return $this->data;
    }    

}