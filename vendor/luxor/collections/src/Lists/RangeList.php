<?php

namespace Luxor\Collections\Lists;



class RangeList {
    
    /**
     * @var array
     */
    private $memory;
    
    /**
     * @var int
     */
    private $lenght;
    
    
    public function __construct($start, $end) {
        $this->memory = array();
        $this->lenght = 0; 
        $this->addAll(range($start, $end));   
    }
    
    private function add($value): RangeList {
        array_push($this->memory, $value);
        $this->lenght++;        
        return $this;
    }
    
    private final function addAll(array $values) {
        if (count($values) > 0) {
            for ($index = 0; $index < count($values); $index++) {
                $this->add($values[$index]);
            }
        }
    }
    
    public function get(int $address) {
       if ($address > -1) {
            return $this->memory[$address];
        }
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

    public function isEquals(RangeList $list): bool {
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
    
    public function removeAll(): RangeList {
        $this->lenght = 0;
        $this->memory = array();
        return $this;
    }
    
    public function lenght(): int {
        return $this->lenght;
    }

    public function toArray(): array {
        return $this->memory;
    }
    
    public function subList($start, $end): ArrayList {
        return new RangeList($start, $end);
    }
    
    public function each(callable $fn) {
        for ($index = 0; $index < $this->lenght; $index++) {
            $fn($this->get($index));
        }
    }
    
    public static function of($start, $end): RangeList {
        return new RangeList($start, $end);
    }

}
