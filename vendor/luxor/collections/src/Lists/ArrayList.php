<?php

/*
 * Copyright 2017 Ing.Brayan.Martinez.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Luxor\Collections\Lists;



class ArrayList {
    
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

    public function add($value): ArrayList {
        array_push($this->memory, $value);
        $this->lenght++;        
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

    public function isEquals(ArrayList $list): bool {
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
    
    public function remove(int $address) {
        $element = $this->get($address);
        unset($this->memory[$address]);
        $this->lenght--;
        return $element;
    }

    public function removeAll(): ArrayList {
        $this->lenght = 0;
        $this->memory = array();
        return $this;
    }

    public function set(int $address, $value): ArrayList {
        $this->memory[$address] = $value;
        return $this;
    }
    
    public function lenght(): int {
        return $this->lenght;
    }

    public function toArray(): array {
        return $this->memory;
    }

    public function subList(int $start, int $end): ArrayList {
        $sublist = new ArrayList();
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
    
    public function map(callable $fn) {
        $list = new ArrayList();
        for ($index = 0; $index < $this->lenght; $index++) {
            $list->add($fn($this->get($index)));
        }
        return $list;
    }
    
    public function filter(callable $fn) {
        $list = new ArrayList();
        for ($index = 0; $index < $this->lenght; $index++) {
            if ($fn($this->get($index))) {
                $list->add($this->get($index));
            }         
        }
        return $list;
    }
    
    function reducer(callable $fn, $init) {
        $accumulator = ($init === null) ? 0 : $init;
        for ($index = 0; $index < $this->lenght; $index++) {
            $accumulator = $fn($accumulator, $this->get($index));
        }
        return $accumulator;
    }
    
    public static function of(array $values) {
        return new ArrayList($values);
    }

}
