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

use Luxor\SQL\IConnect;
use Luxor\SQL\IStatement;
use Luxor\SQL\IPreparedStatement;
use Luxor\MYSQL\PreparedMYSQL;
use Luxor\MYSQL\StatementMYSQL;
use Luxor\MYSQL\ParamConnection;


/**
 * Implementacion concreta de la conexion a mysql.
 */
class MYSQL implements IConnect {
     
    /**
     * @var mysqli 
     */
    private $connection;
    
    
    /**
     * Constructor que se conecta a la base de datos.
     * @param ParamConnection $param
     * @throws \Exception
     */
    function __construct(ParamConnection $param) {

        try {

            if (!$this->connection = new \mysqli($param->getHost(), $param->getUser(), $param->getPass(), '', $param->getPort())) {
                throw new \Exception('Error en la conexion a la base de datos: '.$param->getUser().'@'.$param->getHost());
                return;
            }

            if (!$this->connection->select_db($param->getData())) {
                throw new \Exception('Error no se encuentra la base de datos: '.$param->getData());
                return;
            }
            
            $this->connection->set_charset("utf8");
            
        } catch (\Exception $exc) {
            echo $exc->getMessage();

        } finally {
            
        }

    }

    /**
     * Empiesa un Begin Trasaction
     */
    public function beginTransaction() {
        $this->connection->begin_transaction();
    }
    
    /**
     * Cierra la conexion.
     */
    public function close() {
        $this->connection->close();
    }

    /**
     * Realiza un commint de la transaccion.
     */
    public function commint() {
        $this->connection->commit();
    }

    /**
     * Crea un Statement.
     * @return IStatement Devuelbe un ebjeto IStatement.
     */
    public function createStatement(string $sql): IStatement {
        return new StatementMYSQL($this->connection, $sql);
    }

    /**
     * Verifica si esta conectado.
     * @return bool Devuelbe un true si esta todo correcto, o un false en caso de errores.
     */
    public function isConnected(): bool {
        return $this->connection->ping();
    }
	
    /**
     * Crea un Prepare Statement.
     * @param string Recibe un string que representa la sentecia SQL.
     * @return IPreparedStatement Devuelbe un ebjeto IPreparedStatement.
     */
    public function prepareStatement(string $sql): IPreparedStatement {
        return new PreparedMYSQL($this->connection, $sql);
    }

    /**
     * Realiza un rollback de la transaccion.
     */
    public function rollback() {
        $this->connection->rollback();
    }

    /**
     * Establese si un se va a realizar autocommint
     * @param bool Recibe un true para activar el autocommint
     */
    public function setAutoCommit(bool $autoComming) {
        $this->connection->autocommit($autoComming);
    }

    /**
     * Cierra la conexion al destruir el objeto.
     */
    public function __destruct() {
        $this->connection = null;
    }
    
    /**
     * Metodo de factoria que inicializa el objeto.
     * @param array $param
     * @return IConnect retorna la instancia de la conexion.
     */
    public static function newConnection($param, $user, $pass) : IConnect {
        
        return new MYSQL(new ParamConnection($param, $user, $pass));
        
    }
}