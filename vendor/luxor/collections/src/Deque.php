<?php

namespace Luxor\Collections;



class Deque {
    
    /**
     * @var array
     */
    private $memory;
    
    /**
     * @var int
     */
    private $lenght;


    /**
     * Inicializa los atributos de la clase <b>Lista</b>.
     */
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
    
    /**
     * (PHP 5, PHP 7)<br/>
     * Meter un elemento en la <b>Lista</b> de ultimo.
     * @link http://php.net/manual/es/
     * @param ? $values Recive un elemento cualquiera como parametro para meterlo en la <b>Lista</b>.
     * @return Lista Se retorna un objeto de tipo <b>Lista</b> para encadenar metodos.
     */
    public final function push($values) {
        $this->memory[$this->lenght] = $values;
        $this->lenght++;
        return $this;
    }
    
    
    /**
     * (PHP 5, PHP 7)<br/>
     * Mira el ultimo elemento de la <b>Lista</b> y despues lo elimina.
     * @link http://php.net/manual/es/
     * @return ? Retorna el ultimo elemento de la <b>Lista</b>.
     */
    public final function pop() {
        //if ($this->lenght === 0) return;

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
    
    
    /**
     * (PHP 5, PHP 7)<br/>
     * Mete un elemento en la <b>Lista</b> de primero, y despues reorganiza los elemntos de la <b>Lista</b>.
     * @link http://php.net/manual/es/
     * @param ? $values Recive un elemento cualquiera como parametro para meterlo en la <b>Lista</b>.
     * @return Lista Se retorna un objeto de tipo <b>Lista</b> para encadenar metodos.
     */
    public final function unshift($values) {
        $previus = $values;
        
        for ($address = 0; $address < $this->lenght; $address++) {
            $current = $this->memory[$address];
            $this->memory[$address] = $previus;
            $previus = $current;
        }
        
        $this->memory[$this->lenght] = $previus;
        $this->lenght++;
        return $this;
    }

    
    /**
     * (PHP 5, PHP 7)<br/>
     * Mirar el primer elemento de la <b>Lista</b> y despues lo elimina.
     * @link http://php.net/manual/es/
     * @return ? Retorna el primer elemento de la <b>Lista</b>.
     */
    public final function shift() {
        //if ($this->lenght === 0) return;

        if ($this->lenght > 0) {
            $value = $this->memory[0];

            for ($address = 0; $address < count($this->memory)-1; $address++) {
                $this->memory[$address] = $this->memory[$address+1];
            }

            unset($this->memory[$this->lenght-1]);

            $this->lenght--;
            
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
        return new Deque($values);
    }
}
