<?php

namespace Backoffice\Consultant\Application\Command;
use Backoffice\Consultant\Domain\Services\ConsultantByPerformanceServiceContract;

class ConsultantByPerformanceCalculationsCommand {
    
    /** @var array */
    private $data;
    
    private $service;
     
    public function __construct($data = []) {
       $this->data = $data; 
    }
    
    public function getData() {
        return $this->data;
    } 
    
    public function setService(ConsultantByPerformanceServiceContract $service){
       $this->service = $service; 
    }
    
    public function getDataService(): ConsultantByPerformanceServiceContract {
        return $this->service;
    } 

}