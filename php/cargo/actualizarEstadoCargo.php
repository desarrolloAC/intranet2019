<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$ID_Cargo = $_GET['codigo'];
$usuario = $_GET['usuario'];
$estatus = $_GET['estatus'];

$sql = " UPDATE cargo SET Estatus = ?, UpdatedBy = ?, Updated = CURRENT_TIMESTAMP WHERE ID_Cargo = ? ";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("sss",
    $estatus,
    $usuario,
    $ID_Cargo
);

$stmt->execute() or die(mysqli_error($conexion));

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../cargo.php";
    </script>';


