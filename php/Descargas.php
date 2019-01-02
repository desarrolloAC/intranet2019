<?php
$id=$_GET['id']; 
$de='http://192.168.0.130/SITE/PROCESOS/documentos/Descargas/FORMATOtaxi.xlsx';
$dei='FORMATOtaxi.xlsx';
    
    switch ($id){
            
        case '1':
                header('Content-type:application/octet-stream');
                header('Content-disposition: attachment; filename="'.$dei.'"');
                readfile($de);
            break;
            
    }
  ?>