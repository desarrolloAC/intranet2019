<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

//DECLARO LAS VARIABLES QUE AGARRA LOS VALORES DE LOS INPUT
$idPublicacion = mysqli_insert_id($conexion);
$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaComunicado'];
$cedula = $_SESSION['Cedula'];
$contenido = $_POST['txtContenidoComunicado'];
$date = date("Y-m-d_His"); // date('Y-m-d i:m:s');
$titulo = $_POST['txtTituloComunicado'];
$created = date("Y-m-d H:i:s");
$createdBy = $_SESSION['Cedula'];
$updated = date("Y-m-d H:i:s");
$updateBy = $_SESSION['Cedula'];

$agregarPublicacion = mysqli_query($conexion, "INSERT INTO publicacion VALUES(NULL,'$idOrganizacion','$idSubCategoria','$cedula','$contenido',DEFAULT,NULL,'$titulo',DEFAULT,NULL,now(),'$createdBy',now(),'$updateBy',NULL,NULL)");

switch ($_SESSION['ID_Rol']) {
    case TypeUsuario::ADMINISTRADOR:
        //INGRESAR EL USUARIO COMO ADMINISTRADOR
        echo'<script language="javascript">
                 alert("Publicacion Realizada Con Exito");
                 location.href="../menuAdministrador.php";
                 </script>';
        break;
    case TypeUsuario::AUTORIZADOR:
        /* INGRESAR EL USUARIO COMO AUTORIZADOR  */
        echo'<script language="javascript">
                 alert("Publicacion Realizada Con Exito");
                 location.href="../menuAutorizador.php";
                 </script>';
        break;
    case TypeUsuario::EDITOR:
        /* INGRESAR EL USUARIO COMO EDITOR */
        echo'<script language="javascript">
                 alert("Publicacion Realizada Con Exito");
                 location.href="../menuEditor.php";
                 </script>';
        break;
    case TypeUsuario::PUBLICADOR:
        /* INGRESAR EL USUARIO COMO PUBLICADOR */
        echo'<script language="javascript">
                 alert("Publicacion Realizada Con Exito");
                 location.href="../menuPublicador.php";
            </script>';
        break;
    default: //LECTOR

        break;
}
?>
