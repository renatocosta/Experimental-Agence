<?php

namespace Backoffice\Client\Application\Command;
use Backoffice\Client\Domain\Services\ClientByPerformanceServiceContract;

class ClientByPerformanceCalculationsCommand {
    
    /** @var array */
    private $data;
    
    private $service;
    
    private $attribute_percentage;
    
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
    
    public function setShowPercentage($status) {
        $this->attribute_percentage = $status;
    }
    
    public function getShowPercentage(){
        return $this->attribute_percentage;
    }

}