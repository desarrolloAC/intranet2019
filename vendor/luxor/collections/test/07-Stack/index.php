<?php

use Luxor\Collections\Stack;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../../vendor/autoload.php';




$var = Stack::of(array('uno','dos','tres','cuatro','cinco'));

$var->push(5)->push(10)->push(30)->push(45);


//
//print_r($var->toArray());
//echo '</br>';
//echo $var->pop();
//echo '</br>';
//echo $var->pop();
//echo '</br>';
print_r($var->toArray());

//var_dump($var->isEmpty());


//var_dump($var->isContains('dos'));





/*
 * Se debe ejecutar esto antes de probar.
 * 
 * composer install
 * composer dump-autoload --optimize
 */