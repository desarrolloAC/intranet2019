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
 * La interfase IResultSet permite definir la clase que resive los resultado de 
 * la consunta base de datos indenpendientemente del manejador que se este utilizando.
 * @link http://php.net/manual/es/ documentacion.
 * @link http://github.con/Ing-Brayan-Martinez perfil del autor.
 * @author Ing Brayan Martinez.
 * @version IResultSet 1.0.
 */
interface IResultSet {
     
    /**
     * Metodo que convierte el Reultset en un array 
     * @return IResultSet Description
     */
    public function fetchAll(): IResultSet;
    
    /**
     * Metodo que mapea el ResultSet y devuelve cada una de las filas.
     * @param callable Resive una funcion anonima como parametro, la cual se ejecuta
     * cuando se encuentra un fila dentro del ResulSet, cabe destacar que cada fila
     * encontrada se pasa como parametro a la funcion anonima.
     */
    public function each(callable $func);
    
}
