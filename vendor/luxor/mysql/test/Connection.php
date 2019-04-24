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

namespace Luxor\Test;

use Luxor\MYSQL\MYSQL;


/**
 * Clase de prueva para estableser un conexion a mysql
 * usando el patron singlenton.
 */
class Connection {
    
    /**
     * @var Connection 
     */
    private static $instance = null;
    
    /**
     * @var IConnect
     */
    private $link;
    
    /**
     * Constructor
     */
    private function __construct() {
         $this->link = MYSQL::newConnection('mysql://localhost:3306/usuario', 'root', '123456789');
    }

    /**
     * Inicializa el objeto
     * @return Connection Retorna la misma instancia.
     */
    public static function getInstance() : Connection {
        
        try {
            if (self::$instance === null) {
                self::$instance = new Connection();
            }
            
        } catch (\Exception $exc) {
            
            
        } finally {
             return self::$instance;
        }

    }
    
    /**
     * Obtengo la conexion.
     * @return IConnect
     */
    public function getConnection() {
        return $this->link;
    }
    
    /**
     * Cierro la conexion.
     */
    public function close() {
        self::$instance = null;
    }
}