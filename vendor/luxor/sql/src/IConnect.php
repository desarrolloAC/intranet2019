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

/**
 * Interface que representa la conexion a la base de datos.
 */
interface IConnect {
    
    /**
     * Empiesa un Begin Trasaction
     */
    public function beginTransaction();
    
    /**
     * Cierra la conexion.
     */
    public function close();
    
    /**
     * Realiza un commint de la transaccion.
     */
    public function commint();
    
    /**
     * Crea un Statement.
     * @return IStatement Devuelbe un ebjeto IStatement.
     */
    public function createStatement(string $sql): IStatement;
    
    /**
     * Verifica si esta conectado.
     * @return bool Devuelbe un true si esta todo correcto, o un false en caso de errores.
     */
    public function isConnected(): bool;
    
    /**
     * Crea un Prepare Statement.
     * @param string Recibe un string que representa la sentecia SQL.
     * @return IPreparedStatement Devuelbe un ebjeto IPreparedStatement.
     */
    public function prepareStatement(string $sql): IPreparedStatement;
    
    /**
     * Realiza un rollback de la transaccion.
     */
    public function rollback();
    
    /**
     * Establese si un se va a realizar autocommint
     * @param bool Recibe un true para activar el autocommint
     */
    public function setAutoCommit(bool $autoCommint);
    
    /**
     * Cierra la conexion al destruir el objeto.
     */
    public function __destruct();
}
