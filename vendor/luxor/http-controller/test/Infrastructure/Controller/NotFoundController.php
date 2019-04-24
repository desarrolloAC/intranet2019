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

namespace Luxor\Test\Infrastructure\Controller;

use Luxor\HttpController\Http\Request;
use Luxor\HttpController\Controller\Controller;



/**
 * Description of DefaultController
 *
 * @author brayan
 */
class NotFoundController extends Controller {
    
    
    public function indexActions(Request $request) {
        
        echo '<br>';
        echo '<h1>Error 404</h1><br>';
        echo '<p>No se ha encontrado la pagina.</p><br>';
        
    }
}
