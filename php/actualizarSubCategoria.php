<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = $_POST["txtCodigoSubCategoria"];
$codigocate = $_POST["txtCodigoCategoria"];
$nombre = $_POST["txtNombreSubCategoria"];
$descripcion = $_POST["txtDesc"];
$updatedBy = $_SESSION['Cedula'];

$editar = " UPDATE subcategoria
	            Set    Nombre	    ='$nombre',
	                   ID_Categoria ='$codigocate',
	                   Descripcion  ='$descripcion',
					   updated 	 	= now(),
					   updatedBy    ='$updatedBy'
	            WHERE  ID_Subcategoria	='$codigo'";

mysql_query($conexion, $editar);

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../subcategoria.php";
    </script>';


?>
