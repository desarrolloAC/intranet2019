<?php

namespace Luxor\Collections;


class Queue {
        
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
                $this->enqueue($values[$index]);
            }
        }
    }
    
    public final function enqueue($values) {
        $this->memory[$this->lenght] = $values;
        $this->lenght++;
        return $this;
    }
    
    public final function dequeue() {
        $value = null;
        if ($this->lenght > 0) {
            $value = $this->memory[0];
            for ($address = 0; $address < count($this->memory)-1; $address++) {
                $this->memory[$address] = $this->memory[$address+1];
            }
            unset($this->memory[$this->lenght-1]);
            $this->lenght--;
        }
        return $value;
    }
    
    public function hashCode(): string {
        return spl_object_hash($this);
    }
    
    public final function isEmpty(): bool {
        return $this->lenght === 0;
    }
    
    public final function isContains($value): bool {
        return in_array($value, $this->memory, true);
    }
    
    public final function toArray(): array {
        return $this->memory;
    }
    
    public static final function of(array $values) {
        return new Queue($values);
    }
}
