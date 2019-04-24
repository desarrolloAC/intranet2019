<?php

/*
 * Copyright 2017 Ing Brayan Martinez.
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


namespace Luxor\SQL;


use Luxor\SQL\IList;

/**
 * Lista de parametros.
 */
class ListParam implements IList {
 
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
    private $count;
    /**
     * @var Lista
     */
    private $lista;


    /**
     * Inicializa los atributos de la clase <b>Lista</b>.
     */
    public function __construct() {
        $this->memory = array();
        $this->lenght = 0;
        $this->count  = 0;
        $this->lista  = null;        
    }
     
    
    /**
     * Meter un elemento en la <b>Lista</b> de ultimo.
     * @param ? $values Recive un elemento cualquiera como parametro para meterlo en la <b>Lista</b>.
     * @return Lista Se retorna un objeto de tipo <b>Lista</b> para encadenar metodos.
     */
    public function push($values) {
        $this->memory[$this->lenght] = $values;
        $this->lenght++;
        return $this;
    }
    
    
    /**
     * Mira el ultimo elemento de la <b>Lista</b> y despues lo elimina.
     * @return ? Retorna el ultimo elemento de la <b>Lista</b>.
     */
    public function pop() {
        //if ($this->lenght === 0) return;

        if ($this->lenght > 0) {
            $lasstAdrres = $this->lenght-1;
            $value       = $this->memory[$lasstAdrres];
            $this->memory[$lasstAdrres] = null; //revisar
            $this->lenght--;
        } else {
            $value = null;
        }
        return $value;
    }
    
    
    /**
     * Mete un elemento en la <b>Lista</b> de primero, y despues reorganiza los elemntos de la <b>Lista</b>.
     * @param ? $values Recive un elemento cualquiera como parametro para meterlo en la <b>Lista</b>.
     * @return Lista Se retorna un objeto de tipo <b>Lista</b> para encadenar metodos.
     */
    public function unshift($values) {
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
     * Mirar el primer elemento de la <b>Lista</b> y despues lo elimina.
     * @return ? Retorna el primer elemento de la <b>Lista</b>.
     */
    public function shift() {
        //if ($this->lenght === 0) return;

        if ($this->lenght > 0) {
            $value = $this->memory[0];

            for ($address = 0; $address < count($this->memory)-1; $address++) {
                $this->memory[$address] = $this->memory[$address+1];
            }

            $this->memory[$this->lenght-1] = null;

            $this->lenght--;
            
        } else {
            $value = null;
        }
        return $value;
    }
    
    /**
     * Obtener segun la posicion de la <b>Lista</b>.
     * @param int $address Recive un numero entero para identificar la posicion de la <b>Lista</b> y 
     * obetener el elemento espesificado.
     * @return ? Retorna el elemento seleccionado.
     */
    public function get($address) {
        return $this->memory[$address];
    }
    
    /**
     * Obtener la longitud de la <b>Lista</b>.
     * @return int Retorna un numero entero indicando la longitud de la <b>Lista</b>.
     */
    public function lenght() {
        return $this->lenght;
    }
    
    /**
     * Esta funcion itera por cada uno de los elemento de la <b>Lista</b>, aplicandole una funcion
     * anonima a cada elemento, y despues se guarda cada resultado en una <b>Lista</b> nueva.
     * @param callable $function Resive una funcion anonima como parametro.
     * @return ListParam Retorna una <b>Lista</b> nueva con los resultados.
     */
    public final function map(callable $function): ListParam {
        
        //Evaluacion peresosa solo se ejecuta hasta la longitud de la lista.
        if ($this->count != $this->lenght) {
            
            if ($this->lista == null) {
                $this->lista = new ListParam();
                $this->lista->push($function($this->get($this->count)));
                $this->count++;
                $this->map($function);
            } else {
                $this->lista->push($function($this->get($this->count)));
                $this->count++;
                $this->map($function);
            }
            
        } 
            
        return $this->lista;
            
    }
}

