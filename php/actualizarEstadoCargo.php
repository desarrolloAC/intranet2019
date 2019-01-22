<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$ID_Cargo = $_GET['codigo'];
$usuario = $_GET['usuario'];
$estatus = $_GET['estatus'];


$updEstado = " UPDATE cargo SET Estatus = ?, UpdatedBy = ?, Updated = CURRENT_TIMESTAMP WHERE ID_Cargo = ? ";

$stmt = mysqli_prepare($conexion, $updEstado);
$stmt->bind_param("sss",
    $estatus,
    $usuario,
    $ID_Cargo
);

$stmt->execute() or die(mysqli_error($conexion));

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../cargo.php";
    </script>';

?>
