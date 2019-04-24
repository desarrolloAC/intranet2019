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
 * Interfaz <b>CRUD</b> permite realizar un contrato con la base de datos
 * realizando los operaciones mas abitualaes como son <b>INSERT</b>, <b>UPDATE</b>
 * <b>DELETE</b> <b>SELECT</b> esto permite estandarizar las trasaccion en la 
 * base de datos.
 */
interface CRUD {
    
    /**
     * Para insertar un registro en la base de datos.
     * @param ? $data datos a sustituir.
     */
    public function create($data);
    
    /**
     * Para actualizar un registro en la base de datos.
     * @param ? $data datos a sustituir.
     */
    public function update($data);
    
    /**
     * Para eliminar un registro en la base de datos.
     * @param ? $data datos a sustituir.
     */
    public function delete($data);
    
    /**
     * Para consultar un registro en la base de datos.
     * @param ? $data datos a sustituir.
     */
    public function read($data);
    
    /**
     * Para consultar todos los registros de una tabla de base de datos.
     */
    public function readAll();
    
}
