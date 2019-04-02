<?php

namespace Backoffice\Consultant\Application\Command;

class QueryConsultantByPerformanceCommand {
    
    /** @var array */
    private $data;
    
    /** @var array */
    private $filter;
     
    public function __construct($filter = []) {
       $this->filter = $filter; 
    }
    
    public function setData(array $data) {
      $this->data = $data;  
    }
    
    public function getData(): array {
        return $this->data;
    }    
    
    public function getFilter(): array  {
        return $this->filter;
    }

}