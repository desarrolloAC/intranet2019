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

namespace Luxor\HttpController\Event;

use Luxor\Collections\Lists\ArrayList;
use Luxor\HttpController\Configure\HttpCallBack;
use Luxor\HttpController\Event\RutesManager;


/**
 * Clase que procesa la ejecucion de la peticion realizada, sobre un contralador
 * esta clase filtra dando como resultado un unico resultado, que se un controlador
 * para luego ejecutarlo.
 *
 * @author brayan
 */
class Executor {
        
    /**
     * Lista de comandos ejecutables.
     * @var ArrayList 
     */
    private $callback;
    
    /**
     * Lista de comandos ejecutables.
     * @var ArrayList 
     */
    private $resCallback;
    
    /**
     * Lista de comandos ejecutables.
     * @var ArrayList 
     */
    private $resFilter;

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
     * Manejador de rutas.
     * @var RutesManager 
     */
    private $rutesManager;
    
    
    
    /**
     * Constructor.
     */
    public function __construct() {
        $this->resCallback = null;
        $this->resFilter = null;
        $this->rutesManager = new RutesManager();
    }

    /**
     * Establecer la ruta del controlador frontal.
     * @param string $actual
     */
    public function setActual(string $actual) {
        $this->actual = $actual;
    }

    /**
     * Establecer la ruta de la peticion.
     * @param string $actual
     */
    public function setPeticion(string $peticion) {
        $this->peticion = $peticion;
    }
    
    /**
     * Establecer lista de comando ejecutables.
     * @param ArrayList $callback
     */
    public function setCallback(ArrayList $callback) {
        $this->callback = $callback;
    }
    
    /**
     * Filtrar si existe algun controlador que pueda ser ejecutado
     * sin importar si es el solicitado, esto se verifica con la longitud
     * de la rutas almacenada, si coinciden con la ruta de la peticion.
     */
    public function exist() {
        
        $this->resCallback = $this->callback->filter(function (HttpCallBack $call) {
            
            return $this->rutesManager->existRutes($call->getPath(), $this->peticion);
            
        });
     
    }
    
    /**
     * Filtrar si existe alguna ruta que sea identica a la ruta de
     * la peticion esto se realiza a travez de la verificacion de
     * patrones en las rutas.
     * @return null
     */
    public function compare() {
                        
//        echo '<br>';
//        echo 'Se han encontrado '.$this->resCallback->lenght().' resultados del primer filtro <br>';
        
     
        $this->resFilter = $this->resCallback->filter(function (HttpCallBack $call) {
            
            return $this->rutesManager->compareRute($call->getPath(), $this->peticion);
            
        });
    }

    /**
     * Ejecutar la ruta encontrada, en caso de no encontrar
     * nada ejecutar una por defecto
     * @return null
     */
    public function execute() {
        
//        echo '<br>';
//        echo 'Se han encontrado '.$this->resFilter->lenght().' resultados del segundo filtro <br>';
        
        //Ejecutar controlador raiz por defecto, si no hay ningun resultado posible.
        if ($this->resFilter->isEmpty() && $this->rutesManager->isRoot($this->actual, $this->peticion)) {
            $this->root();
            return;
        }
        
        //Ejecutar controlador por defecto, si no hay ningun resultado posible.
        if ($this->resFilter->isEmpty()) {
            $this->default();
            return;
        }
 
        //Ejecutar controlador.
        $this->resFilter->each(function (HttpCallBack $call) {
     
            $call->call($this->rutesManager->getParameter());
            
        });

    }
    
    /**
     * Metodo quen ejecuta el controlador por defecto cuando no existe una ruta 
     * posible a ejecutar.
     */
    private function default() {

        $this->callback->filter(function (HttpCallBack $test) {
           
            return !strcmp($test->getPath(), $this->actual.'/**');

        })->each(function (HttpCallBack $test) {
 
            $test->call($this->rutesManager->getParameter());

        });
        
    }
    
    /**
     * Metodo que ejecuta el controlador por defecto que contiene la pagina 
     * inicial o home page, segun si se usa "/" para indicar la raiz o no. 
     */
    private function root() {
        
        $this->callback->filter(function (HttpCallBack $test) {
           
            return !strcmp($test->getPath(), $this->actual.'/');

        })->each(function (HttpCallBack $test) {
 
            $test->call($this->rutesManager->getParameter());

        });
        
    }
    
    
}
