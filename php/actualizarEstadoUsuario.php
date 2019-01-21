<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$id_publicacion = $_GET['codigo'];
$usuario = $_GET['usuario'];
$estatus = $_GET['estatus'];

$updEstado = " UPDATE usuario SET Estatus = ?, UpdatedBy = ?, Updated = CURRENT_TIMESTAMP WHERE cedula = ? ";

$stmt = mysqli_prepare($conexion, $updEstado);
$stmt->bind_param("sss",
    $estatus,
    $usuario,
    $id_publicacion
);

$stmt->execute() or die(mysqli_error($conexion));



echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../categoria.php";
    </script>';

?>
