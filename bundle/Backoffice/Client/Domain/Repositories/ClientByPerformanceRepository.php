<?php

namespace Backoffice\Client\Domain\Repositories;

interface ClientByPerformanceRepository
{
  
    /**
     * @param array $filter
     * @return model
     */
    public function getByCriteria($filter = []);    
    
    
}