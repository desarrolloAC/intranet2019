<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaPostulate'];
$cedula = $_SESSION['Cedula'];
$contenido1 = $_POST['txtContenidoPostulate'];
$contenido2 = $_POST['txtPosicionesPostulate'];
$contenido3 = $_POST['txtResponsabilidadesPostulate'];
$contenido4 = $_POST['txtCorreo'];
$contenido5 = $_POST['txtFecha'];

$createdBy = $_SESSION['Cedula'];
$updateBy = $_SESSION['Cedula'];



$insert = " CALL sp_RegistroPostulacion(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";


$stmt = mysqli_prepare($conexion, $insert);
$stmt->bind_param("ssssssssss",
        $idOrganizacion,
        $idSubCategoria,
        $cedula,
        $createdBy,
        $updateBy,
        $contenido1,
        $contenido2,
        $contenido3,
        $contenido4,
        $contenido5
);

$stmt->execute() or die(mysqli_error($conexion));


switch ($_SESSION['ID_Rol']) {

    case TypeUsuario::ADMINISTRADOR:

        //INGRESAR EL USUARIO COMO ADMINISTRADOR
        echo'<script language="javascript">
                 alert("Publicacion Realizada Con Exito");
                 location.href="../../menuAdministrador.php";
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
                 location.href="../../menuPublicador.php";
            </script>';
        break;

    default: //LECTOR

        break;
}
?>
