<?php

namespace Backoffice\Client\Domain\Services;

class ClientByPerformanceService implements ClientByPerformanceServiceContract {

    private $collection;

    private $sumAttribute;
    
    private $columns_default = ['user', 'razao', 'net_income'];
    
    public function setInitial($collection = [], $columns = []){
        $this->collection = collect($collection);
        $this->setFilterColumns(array_merge($this->columns_default, $columns));        
    }

    public function getAverage(): float {
     return $this->collection->avg('net_income');
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

    public function addPercentage() {
        
        $this->setSumByAttribute('net_income');
        $total = $this->getSumByAttribute();        
        
        $this->collection = $this->collection->map(function($item) use ($total) {
            $item['percentage'] = number_format(($item['net_income'] * 100 / $total), 2, '.', '.');
            return $item;
        });        
        
    }

    public function getSumByAttribute(): float {
        return $this->sumAttribute;
    }

    public function setSumByAttribute(string $attribute) {
        $this->sumAttribute = $this->collection->sum($attribute);
    }

}
