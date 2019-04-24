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

namespace Luxor\HttpController\Http;

use Luxor\Collections\Map\HashMap;



/**
 * Esta clase tienc omo objetivo procesar la peticion del navegador.
 *
 * @author brayan
 */
class Request {
    
    const METHOD_HEAD = 'HEAD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PURGE = 'PURGE';
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_TRACE = 'TRACE';
    const METHOD_CONNECT = 'CONNECT';
   
    /**
     * Lista de parametros para el controlador.
     * @var HashMap 
     */
    private $mybuffer;
    
    /**
     * Lista de parametros.
     * @var array 
     */
    private $get;

    /**
     * Lista de parametros.
     * @var array 
     */
    private $post;

    /**
     * Lista de parametros.
     * @var array 
     */
    private $cookies;
    
    /**
     * Lista de parametros.
     * @var array 
     */
    private $file;
    
     /**
     * Lista de parametros.
     * @var array 
     */
    private $server;
    
    
    /**
     * Constructor.
     * @param HashMap $mybuffer
     */
    public function __construct(HashMap $mybuffer) {
        $this->mybuffer = $mybuffer;
        $this->get = $_GET;
        $this->post = $_POST;
        $this->file = $_FILES;
        $this->server = $_SERVER;
        $this->cookies = $_COOKIE;
        
        $server = array(
            'SERVER_NAME' => 'localhost',
            'SERVER_PORT' => 80,
            'HTTP_HOST' => 'localhost',
            'HTTP_USER_AGENT' => 'Symfony/3.X',
            'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'HTTP_ACCEPT_LANGUAGE' => 'en-us,en;q=0.5',
            'HTTP_ACCEPT_CHARSET' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.7',
            'REMOTE_ADDR' => '127.0.0.1',
            'SCRIPT_NAME' => '',
            'SCRIPT_FILENAME' => '',
            'SERVER_PROTOCOL' => 'HTTP/1.1',
            'REQUEST_TIME' => time(),
        );
    }

    /**
     * Obtener parametros de la url.
     * @param string $name
     * @return type
     */
    public function param(string $name) {
        return $this->mybuffer->get($name);
    }
    
    /**
     * Obtener parametro de una peticion POST
     * @param string $name
     * @return string
     */
    public function post(string $name): string {
        if (!isset($this->post[$name])) {
            return "";
        }
        return $this->post[$name];
    }
    
    /**
     * Obtener parametro de una peticion GET
     * @param string $name
     * @return string
     */
    public function get(string $name): string {
        if (!isset($this->get[$name])) {
            return "";
        }
        return $this->get[$name];
    }
    
    /**
     * Obtener parametro del servidor apache.
     * @param string $name
     * @return string
     */
    public function server(string $name): string {
        if (!isset($this->server[$name])) {
            return "";
        }
        return $this->server[$name];
    }
    
    /**
     * Obtener los paramtros del protocolo file.
     * @param string $name
     * @return string
     */
    public function file(string $name): string {
        if (!isset($this->file[$name])) {
            return "";
        }
        return $this->file[$name];
    }
    
    /**
     * Obtener parametros de las cookies.
     * @param string $name
     * @return string
     */
    public function cookie(string $name): string {
        if (!isset($this->cookies[$name])) {
            return "";
        }
        return $this->cookies[$name];
    }
    
    /**
     * Gets the request's scheme.
     *
     * @return string
     */
    public function getScheme()
    {
        return $this->isSecure() ? 'https' : 'http';
    }
    
        /**
     * Checks whether the request is secure or not.
     *
     * This method can read the client protocol from the "X-Forwarded-Proto" header
     * when trusted proxies were set via "setTrustedProxies()".
     *
     * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
     *
     * If your reverse proxy uses a different header name than "X-Forwarded-Proto"
     * ("SSL_HTTPS" for instance), configure it via the $trustedHeaderSet
     * argument of the Request::setTrustedProxies() method instead.
     *
     * @return bool
     */
    public function isSecure()
    {
       return true;
    }
    
    public function getBrowser() {
        return get_browser(null, true);
    }
    
    public function getRuteAbsolute() {
        return  __FILE__;
    }

}

