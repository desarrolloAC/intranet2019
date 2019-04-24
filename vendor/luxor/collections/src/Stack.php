<?php

namespace Luxor\Collections;


class Stack {
    
    /**
     * @var array
     */
    private $memory;
    
    /**
     * @var int
     */
    private $lenght;


   public function __construct(array $values = null) {
        if ($values == null) {
            $this->memory = array();
            $this->lenght = 0;
        } else {
            $this->memory = array();
            $this->lenght = 0;
            $this->addAll($values);   
        }  
    }
    
    private final function addAll(array $values) {
        if (count($values) > 0) {
            for ($index = 0; $index < count($values); $index++) {
                $this->push($values[$index]);
            }
        }
    }
    
    public final function push($values) {
        $this->memory[$this->lenght] = $values;
        $this->lenght++;
        return $this;
    }
    
    public final function pop() {
        if ($this->lenght > 0) {
            $lasstAdrres = $this->lenght-1;
            $value       = $this->memory[$lasstAdrres];
            unset($this->memory[$lasstAdrres]);
            $this->lenght--;
        } else {
            $value = null;
        }
        return $value;
    }
    
    public final function peek() {
        if ($this->lenght > 0) {
            $lasstAdrres = $this->lenght-1;
            $value       = $this->memory[$lasstAdrres];
        } else {
            $value = null;
        }
        return $value;
    }
    
    public final function hashCode(): string {
        return spl_object_hash($this);
    }
    
    public final function isEmpty(): bool {
        return $this->lenght === 0;
    }
    
    public final function isContains($value): bool {
        return in_array($value, $this->memory, true);
    }
    
    public function toArray() {
        return $this->memory;
    }
    
    public static final function of(array $values) {
        return new Stack($values);
    }
}

