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
 * Interface que representa la lista de parametros.
 */
interface IList {
    
    /**
     * Obtener la longitud de la <b>Lista</b>.
     * @return int Retorna un numero entero indicando la longitud de la <b>Lista</b>.
     */
    public function lenght(); 
    
    /**
     * Obtener segun la posicion de la <b>Lista</b>.
     * @param int $address Recive un numero entero para identificar la posicion de la <b>Lista</b> y 
     * obetener el elemento espesificado.
     * @return ? Retorna el elemento seleccionado.
     */
    public function get($address);
    
}
