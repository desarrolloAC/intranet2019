<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaCumpleMes'];
$cedula = $_SESSION['Cedula'];

$createdBy = $_SESSION['Cedula'];
$updateBy = $_SESSION['Cedula'];


$nombreCompleto = $_POST['txtNombreCompletoCumpleMes'];
$departamento = $_POST['txtDpto2'];
$fecha = $_POST['txtFechaCumpleMes'];


$foto = $_FILES['btnImagenCumpleMes']['name'];
$error = $_FILES['btnImagenCumpleMes']['error'];
$origen = $_FILES['btnImagenCumpleMes']['tmp_name'];

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

        $insert = " CALL sp_RegistroCumple( ?, ?, ?, ?, ?, ?, ?, ?, ?);";


        $stmt = mysqli_prepare($conexion, $insert);
        $stmt->bind_param("sssssssss",
                $idOrganizacion,
                $idSubCategoria,
                $cedula,
                $createdBy,
                $updateBy,
                $nombreCompleto,
                $departamento,
                $fecha,
                $destino_temp
        );

        $stmt->execute();
}


echo'<script language="javascript">
    alert("Publicacion Realizada Con Exito");
    location.href="../../publicacion.php";
</script>';
?>
