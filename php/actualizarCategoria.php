<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = $_POST["txtCodigoCategoria"];
$nombre = $_POST["txtNombreCategoria"];
$descripcion = $_POST["txtDesc"];
$updatedBy = $_SESSION['Cedula'];
//$fechaModificacion 	= date('d-m-Y');

$editar = " UPDATE categoria
	            Set    Nombre	    ='$nombre',
	                   Descripcion  ='$descripcion',
					   updated 	 	= now(),
					   updatedBy    ='$updatedBy'
	            WHERE  ID_Categoria	='$codigo'";

//SE LEE LA VARIABLE QUERY CON LA INSTRUCCION SQL
mysqli_query($conexion, $editar);

switch ($_SESSION['ID_Rol']) {
    case TypeUsuario::ADMINISTRADOR:

        echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuAdministrador.php";
                 </script>';
        break;
    case TypeUsuario::AUTORIZADOR:

        echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuAutorizador.php";
                 </script>';
        break;
    case TypeUsuario::EDITOR:

        echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuEditor.php";
                 </script>';
        break;
    case TypeUsuario::PUBLICADOR:

        echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuPublicador.php";
            </script>';
        break;
    default: //LECTOR

        break;
}
?>
