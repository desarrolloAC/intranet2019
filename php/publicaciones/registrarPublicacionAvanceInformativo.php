<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaAvanceInformativo'];
$titulo = $_POST['txtTituloAvanceInformativo'];
$contenido = $_POST['txtContenidoAvanceInformativo'];
$cedula = $_SESSION['Cedula'];
$createdBy = $_SESSION['Cedula'];
$updateBy = $_SESSION['Cedula'];

$date = date("Y-m-d_His");

$foto = $_FILES['archivo']['name'];
$error = $_FILES['archivo']['error'];
$ruta = $_FILES['archivo']['tmp_name'];
$destino_temp = 'assets/image/fotoPublicaciones/' . $date . strstr($foto, '.');
$destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp;

$foto1 = $_FILES['archivo1']['name'];
$error1 = $_FILES['archivo1']['error'];
$ruta1 = $_FILES['archivo1']['tmp_name'];
$destino_temp1 = 'assets/image/fotoPublicaciones/' . $date . strstr($foto1, '.');
$destino1 = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp1;

$foto2 = $_FILES['archivo2']['name'];
$error2 = $_FILES['archivo2']['error'];
$ruta2 = $_FILES['archivo2']['tmp_name'];
$destino_temp2 = 'assets/image/fotoPublicaciones/' . $date . strstr($foto2, '.');
$destino2 = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp2;

$foto3 = $_FILES['archivo3']['name'];
$error3 = $_FILES['archivo3']['error'];
$ruta3 = $_FILES['archivo3']['tmp_name'];
$destino_temp3 = 'assets/image/fotoPublicaciones/' . $date . strstr($foto3, '.');
$destino3 = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp3;


if ($error == 1 || $error1 == 1 || $error2 == 1 || $error3 == 1) {

    die("El tamaño del archivo supera el límite permitido
        por el servidor (argumento upload_max_filesize del archivo
        php.ini).");
} elseif ($error == 2 || $error1 == 2 || $error2 == 2 || $error3 == 2) {

    die(" El tamaño del archivo supera el límite permitido
        por el formulario (argumento post_max_size del archivo php.ini).");
} elseif ($error == 3 || $error1 == 3 || $error2 == 3 || $error3 == 3) {

    die("El envío del archivo se ha interrumpido durante
        la transferencia.");
} elseif ($error == 4 || $error1 == 4 || $error2 == 4 || $error3 == 4) {

    die("El tamaño del archivo que ha enviado es nulo.");
} else {

    if (!copy($ruta, $destino)) {
        die("Error al copiar 1  $destino \n");
    }

    if (!copy($ruta1, $destino1)) {
        die("Error al copiar 2 $destino1 \n");
    }

    if (!copy($ruta2, $destino2)) {
        die("Error al copiar  3 $destino2 \n");
    }

    if (!copy($ruta3, $destino3)) {
        die("Error al copiar 4 $destino3 \n");
    }


    $insert = " CALL sp_RegistroAvanceInf(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_prepare($conexion, $insert);
    $stmt->bind_param("sssssssssss",
            $idOrganizacion,
            $idSubCategoria,
            $cedula,
            $titulo,
            $createdBy,
            $updateBy,
            $contenido,
            $destino_temp,
            $destino_temp1,
            $destino_temp2,
            $destino_temp3
    );

    $stmt->execute() or die(mysqli_error($conexion));
}


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
