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
 * Description of URL
 *
 * @author brayan
 */
class URL {
    
    private $type;
    private $host;
    private $port;
    private $data;
    
    function __construct($url) {
        $this->type = parse_url($url, PHP_URL_SCHEME);
        $this->host = parse_url($url, PHP_URL_HOST);
        $this->port = parse_url($url, PHP_URL_PORT);
        $this->data = substr(parse_url($url, PHP_URL_PATH), 1, strlen(parse_url($url, PHP_URL_PATH)));
    }

    public function getType() {
        return $this->type;
    }

    public function getHost() {
        return $this->host;
    }

    public function getPort() {
        return $this->port;
    }

    public function getData() {
        return $this->data;
    }


}
