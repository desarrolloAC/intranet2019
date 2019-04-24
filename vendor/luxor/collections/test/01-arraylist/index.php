<?php

use Luxor\Collections\Lists\ArrayList;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../../vendor/autoload.php';



$list = ArrayList::of(array('uno','dos','tres','cuatro','cinco'));

//$list->add(10000000000)->add('dies');

//$list->addAll(array('uno','dos','tres','cuatro','cinco'));

//$list->set(4, 'diessss');

//var_dump($list->toArray());

print_r($list->toArray());

echo '<br>';
$list->remove(1);

print_r($list->toArray());


//print_r($list->subList(1,2)->toArray());

//$list->map(function($param) {
//
//    return strtoupper($param);
//
//})->each(function($param) {
//
//    echo $param.'<br>';
//
//});

//$list->filter(function($param) {
//    
//    $temp = false;
//    
//    if ($param == 'uno' || $param == 'tres' || $param == 'cinco') {
//        $temp = true;
//    }
//
//    return $temp;
//
//})->each(function($param) {
//
//    echo $param.'<br>';
//
//});

//echo $list->reducer(function($acum, $new) {
//    
//    return $acum.' '.$new;
//
//},'');

/*
 * Se debe ejecutar esto antes de probar.
 * 
 * composer install
 * composer dump-autoload --optimize
 */

