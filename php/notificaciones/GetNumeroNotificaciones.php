<?php

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';

$conexion = conectar();


$sql = "SELECT COUNT(leido) AS n FROM notificacion where leido=0";


$rs = mysqli_query($conexion, $sql);

$row = mysqli_fetch_array($rs, MYSQLI_ASSOC);


echo json_encode($row);
