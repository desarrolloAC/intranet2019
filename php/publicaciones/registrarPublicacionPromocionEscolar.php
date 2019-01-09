<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

//DECLARO LAS VARIABLES QUE AGARRA LOS VALORES DE LOS INPUT
$idPublicacion = mysqli_insert_id($conexion);
$idOrganizacion = $_SESSION['ID_Organizacion'];
$idSubCategoria = $_POST['txtCodigoSubCategoriaAvanceInformativo'];
$cedula = $_SESSION['Cedula'];
$contenido = $_POST['txtContenidoAvanceInformativo'];
if (isset($_FILES['archivo']['error'])) {
    $error = $_FILES['archivo']['error'];
}
if (isset($_FILES['archivo']['name'])) {
    $foto = $_FILES['archivo']['name'];
}

if (isset($_FILES['archivo']['type'])) {
    $type = $_FILES['archivo']['type'];
}
$date = date("Y-m-d_His"); // date('Y-m-d i:m:s');
$titulo = $_POST['txtTituloAvanceInformativo'];
$created = date("Y-m-d H:i:s");
$createdBy = $_SESSION['Cedula'];
$updated = date("Y-m-d H:i:s");
$updateBy = $_SESSION['Cedula'];

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
            echo "El tamaño del archivo que ha enviado es nulo.";
            break;
    }//FIN DEL SWITCH CASE
}//FIN DEL IF
else {
    //si no hay error entonces $_FILES[’nombre del_archivo’][’error’] es 0
    if ((isset($foto) && ($error == UPLOAD_ERR_OK))) {
        $ruta = $_FILES['archivo']['tmp_name'];
        $destino_temp = '/intranet/assets/image/fotoPublicaciones/' . $date . strstr($foto, '.');
        $destino = $_SERVER['DOCUMENT_ROOT'] . $destino_temp;
        copy($ruta, $destino);
    }//FIN DEL IF
    else {
        echo "El archivo no se ha podido copiar en el directorio.";
    }//FIN DEL ESE
}//FIN DEL ELSE

$agregarPublicacion = mysqli_query($conexion, "INSERT INTO publicacion
VALUES (NULL,'$idOrganizacion','$idSubCategoria','$cedula','$contenido',DEFAULT,'$destino_temp','$titulo',DEFAULT,NULL,now(),'$createdBy',now(),'$updateBy',NULL,NULL)");

switch ($_SESSION['ID_Rol']) {
    case TypeUsuario::ADMINISTRADOR:
        //INGRESAR EL USUARIO COMO ADMINISTRADOR
        echo'<script language="javascript">
                 alert("Publicacion Realizada Con Exito");
                 location.href="../menuAdministrador.php";
                 </script>';
        break;
    case TypeUsuario::AUTORIZADOR:
        /* INGRESAR EL USUARIO COMO AUTORIZADOR  */
        echo'<script language="javascript">
                 alert("Publicacion Realizada Con Exito");
                 location.href="../menuAutorizador.php";
                 </script>';
        break;
    case TypeUsuario::EDITOR:
        /* INGRESAR EL USUARIO COMO EDITOR */
        echo'<script language="javascript">
                 alert("Publicacion Realizada Con Exito");
                 location.href="../menuEditor.php";
                 </script>';
        break;
    case TypeUsuario::PUBLICADOR:
        /* INGRESAR EL USUARIO COMO PUBLICADOR */
        echo'<script language="javascript">
                 alert("Publicacion Realizada Con Exito");
                 location.href="../menuPublicador.php";
            </script>';
        break;
    default: //LECTOR

        break;
}
?>
