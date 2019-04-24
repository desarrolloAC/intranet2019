<?php

use Luxor\Collections\Map\HashMap;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../../vendor/autoload.php';




$map = HashMap::of(array('uno','brayan','dos','jose','tres','maria'));


//var_dump($map->isContainsKey('uno'));

//var_dump($map->isContainsValue('brayan'));

//var_dump($map->isEmpty());

//var_dump($map->isEquals(HashMap::of(array('uno','brayan','dos','jose','tres','5'))));

//print_r($map->toArray());
//$map->remove('dos');
//echo '</br>';
//print_r($map->toArray());

//print_r($map->removeAll()->toArray());

//print_r($map->subMap(array('uno','tres'))->toArray());

print_r($map->toArray());

//echo '</br>';
//
//echo $map->lenght();



/*
 * Se debe ejecutar esto antes de probar.
 * 
 * composer install
 * composer dump-autoload --optimize
 */
