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

namespace Luxor\MYSQL;

use Luxor\SQL\URL;


/**
 * Description of ParamConnection
 *
 * @author brayan
 */
class ParamConnection {
    
    private $host;
    private $user;
    private $pass;
    private $data;
    private $port;
    
    function __construct(&$param, &$user, &$pass) {
        $url  = new URL($param);
        
        //Establecer propiedades.
        $this->host = $url->getHost();
        $this->user = $user;
        $this->pass = $pass;
        $this->data = $url->getData();
        $this->port = $url->getPort();
    }
    
    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getData() {
        return $this->data;
    }

    public function getPort() {
        return $this->port;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setPort($port) {
        $this->port = $port;
    }


}
