<?php

use Luxor\HttpController\Event\HttpEvent;
use Luxor\Test\Infrastructure\Config\Rutes;

//Para auto cargar archivos desde la peticion.
require __DIR__.'/../vendor/autoload.php';


//Ejecutar un controlador segun una ruta.
$event = new HttpEvent(__FILE__);
$event->setConfig(new Rutes());
$event->run();






/*
 * Se debe ejecutar esto, antes de probar.
 * 
 * composer clear-cache
 * composer install
 * composer dump-autoload --optimize
 */


