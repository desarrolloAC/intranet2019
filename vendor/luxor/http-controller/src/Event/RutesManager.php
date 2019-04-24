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
use Luxor\Collections\Map\HashMap;



/**
 * Clase para operar sobre las rutas y relizar evaluciones utiles
 * para los filtros de rutas.
 *
 * @author brayan
 */
class RutesManager {
    
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
     * Lista de indices para gestionar la limpieza de parametros.
     * @var ArrayList 
     */
    private $indexes;
    
    /**
     * Parametros filtrados para el controlador.
     * @var HashMap 
     */
    private $mybuffer;
    
    /**
     * Buffer para gestionar limpieza de parametros.
     * @var ArrayList 
     */
    private $buffer1;
    
    /**
     * Buffer para gestionar limpieza de parametros.
     * @var ArrayList 
     */
    private $buffer2;
    
    
    
    /**
     * Constructor.
     */
    public function __construct() {
        $this->actual   = '';
        $this->peticion = '';
        $this->mybuffer = new HashMap();
        $this->indexes  = new ArrayList();
        $this->buffer1  = new ArrayList();
        $this->buffer2  = new ArrayList();
    }
    
    /**
     * Identificar el indice de los paramatros contenidos
     * en la ruta.
     * @param string $rute
     */
    private function identifyIndexes(string $rute) {
        $array = explode('/', substr($rute, 1, strlen($rute)));
 
        for ($index = 0; $index < count($array); $index++) {
            
            if (preg_match('/[:][a-z]/', $array[$index])) {
                $this->indexes->add($index);
            }
            
        }
    }
    
    /**
     * Limpiar las ruta de los parametros.
     * @param string $actual
     * @param string $peticion
     */
    private function clean(string $actual, string $peticion) {

        //Cargar en el buffer
        $this->buffer1->addAll(explode('/', substr($actual, 1, strlen($actual))));
        $this->buffer2->addAll(explode('/', substr($peticion, 1, strlen($peticion))));
            
        //limpiar y obtener parametros.
        $this->indexes->each(function ($number) {

            $this->mybuffer->add(
                substr($this->buffer1->get($number), 1, strlen($this->buffer1->get($number))), 
                $this->buffer2->get($number)
            );

            $this->buffer1->remove($number);
            $this->buffer2->remove($number);
        });

        //reconstruir 
        $this->actual = $this->buffer1->reducer(function ($acumulator, $current) {
           return $acumulator.'/'.$current;
        }, '');

        $this->peticion = $this->buffer2->reducer(function ($acumulator, $current) {
           return $acumulator.'/'.$current;
        }, '');

        //liberar buffers.
        $this->indexes->removeAll();
        $this->buffer1->removeAll();
        $this->buffer2->removeAll();
        
    }
    
    /**
     * Permite haser una comparacion de las rutas al detalle.
     * @param string $actual
     * @param string $peticion
     * @return bool retorna true o false si existe la ruta.
     */
    public function compareRute(string $actual, string $peticion): bool {
        $this->identifyIndexes($actual);
        $this->clean($actual, $peticion);

        return $this->actual === $this->peticion;
    }
    
    /**
     * Verifica si existe alguna ruta que se pueda ejecutar
     * @param string $actual
     * @param string $peticion
     * @return bool retorna true o false si existe la ruta.
     */
    public function existRutes($actual, $peticion): bool {
        $this->buffer1->addAll(explode('/', substr($actual, 1, strlen($actual))));
        $this->buffer2->addAll(explode('/', substr($peticion, 1, strlen($peticion))));

        $temp = $this->buffer1->lenght() === $this->buffer2->lenght();
        
        $this->buffer1->removeAll();
        $this->buffer2->removeAll();

        return $temp;
    }
    
    /**
     * Saber si es la heme page o no.
     * @param string $actual
     * @param string $peticion
     * @return bool
     */
    public function isRoot(string $actual, string $peticion): bool {
        $temp = false;
 
        if ($actual === $peticion || $actual.'/' === $peticion) {
            $temp = true;
        }
        
        return $temp;
    }
    
    /**
     * Obtener los parametros de la URL
     * @return HashMap
     */
    public function getParameter(): HashMap {
        return $this->mybuffer;
    }
    
}
