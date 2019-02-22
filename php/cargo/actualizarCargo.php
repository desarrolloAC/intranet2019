<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$codigo = trim($_POST["txtCodigo"]);
$dpto = $_POST["txtDep"];
$nombre = $_POST["txtNombre"];
$descripcion = $_POST["txtDesc"];
$updatedBy = $_SESSION['Cedula'];

$sql = " UPDATE cargo Set Nombre = ?, ID_Departamento = ?, Descripcion = ?, updated = now(), updatedBy = ? WHERE ID_Cargo = ?";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("sssss",
    $nombre,
    $dpto,
    $descripcion,
    $updatedBy,
    $codigo
);

$stmt->execute() or die(mysqli_error($conexion));

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../cargo.php";
    </script>';
