<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$estatus = $_GET['estatus'];
$usuario = $_GET['usuario'];
$ID_Organizacion = $_GET['codigo'];


$updEstado = "UPDATE organizacion SET Estatus = ?, UpdatedBy = ?, Updated = CURRENT_TIMESTAMP WHERE ID_Organizacion = ? ";

$stmt = mysqli_prepare($conexion, $updEstado);
$stmt->bind_param("sss",
    $estatus,
    $usuario,
    $ID_Organizacion
);

$stmt->execute() or die(mysqli_error($conexion));


echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../organizacion.php";
    </script>';


