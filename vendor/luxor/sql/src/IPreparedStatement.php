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
 * La interfase IPreparedStatement permite preparar la consunta base de datos antes
 * de ejecutarlatla en la base de datos indenpendientemente del manejador que se este
 * utilizando.
 * @link http://php.net/manual/es/ documentacion.
 * @link http://github.con/Ing-Brayan-Martinez perfil del autor.
 * @author Ing Brayan Martinez.
 * @version IResultSet 1.0.
 */
interface IPreparedStatement {
    
    /**
     * Permite haser una lectura de los datos.
     * @return IResultSet retorna un objeto de typo IResultSet si es todo correcto y null en caso de errores.
     */
    public function executeQuery(): IResultSet;
    
    /**
     * Permite haser una escritura de los datos.
     * @return boolean retorna un true si es todo correcto y false en caso de errores.
     */
    public function executeUpdate(): bool;
    
    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param boolean $data resive un valor booleano <b>true</b> o <b>false</b> para poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setArray($index, array $data): IPreparedStatement;
    
    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param boolean $data resive un valor booleano <b>true</b> o <b>false</b> para poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setBoolean($index, bool $data): IPreparedStatement;
    
    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param Date $data resive un objeto de tipo Date que representa una fecha y asi poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setDate($index, $data): IPreparedStatement;
    
     /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param float $data resive un numero decimal para poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setFloat($index, float $data): IPreparedStatement;
    
    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param int $data resive un numero entero para poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setInt($index, int $data): IPreparedStatement;
    
    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param string $data resive una cadena para poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setString($index, string $data): IPreparedStatement;
    
    /**
     * Obtiene la cedena construida con la sentencia <b>SQL</b>.
     * @return string retorna la sentencia <b>SQL</b> generada.
     */
    public function getSQLGenerated(): string;
}
