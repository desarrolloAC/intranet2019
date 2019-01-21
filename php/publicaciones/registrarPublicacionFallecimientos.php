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


echo'<script language="javascript">
    alert("Publicacion Realizada Con Exito");
    location.href="../../publicacion.php";
</script>';

?>
