<?php

namespace Backoffice\Consultant\Application\Command;
use Backoffice\Consultant\Domain\Services\ConsultantByPerformanceServiceContract;

class ConsultantByPerformanceCalculationsCommand {
    
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
    
    public function setService(ConsultantByPerformanceServiceContract $service){
       $this->service = $service; 
    }
    
    public function getDataService(): ConsultantByPerformanceServiceContract {
        return $this->service;
    }
    
    public function setShowPercentage($status) {
        $this->attribute_percentage = $status;
    }
    
    public function getShowPercentage(){
        return $this->attribute_percentage;
    }

}