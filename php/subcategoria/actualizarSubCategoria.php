<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$codigo = $_POST["txtCodigoSubCategoria"];
$codigocate = $_POST["txtCodigoCategoria"];
$nombre = $_POST["txtNombreSubCategoria"];
$descripcion = $_POST["txtDesc"];
$updatedBy = $_SESSION['Cedula'];

$sql = "UPDATE subcategoria Set Nombre = ?, ID_Categoria = ?, Descripcion = ?, updated = now(), updatedBy = ? WHERE ID_Subcategoria = ? ";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("sssss",
    $nombre,
    $codigocate,
    $descripcion,
    $updatedBy,
    $codigo
);

$stmt->execute() or die(mysqli_error($conexion));

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../subcategoria.php";
    </script>';


