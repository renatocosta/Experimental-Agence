<?php

namespace Backoffice\Consultant\Domain\Services;

interface ConsultantByPerformanceServiceContract
{
  
    /**
     * Give an attribute some of collection then calculate its average
     * @return float
     */
    public function getAverage(); 
    
    /**
     * Set specific columns into array
     * @param array $columns
     */
    public function setFilterColumns($columns = []);
    
    /**
     * Return total of collection
     * @return int 
     */
    public function getTotal();
    
    /**
     * Return the collection
     * @return array
     */
    public function getCollection();
    
}