<?php

namespace Backoffice\Consultant\Domain\Services;

class ConsultantByPerformanceService implements ConsultantByPerformanceServiceContract {

    private $collection;

    private $sumAttribute;
    
    private $columns_default = ['user', 'fixed_cost_consultant', 'net_value_invoice'];
    
    public function setInitial($collection = [], $columns = []){
        $this->collection = collect($collection);
        $this->setFilterColumns(array_merge($this->columns_default, $columns));        
    }

    public function getAverage(): float {
     return $this->collection->avg('fixed_cost_consultant');
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
        
        $this->setSumByAttribute('net_value_invoice');
        $total = $this->getSumByAttribute();        
        
        $this->collection = $this->collection->map(function($item) use ($total) {
            $item['percentage'] = $item['net_value_invoice'] * 100 / $total;
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
