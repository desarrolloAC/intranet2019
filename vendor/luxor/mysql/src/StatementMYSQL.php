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

use Luxor\SQL\IStatement;
use Luxor\SQL\IResultSet;
use Luxor\MYSQL\ResultSetMYSQL;


/**
 * Implementacion concreta de una query a mysql.
 */
class StatementMYSQL implements IStatement {
  
    /**
     * @var mysqli
     */
    private $conect;

    /**
     * @var string
     */
    private $sql;
    
    
    public function __construct(\mysqli &$conect, string $sql) {
        $this->conect =& $conect;
        $this->sql    =  $sql;
    }

    /**
     * Permite haser una escritura de los datos.
     * @return boolean retorna un true si es todo correcto y false en caso de errores.
     */
    public function executeUpdate(){
        $this->conect->query($this->sql);
        $this->sql = "";
    }  
    
    /**
     * Permite haser una lectura de los datos.
     * @return IResultSet retorna un objeto de typo IResultSet si es todo correcto y null en caso de errores.
     */
    public function executeQuery(): IResultSet {
        
        if (!strlen($this->sql) > 0) {
            throw new \Exception('Error sentencia sql no valida');
        }
        
        $temp = $this->conect->query($this->sql);
        $this->sql = "";
        
        if ($temp == null) {
            throw new \Exception('Error no se pudo encontrar nada en la base de datos');
        }
       
        return new ResultSetMYSQL($temp);
    }

}
