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

namespace Luxor\HttpController\Event;


use Luxor\HttpController\Configure\ConfigureRutes;
use Luxor\HttpController\Configure\IConfigureRutes;
use Luxor\HttpController\Event\Executor;


/**
 * Clase principal para manejar peticiones sobre http.
 *
 * @author brayan
 */
class HttpEvent {
    
    /**
     * Ruta del controlador frontal.
     * @var string 
     */
    private $actual;
    
    /**
     * Ruta de la peticion.
     * @var string 
     */
    private $peticion;
    
    /**
     * Manejador gestionar la configuracion de las rutas.
     * @var ConfigureRutes 
     */
    private $configure;
    
    /**
     * Manejador gestionar la ejecucion de las rutas.
     * @var Executor 
     */
    private $executor;
    
    
    /**
     * Constructor.
     * @param string $actual
     */
    function __construct(string $actual) {
        $this->actual = $actual;
        $this->peticion = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
        
        $this->configure = new ConfigureRutes();
        $this->executor = new Executor();
    }
    
    /**
     * Estableser configuracion de las rutas.
     * @param IConfigureRutes $config
     */
    public function setConfig(IConfigureRutes $config) {
        $this->configure->setActual($this->actual);
        $this->configure->load($config);
        $this->configure->transform();
        $this->configure->rutes();
    }
    
    /**
     * Ejecutar peticion de un contralador.
     */
    public function run() {
        $this->executor->setActual($this->actual);
        $this->executor->setPeticion($this->peticion);
        $this->executor->setCallback($this->configure->getConfig());
        $this->executor->exist();
        $this->executor->compare();
        $this->executor->execute();
    }
    
}
