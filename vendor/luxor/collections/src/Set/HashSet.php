<?php

namespace Luxor\Collections\Set;


class HashSet {
    
    /**
     * @var array
     */
    private $memory;
    
    /**
     * @var int
     */
    private $lenght;
    
    
    function __construct(array $values = null) {
        if ($values == null) {
            $this->memory = array();
            $this->lenght = 0;
        } else {
            $this->memory = array();
            $this->lenght = 0;    
            $this->addAll($values);          
        }
    }
    
    public function add($key, $value): HashSet {
        $this->memory[$key] = $value;
        $this->lenght++;
        return $this;
    }

    public function addAll(array $values): bool {
        $temp = false;
        $key = 'void';    
        if (count($values) > 0 && count($values) % 2 === 0) {
            for ($index = 0; $index < count($values); $index++) {
                if ($index % 2 === 0) {
                    $key = $values[$index];
                } else {
                    $this->add($key, $values[$index]);
                }
            }
            $temp = true;
        }
        return $temp;
    }

    public function getKeys(): array {
        return array_keys($this->memory);
    }

    public function hashCode(): string {
        return spl_object_hash($this);
    }
    
    public function isEmpty(): bool {
        return $this->lenght === 0;
    }

    public function isContainsKey($key): bool {
        return array_key_exists($key, $this->memory);
    }

    public function isContainsValue($value): bool {
        return in_array($value, $this->memory, true);
    }
        
    public function isEquals(HashSet $set): bool {
        $exist    = [];
        $notExist = [];
        $inKey  = $this->getKeys();
        $extKey = $set->getKeys();
        if (count($inKey) === count($extKey) && $this->lenght === $set->lenght()) {
            for ($index = 0; $index < count($inKey); $index++) {
                if ($this->isContains($inKey[$index]) === $set->isContains($extKey[$index])) {
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
        
    public function remove($key) {
        $element = $this->get($key);
        unset($this->memory[$key]);
        $this->lenght--;
        return $element;
    }

    public function removeAll(): HashSet {
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
    
    public static function of(array $values) {
        return new HashSet($values);
    }
}
