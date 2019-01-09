<?php

@session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();


$createdBy = $_SESSION['Cedula'];

$cedula = $_POST["txtCedula"];
$pNombre = $_POST["txtpNombre"];
$sNombre = $_POST["txtsNombre"];
$pApellido = $_POST["txtpApellido"];
$sApellido = $_POST["txtsApellido"];
$sexo = $_POST["cbSexo"];
$departamento = $_POST["txtDpto"];
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
$date = date("Y-m-d_his");


$foto = $_FILES['btnImagen']['name'];
$error = $_FILES['btnImagen']['error'];
$ruta = $_FILES['btnImagen']['tmp_name'];

$destino_temp = 'assets/image/directorio/' . $date . strstr($foto, '.');
$destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp;

$organizacion = $_SESSION['ID_Organizacion'];


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

        if (isset($pass)) {

            $seguridad = "INSERT INTO seguridad VALUES (NULL,'$correo',DEFAULT, SHA1('$clave1'),'$pre', '$res');";

            $ed = "INSERT INTO usuario (Cedula, ID_Cargo, ID_Pais, ID_Estado, ID_Municipio, ID_Parroquia,
						                     ID_Ciudad, PNombre, SNombre, PApellido, SApellido, Correo, Telefono, Sexo, Direccion,
						                     Estatus, Created, CreatedBy, Updated, UpdatedBy) VALUE (
            '$cedula','$cargo',$pais,$estado,$municipio,
            $parroquia,$ciudad,'$pNombre','$sNombre','$pApellido','$sApellido','$correo','$telefono','$sexo','$Direccion',
            DEFAULT, CURRENT_TIMESTAMP, '$createdBy', CURRENT_TIMESTAMP, '$createdBy');";

            $roles = " INSERT INTO org_usuario_rol (ID_Organizacion, ID_Rol, Cedula, Estatus, Created, CreatedBy, Updated, UpdatedBy)
						         VALUES ('$organizacion', '$rol', '$cedula', DEFAULT, CURRENT_TIMESTAMP, '$createdBy', CURRENT_TIMESTAMP, '$createdBy');";

            //SE LEE LA VARIABLE QUERY CON LA INSTRUCCION SQL
            mysqli_query($conexion, $seguridad) or die(mysqli_error($conexion));
            mysqli_query($conexion, $ed) or die(mysqli_error($conexion));
            mysqli_query($conexion, $roles) or die(mysqli_error($conexion));
            mysqli_query($conexion, "COMMINT");
            //
            //
        } else {

            $ed = "INSERT INTO usuario (Cedula, ID_Cargo, ID_Pais, ID_Estado, ID_Municipio, ID_Parroquia,
						                     ID_Ciudad, PNombre, SNombre, PApellido, SApellido, Correo, Telefono, Sexo, Direccion,
						                     Estatus, Created, CreatedBy, Updated, UpdatedBy) VALUE (
            '$cedula','$cargo',$pais,$estado,$municipio,
            $parroquia,$ciudad,'$pNombre','$sNombre','$pApellido','$sApellido','$correo','$telefono','$sexo','$Direccion',
            DEFAULT, CURRENT_TIMESTAMP, '$createdBy',
            CURRENT_TIMESTAMP, '$createdBy');";

            $roles = "INSERT INTO org_usuario_rol (ID_Organizacion, ID_Rol, Cedula, Estatus, Created, CreatedBy, Updated, UpdatedBy)
						         VALUES ('$organizacion', '$rol', '$cedula', DEFAULT, CURRENT_TIMESTAMP, '$createdBy', CURRENT_TIMESTAMP, '$createdBy');";

            mysqli_query($conexion, $ed) or die(mysqli_error($conexion));
            mysqli_query($conexion, $roles) or die(mysqli_error($conexion));
            mysqli_query($conexion, "COMMINT");
            //
            //
        }

        break;

    default :

        copy($ruta, $destino);

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
            //
            //
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
            //
            //
        }
}//FIN Del switch

switch ($_SESSION['ID_Rol']) {
    case TypeUsuario::ADMINISTRADOR:
        /* INGRESAR EL USUARIO COMO ADMINISTRADOR */
        echo'<script language="javascript">
                  alert("Usuario Creado con Éxito.");
                 location.href="../menuAdministrador.php";
                 </script>';
        break;
    case TypeUsuario::AUTORIZADOR:
        /* INGRESAR EL USUARIO COMO AUTORIZADOR */
        echo'<script language="javascript">
                  alert("Usuario Creado con Éxito.");
                 location.href="../menuAutorizador.php";
                 </script>';
        break;
    case TypeUsuario::EDITOR:
        /* INGRESAR EL USUARIO COMO EDITOR */
        echo'<script language="javascript">
                  alert("Usuario Creado con Éxito.");
                 location.href="../menuEditor.php";
                 </script>';
        break;
    case TypeUsuario::PUBLICADOR:
        /* INGRESAR EL USUARIO COMO PUBLICADOR */
        echo'<script language="javascript">
                  alert("Usuario Creado con Éxito.");
                 location.href="../menuPublicador.php";
            </script>';
        break;
    default: //LECTOR

        break;
}
?>
