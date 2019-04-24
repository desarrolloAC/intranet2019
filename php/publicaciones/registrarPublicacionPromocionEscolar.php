<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaPromocionEscolar'];
$cedula = $_SESSION['Cedula'];
$createdBy = $_SESSION['Cedula'];
$updateBy = $_SESSION['Cedula'];

$nombreCompleto = $_POST['txtNombreCompletoPromocionEscolar'];
$contenido = $_POST['txtContenidoPromocionEscolar'];
$date = date("Y-m-d_His");

$foto = $_FILES['btnImagenPromocionEscolar']['name'];
$error = $_FILES['btnImagenPromocionEscolar']['error'];
$origen = $_FILES['btnImagenPromocionEscolar']['tmp_name'];
$destino_temp = 'assets/image/fotoPublicaciones/' . $date . strstr($foto, '.');
$destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp;


switch ($error) {

    case 1: // UPLOAD_ERR_INI_SIZE
        echo "El tamaño del archivo supera el límite permitido
			por el servidor (argumento upload_max_filesize del archivo
			php.ini).";
        break;

    case 2: // UPLOAD_ERR_FORM_SIZE
        echo " El tamaño del archivo supera el límite permitido
			por el formulario (argumento post_max_size del archivo php.ini).";
        break;

    case 3: // UPLOAD_ERR_PARTIAL
        echo "El envío del archivo se ha interrumpido durante
			la transferencia.";
        break;

    case 4: // UPLOAD_ERR_NO_FILE
        echo "El tamaño del archivo que ha enviado es nulo.";
        break;

    default :

        copy($origen, $destino);


        $insert = " CALL sp_Registropromoescolar(?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_prepare($conexion, $insert);
        $stmt->bind_param("ssssssss",
                $idOrganizacion,
                $idSubCategoria,
                $cedula,
                $createdBy,
                $updateBy,
                $nombreCompleto,
                $contenido,
                $destino_temp
        );

        $stmt->execute() or die(mysqli_error($conexion));
}echo'<script language="javascript">
    alert("Publicacion Realizada Con Exito");
    location.href="../../publicacion.php";
</script>';
//
?>
