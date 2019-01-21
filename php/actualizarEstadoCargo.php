<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
require_once('estadosLogin.php');

$conexion = conectar();

$ID_Cargo = $_GET['codigo'];
$estatus = $_GET['estatus'];
$usuario = $_GET['usuario'];

$updEstado = " UPDATE  cargo SET  "
        . "Estatus = '$estatus',
	    UpdatedBy = '$usuario',
	    Updated = now()
	    WHERE ID_Cargo='$ID_Cargo'";

mysqli_query($conexion, $editar);

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../cargo.php";
    </script>';

?>
