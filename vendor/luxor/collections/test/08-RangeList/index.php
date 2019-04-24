<?php

use Luxor\Collections\Lists\RangeList;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../../vendor/autoload.php';


$var = RangeList::of('a', 'z');

print_r($var->toArray());

//var_dump($var->isEmpty());

var_dump($var->isEquals(RangeList::of('a', 'z')));





/*
 * Se debe ejecutar esto antes de probar.
 * 
 * composer install
 * composer dump-autoload --optimize
 */