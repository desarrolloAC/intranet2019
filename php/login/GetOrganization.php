<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/login/Organization.php';



$conexion = conectar();
$cedula   = $_SESSION['Cedula'];

$query = "SELECT DISTINCT(o.ID_Organizacion), o.Nombre
    FROM org_usuario_rol oru
    RIGHT  JOIN usuario      u  ON (oru.Cedula          =  u.Cedula)
    RIGHT  JOIN organizacion o  ON (oru.ID_Organizacion =  o.ID_Organizacion)
    WHERE  u.Cedula ='$cedula'
    AND oru.Estatus='A' AND o.Estatus='A' AND u.Estatus='A';";

$rs = mysql_query($query, $conexion);

$list = [];

while ($row = mysql_fetch_array($rs)) {

    $inst = new Organization();
    $inst->setKey($row["ID_Organizacion"]);
    $inst->setName($row['Nombre']);

    array_push($list, $inst);
}

echo json_encode($list);
