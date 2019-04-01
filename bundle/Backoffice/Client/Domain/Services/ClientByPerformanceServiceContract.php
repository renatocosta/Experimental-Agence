<?php

namespace Backoffice\Client\Domain\Services;

interface ClientByPerformanceServiceContract
{
  
    /**
     * Given an attribute some of collection then calculate its average
     * @return float
     */
    public function getAverage(); 
    
    /**
     * Set specific columns into array
     * @param array $columns
     */
    public function setFilterColumns($columns = []);
    
    /**
     * Given an attribute some of collection then calculate its percentage
     */
    public function addPercentage();     

    /**
     * @param string $attribute
     */
    public function setSumByAttribute(string $attribute);
    
    /**
     * Given some attribute of collection then sum all of them 
     * @return float 
     */
    public function getSumByAttribute();

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