<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = trim($_POST["txtCodigoDepartamento"]);
$dpto = $_POST["txtOrg"];
$nombre = $_POST["txtNombreDepartamento"];
$descripcion = $_POST["txtDesc"];
$updatedBy = $_SESSION['Cedula'];

$editar = " UPDATE departamento Set    
                    Nombre = '$nombre',
	            ID_Organizacion = '$dpto',
	            Descripcion = '$descripcion',
		    updated = now(),
                    updatedBy = '$updatedBy'
	            WHERE ID_Departamento  ='$codigo'";

mysqli_query($conexion, $editar);

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../departamento.php";
    </script>';
?>
