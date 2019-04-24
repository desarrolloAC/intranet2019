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
 * La interfase IStatement permite realizar consunta base de datos indenpendientemente
 * del manejador que se este utilizando.
 * @link http://php.net/manual/es/ documentacion.
 * @link http://github.con/Ing-Brayan-Martinez perfil del autor.
 * @author Ing Brayan Martinez.
 * @version IStatement 1.0.
 */
interface IStatement {
    
    /**
     * Permite haser una lectura de los datos.
     */
    public function executeQuery(): IResultSet;
    
    /**
     * Permite haser una escritura de los datos.
     */
    public function executeUpdate();
}
