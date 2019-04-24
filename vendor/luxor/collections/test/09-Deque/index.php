<?php

use Luxor\Collections\Deque;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../../vendor/autoload.php';




$var = Deque::of(array('uno','dos','tres','cuatro','cinco'));

$var->unshift('xxxxx')->unshift('yyyyyy')->unshift('ttttttttt');

$var->push('nnnnn')->push('ooooo');

print_r($var->toArray());

echo '</br>';
echo $var->pop().'</br>';
echo $var->pop().'</br>';
print_r($var->toArray());


echo '</br>';
echo $var->shift().'</br>';
echo $var->shift().'</br>';
echo $var->shift().'</br>';
print_r($var->toArray());




/*
 * Se debe ejecutar esto antes de probar.
 * 
 * composer install
 * composer dump-autoload --optimize
 */