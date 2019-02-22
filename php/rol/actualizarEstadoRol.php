<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$ID_Rol = $_GET['codigo'];
$estatus = $_GET['estatus'];
$usuario = $_GET['usuario'];

$sql = "UPDATE rol SET  Estatus = ?, UpdatedBy = ?, Updated = now() WHERE  ID_Rol = ? ";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("sss",
    $estatus,
    $usuario,
    $ID_Rol
);

$stmt->execute() or die(mysqli_error($conexion));


echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../rol.php";
    </script>';


?>
