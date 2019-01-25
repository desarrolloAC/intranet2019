<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
require_once('estadosLogin.php');

$conexion = conectar();

$ID_Departamento = $_GET['codigo'];
$estatus = $_GET['estatus'];
$usuario = $_GET['usuario'];


$updEstado = " UPDATE departamento SET Estatus = ?, UpdatedBy = ?, Updated = CURRENT_TIMESTAMP WHERE ID_Departamento = ? ";

$stmt = mysqli_prepare($conexion, $updEstado);
$stmt->bind_param("sss",
    $estatus,
    $usuario,
    $ID_Departamento
);

$stmt->execute() or die(mysqli_error($conexion));


echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../departamento.php";
    </script>';

?>
