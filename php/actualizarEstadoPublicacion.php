<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$id_publicacion = $_GET['codigo'];
if (isset($_GET['estado'])) {
    $estado = $_GET['estado'];
}
$estado = $_GET['estado'];
$usuario = $_GET['usuario'];


if (isset($_GET['estatus'])) {
    $estatus = $_GET['estatus'];

    $updEstado = " UPDATE  publicacion
                              SET  Estatus         ='$estatus',
                                   UpdatedBy       ='$usuario',
                                   Updated         = now()
                            WHERE id_publicacion='$id_publicacion'";
} else {

    if (isset($_GET['fecha'])) {
        $updEstado = " UPDATE publicacion
                             SET Estado    ='$estado',
                                 UpdatedBy ='$usuario',
                                 Updated   = now(),
                                 F_Publicacion   = now()
                           WHERE id_publicacion='$id_publicacion'";
    } else {
        $updEstado = " UPDATE publicacion
                             SET Estado    ='$estado',
                                 UpdatedBy ='$usuario',
                                 Updated   = now()
                           WHERE id_publicacion='$id_publicacion'";
    }
}

mysqli_query($conexion, $updEstado);


if (isset($estado)) {
    if ($estado != 'BORR') {
        insertNotificacion($usuario, $estado, $usuario, $id_publicacion);
    }
}

switch ($_SESSION['ID_Rol']) {
    case TypeUsuario::ADMINISTRADOR:

        echo'<script language="javascript">
                 alert("Registro Actualizado Con Exito");
                 location.href="../menuAdministrador.php";
                 </script>';
        break;
    case TypeUsuario::AUTORIZADOR:

        echo'<script language="javascript">
                 alert("Registro Actualizado Con Exito");
                 location.href="../menuAutorizador.php";
                 </script>';
        break;
    case TypeUsuario::EDITOR:

        echo'<script language="javascript">
                 alert("Registro Actualizado Con Exito");
                 location.href="../menuEditor.php";
                 </script>';
        break;
    case TypeUsuario::PUBLICADOR:

        echo'<script language="javascript">
                 alert("Registro Actualizado Con Exito");
                 location.href="../menuPublicador.php";
            </script>';
        break;
    default: //LECTOR

        break;
}

function insertNotificacion($usuario, $estado, $createdby, $id_publicacion) {

    $conexion = conectar();

    $query = " SELECT PNombre, PApellido FROM usuario WHERE Cedula='$usuario' ";
    $rs = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);


    switch ($estado) {
        case 'RECHAZADO_A':
            $msg = "$row[PNombre] $row[PApellido], ha Rechazado tu Publicación.";
            break;
        case 'REVISION_E':
            $msg = "$row[PNombre] $row[PApellido], ha Hecho una Nueva Publicación.";
            break;
        case 'RECHAZADO_E':
            $msg = "$row[PNombre] $row[PApellido], ha Rechazado tu Publicación.";
            break;
        case 'REVISION_A':
            $msg = "$row[PNombre] $row[PApellido], te ha Enviado una Publicación.";
            break;
        case 'PUBLICADA':
            $msg = "$row[PNombre] $row[PApellido], ha Realizado una Nueva Publicación.";
            break;
        default: //BORR
            $msg = ' ';
            break;
    }

    $sql = " INSERT INTO notificacion (ID_Notificacion, ID_Publicacion, CreatedBy, Estado_Public, Mensaje, leido, Fecha)
              VALUES (NULL, '$id_publicacion', '$usuario', '$estado', '$msg', DEFAULT, CURRENT_TIMESTAMP);";

    mysqli_query($conexion, $sql);
}

?>
