<?php
session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/notificaciones/Notificaciones.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();
$rol=$_SESSION['ID_Rol'];
$cedula=$_SESSION['Cedula'];
$sql="";
switch ($rol) {
    case 'LECT':
    $sql= "SELECT COUNT(*) AS n FROM publicacion where Estado NOT IN ('PUBLICADA')" ;
        break;
    case 'PUB':
    $sql= "SELECT COUNT(*) AS n FROM publicacion where Estado IN ('RECHAZADO_E','BORR')  AND CreatedBy='$cedula' ";
        break;
    case 'EDT':
    $sql= "SELECT COUNT(*) AS n FROM publicacion where Estado IN ('RECHAZADO_A','REVISION_E')";
        break; 
    case 'AUT':
    $sql= "SELECT COUNT(*) AS n FROM publicacion where Estado IN ('REVISION_A')";
        break;
    case 'ADM':
    $sql= "SELECT COUNT(*) AS n FROM publicacion";
        break;
}


$rs = mysqli_query($conexion, $sql);

$row = mysqli_fetch_array($rs, MYSQLI_ASSOC);

echo json_encode($row);
