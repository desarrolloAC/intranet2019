<?php

use Luxor\Collections\Queue;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../../vendor/autoload.php';



$var = Queue::of(array('uno','dos','tres','cuatro','cinco'));

$var->enqueue(5)->enqueue(10)->enqueue(30)->enqueue(45);


//print_r($var->toArray());
//echo '</br>';
//echo $var->dequeue();
//echo '</br>';
//echo $var->dequeue();
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