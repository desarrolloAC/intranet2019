<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/notificaciones/Notificaciones.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';


$conexion = conectar();
$rol=$_SESSION['ID_Rol'];
$cedula=$_SESSION['Cedula'];
switch ($rol) {
    case 'LECT':
    $sql="SELECT   p.ID_Publicacion,
                   p.Estado as Estado_Public,
                   CONCAT(u.PNombre,' ',u.PApellido,',  ','ha Realizado una Nueva Publicación.') as  Mensaje
                        FROM publicacion p
                        INNER join usuario 	 u ON (u.Cedula=p.CreatedBy)
                        WHERE Estado IN ('PUBLICADA')
                        ORDER BY p.ID_Publicacion DESC";
        break;
    case 'PUB':
    $sql = "SELECT  p.ID_Publicacion,
                    p.Estado as Estado_Public,
                    CONCAT(u.PNombre,' ',u.PApellido,',  ','ha Realizado una Nueva Publicación.') as  Mensaje
                        FROM publicacion p
                        INNER join usuario 	 u ON (u.Cedula=p.CreatedBy)  
                        WHERE p.Estado IN ('RECHAZADO_E','BORR') AND u.Cedula='$cedula'
                        ORDER BY p.ID_Publicacion DESC";
    
        break;
    case 'EDT':
    $sql= "SELECT  p.ID_Publicacion,
                   p.Estado as Estado_Public,
                   CONCAT(u.PNombre,' ',u.PApellido,',  ','ha Realizado una Nueva Publicación.') as  Mensaje
                        FROM publicacion p
                        INNER join usuario 	 u ON (u.Cedula=p.CreatedBy)
                        WHERE p.Estado IN ('RECHAZADO_A','REVISION_E')
                        ORDER BY p.ID_Publicacion DESC";
        break; 
    case 'AUT':
    $sql= "SELECT  p.ID_Publicacion,
                   p.Estado as Estado_Public,
                   CONCAT(u.PNombre,' ',u.PApellido,',  ','ha Realizado una Nueva Publicación.') as  Mensaje
                        FROM publicacion p
                        INNER join usuario 	 u ON (u.Cedula=p.CreatedBy)
                        WHERE p.Estado IN ('REVISION_A')
                        ORDER BY p.ID_Publicacion DESC";
        break;
    case 'ADM':
    $sql= "SELECT  p.ID_Publicacion,
                   p.Estado as Estado_Public,
                   CONCAT(u.PNombre,' ',u.PApellido,',  ','ha Realizado una Nueva Publicación.') as  Mensaje
                        FROM publicacion p
                        INNER join usuario 	 u ON (u.Cedula=p.CreatedBy)
                        ORDER BY p.ID_Publicacion DESC";
        break;
}

$rs = mysqli_query($conexion, $sql);


$list = [];

while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new Notificaciones();
    $inst->setPublicacionId($row["ID_Publicacion"]);
    $inst->setEstadoPublicacion($row['Estado_Public']);
    $inst->setMensaje($row["Mensaje"]);


    array_push($list, $inst);
}

echo json_encode($list);
