<?php

use Luxor\Collections\Lists\FiniteList;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../../vendor/autoload.php';





$set = FiniteList::of(10, ['lunes','martes','miercoles','jueves','viernes']);

for ($index = 0; $index < 20; $index++) {
    $set->add($index);
}
for ($index1 = 0; $index1 < $set->lenght(); $index1++) {
    echo $set->get($index1).'</br>';
}

//var_dump($set->hashCode());

//$set->add('hola')->add('adios')->add('hasta luego');
//var_dump($set->indexOf('adios'));


//$set->add('hola')->add('adios')->add('hasta luego');
//var_dump($set->isContains('adios'));


//var_dump($set->isEquals(FiniteList::of(10, array('lunes','martes','miercoles','jueves','viernes'))));

//ar_dump($set->iterator());

//$set->limit(20);
//for ($index = 0; $index < 20; $index++) {
//    $set->add($index);
//}
//for ($index1 = 0; $index1 < $set->lenght(); $index1++) {
//    echo $set->get($index1).'</br>';
//}

//print_r($set->toArray());
//$set->remove(2);
//echo '</br>';
//print_r($set->toArray());

//print_r($set->removeAll()->toArray());

//print_r($set->toArray());
//$set->set(2, 'xxxxxxxxxxxx');
//echo '</br>';
//print_r($set->toArray());


print_r($set->subList(1,3,10)->toArray());




/*
 * Se debe ejecutar esto antes de probar.
 * 
 * composer install
 * composer dump-autoload --optimize
 */




