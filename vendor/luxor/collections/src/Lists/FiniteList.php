<?php

namespace Luxor\Collections\Lists;



class FiniteList {
      
    /**
     * @var array
     */
    private $memory;
    
    /**
     * @var int
     */
    private $lenght;
    
    /**
     * @var int
     */
    private $limit;
    
    
    public function __construct(int $limit, array $values = null) {
        if ($values == null) {
            $this->memory = array();
            $this->lenght = 0;
            $this->limit = $limit;
        } else {
            $this->memory = array();
            $this->lenght = 0;
            $this->limit  = $limit;
            $this->addAll($values);   
        }  
    }
   
    public function add($values): FiniteList {
        if ($this->lenght < $this->limit) {
            $this->memory[$this->lenght] = $values;
            $this->lenght++;
        }
        return $this;
    }
    
    public function addAll(array $values): bool {
        $temp = false;
        if (count($values) > 0) {
            for ($index = 0; $index < count($values); $index++) {
                $this->add($values[$index]);
            }
            $temp = true;
        }
        return $temp;
    }
    
    public function get(int $address) {
        $temp = null;
        
        if ($address < $this->limit) {
            $temp = $this->memory[$address];
        }
        
        return $temp;
    }
   
    public function hashCode(): string {
        return spl_object_hash($this);
    }

    public function indexOf($value): int {
        return array_search($value, $this->memory, true);
    }
    
    public function isEmpty(): bool {
        return $this->lenght === 0;
    }
    
    public function isContains($value): bool {
        return in_array($value, $this->memory, true);
    }

    public function isEquals(FiniteList $list): bool {
        $exist = [];
        $notExist = [];
        if ($this->lenght === $list->lenght()) {
            for ($index = 0; $index < $this->lenght; $index++) {
                if ($this->memory[$index] === $list->get($index)) {
                    array_push($exist, $index);
                } else {
                    array_push($notExist, $index);
                }
            }
        } else {
            array_push($notExist, '$index');
        }
        return count($notExist) === 0;
    }

    public function iterator() {
        for ($i = 0; $i < $this->length(); $i++) {
            yield $this->get($i);
        }
    }
    
    public function limit(int $limit): FiniteList {
        $this->limit = $limit;
        return $this;
    }
    
    public function remove(int $address) {
        $element = $this->get($address);
        unset($this->memory[$address]);
        $this->lenght--;
        return $element;
    }

    public function removeAll(): FiniteList {
        $this->lenght = 0;
        $this->memory = array();
        return $this;
    }

    public function set(int $address, $value): FiniteList {
        $this->memory[$address] = $value;
        return $this;
    }
    
    public function lenght(): int {
        return $this->lenght;
    }

    public function toArray(): array {
        return $this->memory;
    }
     
    public function subList(int $start, int $end, int $limit): FiniteList {
        $sublist = new FiniteList($limit);
        for ($index = $start; $index <= $end; $index++) {
            $sublist->add($this->memory[$index]);
        }
        return $sublist;
    }
    
    public function each(callable $fn) {
        for ($index = 0; $index < $this->lenght; $index++) {
            $fn($this->get($index));
        }
    }
    
    public static function of(int $limit, array $values = null) {
        return new FiniteList($limit, $values);
    }
}
