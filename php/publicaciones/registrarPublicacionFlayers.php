<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';
$conexion = conectar();

$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaFlayers'];
$cedula = $_SESSION['Cedula'];

$createdBy = $_SESSION['Cedula'];
$updateBy = $_SESSION['Cedula'];

$foto = $_FILES['btnImagenFlayers']['name'];
$error = $_FILES['btnImagenFlayers']['error'];
$origen = $_FILES['btnImagenFlayers']['tmp_name'];
$date= date("Y-m-d H:i:s"); // desvielve fecha en mumero en el siguiente formato(Año-mes-dia hora:minutos:segundo)
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

    if (!empty($foto)) {
        if (!copy($origen,$destino)) {
            throw new Exception(" Imagen  ".$foto."No pudo ser copiada al servidor");
        }

        $insert = " CALL sp_RegistroFlayers(?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_prepare($conexion, $insert);
        $stmt->bind_param("ssssss",
                $idOrganizacion,
                $idSubCategoria,
                $cedula,
                $createdBy,
                $updateBy,
                $destino_temp               
        );

        $stmt->execute() or die(mysqli_error($conexion));
    }
}



echo'<script language="javascript">
    alert("Publicacion Realizada Con Exito");
    location.href="../../publicacion.php";
</script>';
?>