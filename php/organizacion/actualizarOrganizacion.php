<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$codigo = $_POST["txtCodigoOrganizacion"];
$nombre = $_POST["txtNombreOrganizacion"];
$updatedBy = $_SESSION['Cedula'];


$sql = "UPDATE organizacion Set Nombre = ?, updated = now(), updatedBy = ? WHERE  ID_Organizacion = ? ";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("sss",
    $nombre,
    $updatedBy,
    $codigo
);

$stmt->execute() or die(mysqli_error($conexion));

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../organizacion.php";
    </script>';



