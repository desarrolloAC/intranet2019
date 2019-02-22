<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$codigo = trim($_POST['txtCodigoDepartamento']);
$nombre = $_POST['txtNombreDepartamento'];
$dpto = $_POST['txtOrg'];
$descripcion = $_POST['txtDesc'];
$cedula = $_SESSION['Cedula'];


$sql = "UPDATE departamento SET Nombre = ?, ID_Organizacion = ?, Descripcion = ?, UpdatedBy = ?, Updated = CURRENT_TIMESTAMP WHERE ID_Departamento = ? ";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("sssss",
    $nombre,
    $dpto,
    $descripcion,
    $cedula,
    $codigo
);

$stmt->execute() or die(mysqli_error($conexion));

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../departamento.php";
    </script>';
?>
