<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$id_publicacion = $_GET['codigo'];
$usuario = $_GET['usuario'];

if (isset($_GET['estatus'])) {

    $estatus = $_GET['estatus'];

    $updEstado = " UPDATE  subcategoria
	                              SET  Estatus         ='$estatus',
	                                   UpdatedBy       ='$usuario',
	                                   Updated         = now()
	                            WHERE  ID_Subcategoria    ='$id_publicacion'";
}

mysqli_query($conexion, $updEstado);

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../subcategoria.php";
    </script>';

?>
