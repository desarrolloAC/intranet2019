<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$id_publicacion = $_POST["txtCodigoP"];
$titulo = $_POST["txtTituloP"];
$contenido = $_POST["contenido2"];
$id_subcategoria = $_POST["txtCodigoSubC"];
$motivo = $_POST["motivo"];
$updatedBy = $_SESSION['Cedula'];
$foto = $_FILES['btnImagen']['name'];
$error = $_FILES['btnImagen']['error'];
$ruta = $_FILES['btnImagen']['tmp_name'];
$date = date("Y-m-d_his"); // date('Y-m-d i:m:s');
$destino_temp = '/intranet/assets/image/fotoPublicaciones/' . $date . strstr($foto, '.');
$destino = $_SERVER['DOCUMENT_ROOT'] . $destino_temp;

if ($error) {

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
            $editar = "    UPDATE publicacion
                        Set
                                    titulo ='$titulo',
                                    contenido ='$contenido',
                                    id_subcategoria ='$id_subcategoria',
                                    motivo 				='$motivo',
                                    updated 			= now(),
                                    updatedBy 			='$updatedBy'
                        WHERE 	    id_publicacion		='$id_publicacion'";
            break;
    }//FIN DEL SWITCH CASE
} else {
//si no hay error entonces $_FILES[’nombre del_archivo’][’error’] es 0
    if ((isset($foto) && ($error == UPLOAD_ERR_OK))) {

        copy($ruta, $destino);

        $editar = " UPDATE publicacion
			Set
						titulo ='$titulo',
						contenido ='$contenido',
						id_subcategoria	='$id_subcategoria',
						foto ='$destino_temp',
						motivo ='$motivo',
						updated ='now()',
						updatedBy ='$updatedBy'
			WHERE id_publicacion ='$id_publicacion'";
    } else {
        echo "El Archivo no se ha Podido Copiar en el Directorio.";
    }//FIN DEL ESE
}//FIN DEL ELSE
//SE LEE LA VARIABLE QUERY CON LA INSTRUCCION SQL


mysqli_query($conexion, $editar);

switch ($_SESSION['ID_Rol']) {
    case TypeUsuario::ADMINISTRADOR:
        /* INGRESAR EL USUARIO COMO ADMINISTRADOR */
        echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuAdministrador.php";
                 </script>';
        break;
    case TypeUsuario::AUTORIZADOR:
        /* INGRESAR EL USUARIO COMO AUTORIZADOR */
        echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuAutorizador.php";
                 </script>';
        break;
    case TypeUsuario::EDITOR:
        /* INGRESAR EL USUARIO COMO EDITOR */
        echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuEditor.php";
                 </script>';
        break;
    case TypeUsuario::PUBLICADOR:
        /* INGRESAR EL USUARIO COMO PUBLICADOR */
        echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuPublicador.php";
            </script>';
        break;
    default: //LECTOR

        break;
}
?>
