<?php

/*
 * Copyright 2018 brayan.
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

namespace Luxor\HttpController\Controller;

use Luxor\HttpController\Http\Request;


/**
 * Clase para estableser un contralador http, esta clase tiene herencia multiple
 * para suministrar varios metodos de diferentes modulos, utiles para gestionar
 * sobre el controlador.
 *
 * @author brayan
 */
abstract class Controller {
  
    /**
     * Metodo que se ejecuta cuando es llamado el controlador.
     */
    public abstract function indexActions(Request $param);
    
}
