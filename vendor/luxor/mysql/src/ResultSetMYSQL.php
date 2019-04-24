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

namespace Luxor\MYSQL;

use Luxor\SQL\IResultSet;


/**
 * Implementacion concreta del resultado de la base datos.
 */
class ResultSetMYSQL implements IResultSet {
    
    /**
     * @var mysqli_result
     */
    private $statement;
    
    /**
     * @var array
     */
    private $fetch;
    
    /**
     * Constructor que establese un statement
     * @param \mysqli_result $statement
     */
    public function __construct(\mysqli_result &$statement = null) {
        $this->statement =& $statement;
    }
    
    /**
     * Metodo que establese un statement.
     * @param \mysqli_result $statement
     */
    public function set(\mysqli_result &$statement) {
        $this->statement =& $statement;
    }
      
    /**
     * Metodo que convierte el Reultset en un array. 
     * @return IResultSet Description
     */
    public function fetchAll(): IResultSet {
        $this->fetch = $this->statement->fetch_all(MYSQLI_BOTH);
        return $this;
    }
    
    /**
     * Metodo que mapea el ResultSet y devuelve cada una de las filas.
     * @param callable Resive una funcion anonima como parametro, la cual se ejecuta
     * cuando se encuentra un fila dentro del ResulSet, cabe destacar que cada fila
     * encontrada se pasa como parametro a la funcion anonima.
     */
    public function each(callable $func) {

        for ($index = 0; $index < count($this->fetch); $index++) {
            call_user_func($func, $this->fetch[$index]);
        }
    }

}