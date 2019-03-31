<?php

namespace Backoffice\Client\Application\Command;
use Backoffice\Client\Domain\Services\ClientByPerformanceServiceContract;

class ClientByPerformanceCalculationsCommand {
    
    /** @var array */
    private $data;
    
    private $service;
     
    public function __construct($data = []) {
       $this->data = $data; 
    }
    
    public function getData() {
        return $this->data;
    } 
    
    public function setService(ClientByPerformanceServiceContract $service){
       $this->service = $service; 
    }
    
    public function getDataService(): ClientByPerformanceServiceContract {
        return $this->service;
    } 

}