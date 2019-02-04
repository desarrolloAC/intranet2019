<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$id_publicacion = $_GET['codigo'];
$usuario = $_GET['usuario'];
$estatus = $_GET['estatus'];

$updEstado = " UPDATE categoria SET Estatus = ?, UpdatedBy = ?, Updated = CURRENT_TIMESTAMP WHERE ID_Categoria = ? ";

$stmt = mysqli_prepare($conexion, $updEstado);
$stmt->bind_param("sss",
    $estatus,
    $usuario,
    $id_publicacion
);

$stmt->execute() or die(mysqli_error($conexion));


echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../categoria.php";
    </script>';

?>
