<?php

namespace Backoffice\Client\Domain\Services;

class ClientByPerformanceService implements ClientByPerformanceServiceContract {

    private $collection;

    private $columns_default = ['user', 'fixed_cost_Client', 'net_value_invoice'];
    
    public function setInitial($collection = [], $columns = []){
        $this->collection = collect($collection);
        $this->setFilterColumns(array_merge($this->columns_default, $columns));        
    }

    public function getAverage(): float {
     return $this->collection->avg('fixed_cost_Client');
    }

    public function setFilterColumns($columns = array()) {

        $this->collection = $this->collection->map(function ($item) use ($columns) {
                    return collect($item)->only($columns)->all();
                });     
                
    }

    public function getCollection(): array {
        return $this->collection->toArray();
    }

    public function getTotal(): int {
        return $this->collection->count();
    }

}
