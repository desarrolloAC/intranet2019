<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$cedula  = $_GET['cedula'];
$usuario = $_GET['usuario'];
$estatus = $_GET['estatus'];

$updEstado = " UPDATE usuario SET Estatus = ?, UpdatedBy = ?, Updated = CURRENT_TIMESTAMP WHERE cedula = ? ";

$stmt = mysqli_prepare($conexion, $updEstado);
$stmt->bind_param("sss",
    $estatus,
    $usuario,
    $cedula
);

$stmt->execute() or die(mysqli_error($conexion));



echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../usuario.php";
    </script>';

?>
