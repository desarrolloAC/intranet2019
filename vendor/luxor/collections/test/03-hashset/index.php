<?php

use Luxor\Collections\Set\HashSet;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../../vendor/autoload.php';


$set = HashSet::of(array('uno','brayan','dos','jose','tres','maria'));

//$set->add('cuatro', 'xcxxxxxxxxxxxxxxxxx');
//print_r($set->toArray());

//print_r($set->getKeys());

//var_dump($set->hashCode());

//var_dump($set->isContains('brayan'));

//var_dump($set->isEquals(HashSet::of(array('uno','bryayan','dos','jose','tres','maria'))));

//var_dump($set->isEmpty());

//print_r($set->toArray());
//echo '</br>';
//print_r($set->remove('dos')->toArray());

print_r($set->remove('tres')->toArray());



//print_r($set->toArray());




/*
 * Se debe ejecutar esto antes de probar.
 * 
 * composer install
 * composer dump-autoload --optimize
 */