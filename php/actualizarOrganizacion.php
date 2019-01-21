<?php

@
        session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = $_POST["txtCodigoOrganizacion"];
$nombre = $_POST["txtNombreOrganizacion"];
$updatedBy = $_SESSION['Cedula'];


$editar = " UPDATE organizacion
	            Set    Nombre ='$nombre',
			updated = now(),
			updatedBy ='$updatedBy'
	            WHERE  ID_Organizacion ='$codigo'";

//SE LEE LA VARIABLE QUERY CON LA INSTRUCCION SQL
mysqli_query($conexion, $editar);

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../organizacion.php";
    </script>';


?>
