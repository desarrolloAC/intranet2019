<?php

use Luxor\Test\UserDAO;
use Luxor\Test\User;


//Para auto cargar archivos desde la peticion.
require __DIR__.'/../vendor/autoload.php';


$test = new UserDAO();

//$test->create(new User(0,'Brayan', 'Martinez', '23427920'));
$test->update(new User(4,'Jase', 'Martinez', '23427920'));
//$test->delete(5);
$test->read(4);
$test->readAll();


/*
 * Se debe ejecutar esto antes de probar.
 * 
 * composer install
 * composer dump-autoload --optimize
 */



