<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaBoletinInformativo'];
$titulo = $_POST['txtTituloBoletinInformativo'];
$contenido = $_POST['txtContenidoBoletinInformativo'];


$cedula = $_SESSION['Cedula'];
$date = date("Y-m-d_His");
$created = date("Y-m-d H:i:s");
$createdBy = $_SESSION['Cedula'];
$updated = date("Y-m-d H:i:s");
$updateBy = $_SESSION['Cedula'];


$foto = $_FILES['archivo']['name'];
$error = $_FILES['archivo']['error'];
$ruta = $_FILES['archivo']['tmp_name'];

$foto1 = $_FILES['archivo1']['name'];
$error1 = $_FILES['archivo1']['error'];
$ruta1 = $_FILES['archivo1']['tmp_name'];

$foto2 = $_FILES['archivo2']['name'];
$error2 = $_FILES['archivo2']['error'];
$ruta2 = $_FILES['archivo2']['tmp_name'];

$foto3 = $_FILES['archivo3']['name'];
$error3 = $_FILES['archivo3']['error'];
$ruta3 = $_FILES['archivo3']['tmp_name'];

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

        copy($ruta, $destino);

        $insert = " CALL sp_RegistroBoletin(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_prepare($conexion, $insert);
        $stmt->bind_param("ssssssss",
                $idOrganizacion,
                $idSubCategoria,
                $cedula,
                $contenido,
                $destino_temp,
                $titulo,
                $createdBy,
                $updateBy
        );

        $stmt->execute();
}


switch ($_SESSION['ID_Rol']) {

    case TypeUsuario::ADMINISTRADOR:
        echo'<script language="javascript">
                alert("Publicacion Realizada Con Exito");
                location.href="../menuAdministrador.php";
            </script>';
        break;

    case TypeUsuario::AUTORIZADOR:
        echo'<script language="javascript">
                alert("Publicacion Realizada Con Exito");
                location.href="../menuAutorizador.php";
            </script>';
        break;

    case TypeUsuario::EDITOR:
        echo'<script language="javascript">
                alert("Publicacion Realizada Con Exito");
                location.href="../menuEditor.php";
            </script>';
        break;

    case TypeUsuario::PUBLICADOR:
        echo'<script language="javascript">
                alert("Publicacion Realizada Con Exito");
                location.href="../menuPublicador.php";
            </script>';
        break;

    default: //LECTOR

        break;
}
?>
