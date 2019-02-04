<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/EstadoFile.php';

$conexion = conectar();

$cedula = $_POST["txtCedula"];
$pNombre = $_POST["txtpNombre"];
$sNombre = $_POST["txtsNombre"];
$pApellido = $_POST["txtpApellido"];
$sApellido = $_POST["txtsApellido"];
$sexo = $_POST["cbSexo"];
$organizacion = $_POST["cbOrganizacion"];
$departamento = $_POST["txtDpto1"];
$cargo = $_POST["cbCargo"];
$correo = $_POST["txtCorreo"];
$pass = $_POST["txtPass"];
$rol = $_POST["cbRol"];

$pais = $_POST["pai"];
$estado = $_POST["edo"];
$municipio = $_POST["mun"];
$ciudad = $_POST["ciu"];
$parroquia = $_POST["par"];
$Direccion = $_POST["dir"];



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
            
            //elimina el archivo anterior
            delete($conexion, $cedula);
            
            //origen
            $origen = $_FILES['btnImagen']['tmp_name'];
            
            //destino
            $destino_temp = 'assets/image/directorio/' . date("Y-m-d_his") . strstr($_FILES['btnImagen']['name'], '.');
            $destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp;

            //mover la foto
            if (!move_uploaded_file($origen, $destino)) {
                throw new RuntimeException('No se pudo mover el archivo '.$_FILES['btnImagen']['name'].'.');
            }

            //actualizar.
            if (isset($_POST["txtPass"])) {

                $ed = "UPDATE `usuario` SET
                `ID_Cargo`='$cargo',
                `ID_Pais`=$pais,
                `ID_Estado`=$estado,
                `ID_Municipio`=$municipio,
                `ID_Parroquia`=$parroquia,
                `ID_Ciudad`=$ciudad,
                `PNombre`='$pNombre',
                `SNombre`='$sNombre',
                `PApellido`='$pApellido',
                `SApellido`='$sApellido',
                `Sexo`='$sexo',
                `Direccion`='$Direccion',
                `Foto`='$destino_temp'
                WHERE `Cedula`='$cedula'";

                $seguridad = "UPDATE seguridad Set CLAVE = SHA1('$pass') WHERE CORREO = '$correo'";

                $roles = "UPDATE org_usuario_rol Set ID_Rol = '$rol' WHERE cedula = '$cedula' AND ID_Organizacion='$organizacion' ";

                mysqli_query($conexion, $ed);
                mysqli_query($conexion, $seguridad);
                mysqli_query($conexion, $roles);
                mysqli_query($conexion, "COMMINT");
                
            } else {

                $ed = "UPDATE `usuario` SET
                `ID_Cargo`='$cargo',
                `ID_Pais`=$pais,
                `ID_Estado`=$estado,
                `ID_Municipio`=$municipio,
                `ID_Parroquia`=$parroquia,
                `ID_Ciudad`=$ciudad,
                `PNombre`='$pNombre',
                `SNombre`='$sNombre',
                `PApellido`='$pApellido',
                `SApellido`='$sApellido',
                `Sexo`='$sexo',
                `Direccion`='$Direccion',
                `Foto`='$destino_temp'
                WHERE `Cedula`='$cedula'";

                $roles = "UPDATE org_usuario_rol Set ID_Rol = '$rol' WHERE cedula = '$cedula' AND ID_Organizacion='$organizacion' ";

                mysqli_query($conexion, $ed);
                mysqli_query($conexion, $roles);
                mysqli_query($conexion, "COMMINT");
            }
            
    }

    echo'<script language="javascript">
            alert("Registro Actualizado Con Exito");
            location.href="../../usuario.php";
        </script>';


    
} catch (RuntimeException $exc) {
    echo $exc->getMessage();
    
}

function delete($conexion, $cedula) {
    
    $row = mysqli_fetch_array(mysqli_query($conexion, "SELECT Foto FROM usuario WHERE Cedula = '$cedula' "), MYSQLI_ASSOC);
    
    $destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $row['Foto'];
    
    if (!unlink($destino)) {
        die('No se pudo eliminar el archivo anteriol.');
    }
    
}