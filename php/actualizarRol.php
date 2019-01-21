<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = $_POST["txtCodigo"];
$nombre = $_POST["txtNombre"];
$descripcion = $_POST["txtDesc"];
$updatedBy = $_SESSION['Cedula'];


$editar = " UPDATE rol
	            Set    Nombre	    ='$nombre',
	                   Descripcion  ='$descripcion',
					   updated 	 	= now(),
					   updatedBy    ='$updatedBy'
	            WHERE  ID_Rol	    ='$codigo'";

//SE LEE LA VARIABLE QUERY CON LA INSTRUCCION SQL
mysqli_query($conexion, $editar);

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../rol.php";
    </script>';


?>
