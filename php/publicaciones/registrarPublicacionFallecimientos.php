<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaCondolencia'];
$cedula = $_SESSION['Cedula'];
$createdBy = $_SESSION['Cedula'];
$updateBy = $_SESSION['Cedula'];
$contenido = $_POST['txtContenidoCondolencia'];


$insert = " CALL sp_RegistroFallecimiento(?, ?, ?, ?, ?, ?);";


$stmt = mysqli_prepare($conexion, $insert);
$stmt->bind_param("ssssss",
        $idOrganizacion,
        $idSubCategoria,
        $cedula,
        $contenido,
        $createdBy,
        $updateBy
);

$stmt->execute() or die (mysqli_error($conexion));


switch ($_SESSION['ID_Rol']) {

    case TypeUsuario::ADMINISTRADOR:
        echo'<script language="javascript">
                alert("Publicacion Realizada Con Exito");
                location.href="../../menuAdministrador.php";
            </script>';
        break;

    case TypeUsuario::AUTORIZADOR:
        echo'<script language="javascript">
                alert("Publicacion Realizada Con Exito");
                location.href="../../menuAutorizador.php";
            </script>';
        break;

    case TypeUsuario::EDITOR:
        echo'<script language="javascript">
                alert("Publicacion Realizada Con Exito");
                location.href="../../menuEditor.php";
            </script>';
        break;

    case TypeUsuario::PUBLICADOR:
        echo'<script language="javascript">
                alert("Publicacion Realizada Con Exito");
                location.href="../../menuPublicador.php";
            </script>';
        break;

    default: //LECTOR

        break;
}
?>
