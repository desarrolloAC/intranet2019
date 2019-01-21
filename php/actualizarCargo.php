<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = trim($_POST["txtCodigo"]);
$dpto = $_POST["txtDep"];
$nombre = $_POST["txtNombre"];
$descripcion = $_POST["txtDesc"];
$updatedBy = $_SESSION['Cedula'];

$editar = " UPDATE cargo Set 
    Nombre = '$nombre',
    ID_Departamento ='$dpto',
    Descripcion ='$descripcion',
    updated = now(),
    updatedBy ='$updatedBy'
    WHERE ID_Cargo = '$codigo'";

mysqli_query($conexion, $editar);

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../cargo.php";
    </script>';


?>
