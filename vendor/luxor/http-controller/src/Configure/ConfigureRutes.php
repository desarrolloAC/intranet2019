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

use Luxor\Collections\Lists\ArrayList;
use Luxor\HttpController\Configure\HttpCallBack;
use Luxor\HttpController\Configure\IConfigureRutes;




/**
 * ConfigureRutes esta clase tiene como objetivo trannsformar la configuracion
 * suministrada, que es un array con la descripcion de las rutas, en una lista
 * de de objetos facilmente gestionable.
 *
 * @author brayan
 */
class ConfigureRutes {
    
    /**
     * Ruta inicial.
     * @var string 
     */
    private $actual;
    
    /**
     * Lista original.
     * @var ArrayList 
     */
    private $listCallBack;

    /**
     * Lista transformada.
     * @var ArrayList 
     */
    private $resListCallBack;
    
    /**
     * Lista transformada con rutas.
     * @var ArrayList 
     */
    private $resList;
    

    public function __construct() {
        $this->listCallBack = new ArrayList();
    }
    
    /**
     * Establecer la ruta del controlador frontal.
     * @param string $actual
     */
    public function setActual(string $actual) {
        $this->actual = $actual;
    }

    /**
     * Estableser el objeto de configuracion.
     * @param IConfigureRutes $config
     */
    public function load(IConfigureRutes $config) {
        $this->listCallBack->addAll($config->getRutes());
    }
    
    /**
     * Transformar de un array a una lista de objetos.
     */
    public function transform() {
        $this->resListCallBack = $this->listCallBack->map(function ($call) {
            return new HttpCallBack(
                $call['method'],   
                $call['path'],
                $call['fn']
            );
            
        });
    }
    
    /**
     * Transformar las rutas segun la configuracion.
     */
    public function rutes() {
        $this->resList = $this->resListCallBack->map(function (HttpCallBack $call) {
            return new HttpCallBack(
                $call->getMethod(),    
                $this->actual.$call->getPath(),
                $call->getFn()
            );
            
        });
    }
    
    /**
     * Devolverconfiguracion ya procesada.
     * @return ArrayList
     */
    public function getConfig(): ArrayList {
        return $this->resList;
    }
}
