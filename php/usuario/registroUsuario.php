<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/EstadoFile.php';

$conexion = conectar();


$organizacion = $_SESSION['ID_Organizacion'];
$createdBy = $_SESSION['Cedula'];

$cedula = $_POST["txtCedula"];
$pNombre = $_POST["txtpNombre"];
$sNombre = $_POST["txtsNombre"];
$pApellido = $_POST["txtpApellido"];
$sApellido = $_POST["txtsApellido"];
$sexo = $_POST["cbSexo"];
$cargo = $_POST["cbCargo"];
$correo = $_POST["txtCorreo"];
$telefono = $_POST["txttelefono"];
$pass = $_POST["clave1"];
$rol = $_POST["rol"];

$pais = $_POST["pai"];
$estado = $_POST["edo"];
$municipio = $_POST["mun"];
$ciudad = $_POST["ciu"];
$parroquia = $_POST["par"];
$Direccion = $_POST["dir"];

$pre = $_POST["pre"];
$res = $_POST["res"];


try {

    $error = $_FILES['btnImagen']['error'];
    
    if (!isset($error) || is_array($error)) {
        throw new RuntimeException('Parametros invalidos.');
    }
    
    switch ($error) {

        case EstadoFile::UPLOAD_ERR_INI_SIZE: 
            throw new RuntimeException('El tamaño del archivo supera el límite permitido por el servidor (argumento upload_max_filesize del archivo php.ini).');
            break;

        case EstadoFile::UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('El tamaño del archivo supera el límite permitido por el formulario (argumento post_max_size del archivo php.ini).');
            break;

        case EstadoFile::UPLOAD_ERR_PARTIAL:
            throw new RuntimeException('El envío del archivo se ha interrumpido durante la transferencia.');
            break;

        case EstadoFile::UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('El archivo no se ha enviado.');
            break;

        default :

            //validar el tamano de la imagen
            if ($_FILES['btnImagen']['size'] > 1000000000) {
                throw new RuntimeException('El archivo supera lo 100 Mb');
            }
            
            //origen
            $origen = $_FILES['btnImagen']['tmp_name'];
            
            //destino
            $destino_temp = 'assets/image/directorio/' . date("Y-m-d_his") . strstr($_FILES['btnImagen']['name'], '.');
            $destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp;

            //mover la foto
            if (move_uploaded_file($origen, $destino)) {
                throw new RuntimeException('No se pudo mover el archivo '.$_FILES['btnImagen']['name'].'.');
            }

            //registrar
            if (isset($pass)) {

                $seguridad = "INSERT INTO seguridad VALUES (NULL,'$correo',DEFAULT, SHA1('$pass'),'$pre', '$res');";

                $ed = "INSERT INTO usuario (Cedula, ID_Cargo, ID_Pais, ID_Estado, ID_Municipio, ID_Parroquia,
                                                                         ID_Ciudad, PNombre, SNombre, PApellido, SApellido, Correo, Telefono, Sexo, Direccion,
                                                                         Estatus, Foto, Created, CreatedBy, Updated, UpdatedBy) VALUE (
                '$cedula','$cargo',$pais,$estado,$municipio,
                $parroquia,$ciudad,'$pNombre','$sNombre','$pApellido','$sApellido','$correo','$telefono','$sexo','$Direccion',
                DEFAULT, '$destino_temp', CURRENT_TIMESTAMP, '$createdBy',
                CURRENT_TIMESTAMP, '$createdBy');";

                $roles = " INSERT INTO org_usuario_rol (ID_Organizacion, ID_Rol, Cedula, Estatus, Created, CreatedBy, Updated, UpdatedBy)
                                                             VALUES ('$organizacion', '$rol', '$cedula', DEFAULT, CURRENT_TIMESTAMP, '$createdBy', CURRENT_TIMESTAMP, '$createdBy');";

                mysqli_query($conexion, $seguridad) or die(mysqli_error($conexion));
                mysqli_query($conexion, $ed) or die(mysqli_error($conexion));
                mysqli_query($conexion, $roles) or die(mysqli_error($conexion));
                mysqli_query($conexion, "COMMINT");

            } else {

                $ed = "INSERT INTO usuario (Cedula, ID_Cargo, ID_Pais, ID_Estado, ID_Municipio, ID_Parroquia,
                                                                         ID_Ciudad, PNombre, SNombre, PApellido, SApellido, Correo, Telefono, Sexo, Direccion,
                                                                         Estatus, Foto, Created, CreatedBy, Updated, UpdatedBy) VALUE (
                '$cedula','$cargo',$pais,$estado,$municipio,
                $parroquia,$ciudad,'$pNombre','$sNombre','$pApellido','$sApellido','$correo','$telefono','$sexo','$Direccion',
                DEFAULT, '$destino_temp', CURRENT_TIMESTAMP, '$createdBy',
                CURRENT_TIMESTAMP, '$createdBy');";

                $roles = "INSERT INTO org_usuario_rol (ID_Organizacion, ID_Rol, Cedula, Estatus, Created, CreatedBy, Updated, UpdatedBy)
                                                             VALUES ('$organizacion', '$rol', '$cedula', DEFAULT, CURRENT_TIMESTAMP, '$createdBy', CURRENT_TIMESTAMP, '$createdBy');";

                mysqli_query($conexion, $ed) or die(mysqli_error($conexion));
                mysqli_query($conexion, $roles) or die(mysqli_error($conexion));
                mysqli_query($conexion, "COMMINT");

            }

    }

    echo'<script language="javascript">
            alert("Usuario Creado con Éxito.");
            location.href="../../usuario.php";
        </script>';

    
} catch (RuntimeException $exc) {
    echo $exc->getMessage();
    
}



