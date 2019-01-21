<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
require_once('estadosLogin.php');
$conexion = conectar();

$ID_Rol = $_GET['codigo'];
$estatus = $_GET['estatus'];
$usuario = $_GET['usuario'];

$updEstado = " UPDATE  rol
	                  SET  Estatus = '$estatus',
	                       UpdatedBy = '$usuario',
	                       Updated = now()
	                WHERE  ID_Rol='$ID_Rol'";

mysqli_query($conexion, $updEstado);

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../rol.php";
    </script>';


?>
