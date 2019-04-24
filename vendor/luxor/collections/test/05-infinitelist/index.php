<?php

use Luxor\Collections\Lists\InfiniteList;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../../vendor/autoload.php';


$set = InfiniteList::of(10);

//for ($index = 0; $index < 20; $index++) {
//    echo $set->get().'</br>';
//}
//echo '</br>';
//echo $set->get(5).'</br>';


//var_dump($set->indexOf(20));

//var_dump($set->isContains(20));

//var_dump($set->isEquals(InfiniteList::of(10)));

//var_dump($set->iterator());

//print_r($set->removeAll()->toArray());

$set->start(50);
for ($index = 0; $index < 20; $index++) {
    echo $set->get().'</br>';
}
echo '</br>';
echo $set->get(5).'</br>';

//echo '</br>';
//print_r($set->toArray());





/*
 * Se debe ejecutar esto antes de probar.
 * 
 * composer install
 * composer dump-autoload --optimize
 */