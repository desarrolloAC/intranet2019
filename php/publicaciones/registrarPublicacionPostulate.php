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


echo'<script language="javascript">
    alert("Publicacion Realizada Con Exito");
    location.href="../../publicacion.php";
</script>';


?>
