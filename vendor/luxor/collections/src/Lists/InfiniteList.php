<?php

namespace Luxor\Collections\Lists;



class InfiniteList  {
    
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
    private $value;
    
    
    public function __construct(int $init) {
        $this->memory = array();
        $this->lenght = 0; 
        $this->value  = $init;
    }
    
    /**
     * Autogenera un numero entero de forma correlativa.
     * @link http://php.net/manual/es/
     * @return int Se retorna un numero entero autogenerado.
     */
    public function get(int $address = null): int {
        
        if ($address == null) {
            $temp = $this->value++;
            $this->memory[$this->lenght] = $temp;
            $this->lenght++;
            return $temp;
        } else {
            if ($address > -1) {
               return $this->memory[$address];
           }
        }
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

    public function isEquals(InfiniteList $list): bool {
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
    
    /**
     * Elimina todo de la <b>ListaInfinita</b>.
     * @link http://php.net/manual/es/
     */
    public final function removeAll(): InfiniteList {
        $this->lenght = 0;
        $this->value = 0;
        $this->memory = array();
        return $this;
    }
    
    public function start(int $init): InfiniteList {
        $this->value = $init;
        return $this;
    }
    
    public function lenght(): int {
        return $this->lenght;
    }
    
    public function toArray(): array {
        return $this->memory;
    }
    
    public static function of(int $init) {
        return new InfiniteList($init);
    }
}
