<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaNuevoAscenso'];

$cedula = $_SESSION['Cedula'];
$createdBy = $_SESSION['Cedula'];
$updateBy = $_SESSION['Cedula'];

$colaborador = $_POST['txtNombreCompletoNuevoAscenso'];
$departamento = $_POST['txtDpto'];
$cargo = $_POST['txtCargo'];
$contenido = $_POST['txtContenidoNuevoAscenso'];

$destino_temp = 'assets/image/fotoPublicaciones/' . $date . strstr($foto, '.');
$destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp;

$foto = $_FILES['btnImagenNuevoAscenso']['name'];
$error = $_FILES['btnImagenNuevoAscenso']['error'];
$ruta = $_FILES['btnImagenNuevoAscenso']['tmp_name'];



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

        $insert = " CALL sp_RegistroAscenso(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";


        $stmt = mysqli_prepare($conexion, $insert);
        $stmt->bind_param("ssssssssss",
                $idOrganizacion,
                $idSubCategoria,
                $cedula,
                $createdBy,
                $updateBy,
                $colaborador,
                $departamento,
                $cargo,
                $contenido,
                $destino_temp
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
