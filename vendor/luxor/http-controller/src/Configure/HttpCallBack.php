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

namespace Luxor\HttpController\Configure;

use Luxor\HttpController\Controller\Controller;
use Luxor\HttpController\Http\Request;
use Luxor\Collections\Map\HashMap;



/**
 * Esta clase tiene como objetivo empaquetar la configuracion
 * de una ruta espesifica.
 *
 * @author brayan
 */
class HttpCallBack {
    
    /**
     * Metodo http
     * @var string 
     */
    private $method;
    
    /**
     * La ruta configurada.
     * @var string 
     */
    private $path;
    
    /**
     * El controllador configurado.
     * @var Controller 
     */
    private $fn;
    
    
    
    /**
     * Constructor.
     * @param string $method
     * @param string $path
     * @param Controller $fn
     */
    function __construct(string $method, string $path, Controller $fn) {
        $this->method = $method;
        $this->path = $path;
        $this->fn = $fn;
    }
    
    /**
     * Obtener el metodo http configurado.
     * @return string
     */
    public function getMethod(): string {
        return $this->method;
    }

    /**
     * Obtener el metodo http configurado.
     * @return string
     */
    public function getPath(): string {
        return $this->path;
    }

    /**
     * Obtener el contrlador http configurado.
     * @return object
     */
    public function getFn(): Controller {
        return $this->fn;
    }
    
    /**
     * Ejecutar controlador.
     */
    public function call(HashMap $mybuffer) {
        $this->fn->indexActions(new Request($mybuffer));
    }
}
