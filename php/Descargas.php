<?php
$id = $_GET['id'];

switch ($id){

    case '1':
        header('Content-type:application/octet-stream');
        header('Content-disposition: attachment; filename="FORMATOtaxi.xlsx"');
        readfile('http://192.168.0.130/SITE/PROCESOS/documentos/Descargas/FORMATOtaxi.xlsx');
    break;
     case '2':
        header('Content-type:application/octet-stream');
        header('Content-disposition: attachment; filename="FORMATOtaxi.xlsx"');
        readfile('http://192.168.0.130/SITE/PROCESOS/documentos/Descargas/FORMATOtaxi.xlsx');
    break;
     case '3':
        header('Content-type:application/octet-stream');
        header('Content-disposition: attachment; filename="FORMATOtaxi.xlsx"');
        readfile('http://192.168.0.130/SITE/PROCESOS/documentos/Descargas/FORMATOtaxi.xlsx');
    break;
     case '4':
        header('Content-type:application/octet-stream');
        header('Content-disposition: attachment; filename="FORMATOtaxi.xlsx"');
        readfile('http://192.168.0.130/SITE/PROCESOS/documentos/Descargas/FORMATOtaxi.xlsx');
    break;
}
  ?>
