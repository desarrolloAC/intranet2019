<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
require_once('estadosLogin.php');

$conexion = conectar();

$ID_Organizacion = $_GET['codigo'];
$estatus = $_GET['estatus'];
$usuario = $_GET['usuario'];

$updEstado = " UPDATE  organizacion
	                  SET  Estatus         ='$estatus',
	                       UpdatedBy       ='$usuario',
	                       Updated         = now()
	                WHERE  ID_Organizacion=' $ID_Organizacion'";

mysqli_query($conexion, $editar);

<<<<<<< Updated upstream
echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../organizacion.php";
    </script>';
=======
switch ($_SESSION['ID_Rol']) {
    case TypeUsuario::ADMINISTRADOR:

        echo'<script language="javascript">
                 alert("Estado Actualizado Con Exito");
                 location.href="../menuAdministrador.php";
                 </script>';
        break;
    case TypeUsuario::AUTORIZADOR:

        echo'<script language="javascript">
                 alert("Estado Actualizado Con Exito");
                 location.href="../menuAutorizador.php";
                 </script>';
        break;
    case TypeUsuario::EDITOR:

        echo'<script language="javascript">
                 alert("Estado Actualizado Con Exito");
                 location.href="../menuEditor.php";
                 </script>';
        break;
    case TypeUsuario::PUBLICADOR:

        echo'<script language="javascript">
                 alert("Estado Actualizado Con Exito");
                 location.href="../menuPublicador.php";
            </script>';
        break;
    
    default: //LECTOR

        break;
}
>>>>>>> Stashed changes
?>
