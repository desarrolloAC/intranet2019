<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaComunicado'];
$cedula = $_SESSION['Cedula'];
$titulo = $_POST['txtTituloComunicado'];
$createdBy = $_SESSION['Cedula'];
$updateBy = $_SESSION['Cedula'];
$contenido = $_POST['txtContenidoComunicado'];

$date = date("Y-m-d_His");


$insert = " CALL sp_RegistroComunicado(?, ?, ?, ?, ?, ?, ?);";

$stmt = mysqli_prepare($conexion, $insert);
$stmt->bind_param("sssssss",
        $idOrganizacion,
        $idSubCategoria,
        $cedula,
        $titulo,
        $createdBy,
        $updateBy,
        $contenido
);

$stmt->execute() or die(mysqli_error($conexion));


echo'<script language="javascript">
    alert("Publicacion Realizada Con Exito");
    location.href="../../publicacion.php";
</script>';

?>
