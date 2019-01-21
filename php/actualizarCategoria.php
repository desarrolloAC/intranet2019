<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = $_POST["txtCodigoCategoria"];
$nombre = $_POST["txtNombreCategoria"];
$descripcion = $_POST["txtDesc"];
$updatedBy = $_SESSION['Cedula'];

$editar = " UPDATE categoria Set    "
        . "Nombre = '$nombre',
	Descripcion  = '$descripcion',
	updated = now(),
	updatedBy = '$updatedBy'
	WHERE  ID_Categoria	='$codigo'";

//SE LEE LA VARIABLE QUERY CON LA INSTRUCCION SQL
mysqli_query($conexion, $editar);

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../categoria.php";
    </script>';
?>
