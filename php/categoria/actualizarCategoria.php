<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$codigo = $_POST["txtCodigoCategoria"];
$nombre = $_POST["txtNombreCategoria"];
$descripcion = $_POST["txtDesc"];
$updatedBy = $_SESSION['Cedula'];

$sql = "UPDATE categoria Set Nombre = ?, Descripcion  = ?, updated = now(), updatedBy = ? WHERE  ID_Categoria = ?";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("ssss",
    $nombre,
    $descripcion,
    $updatedBy,
    $codigo
);

$stmt->execute() or die(mysqli_error($conexion));

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../categoria.php";
    </script>';
?>
