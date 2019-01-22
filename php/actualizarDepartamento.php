<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$ID_Departamento= $_POST["txtCodigoDepartamento"];
$Nombre = $_POST["txtNombreDepartamento"];
$Estatus = $_POST['estatus'];


$updEstado = " UPDATE departamento SET Estatus = ?, UpdatedBy = ?, Updated = CURRENT_TIMESTAMP WHERE ID_Departamento = ? ";

$stmt = mysqli_prepare($conexion, $updEstado);

$stmt->bind_param("ssss",
    $ID_Departamento,
    $nombre,
    $estatus 
);

$stmt->execute() or die(mysqli_error($conexion));

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../departamento.php";
    </script>';
?>
