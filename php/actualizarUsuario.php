<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

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

$foto = $_FILES['btnImagen']['name'];
$error = $_FILES['btnImagen']['error'];
$ruta = $_FILES['btnImagen']['tmp_name'];
$date = date("Y-m-d_his"); // date('Y-m-d i:m:s');
$destino_temp = 'assets/image/directorio/' . $date . strstr($foto, '.');
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

        if (isset($pass)) {

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
            `Direccion`='$Direccion'
            WHERE `Cedula`='$cedula'";

            $seguridad = "UPDATE seguridad Set CLAVE = SHA1('$pass') WHERE CORREO = '$correo'";

            $roles = "UPDATE org_usuario_rol Set ID_Rol = '$rol' WHERE  cedula = '$cedula' AND ID_Organizacion = '$organizacion' ";

            //SE LEE LA VARIABLE QUERY CON LA INSTRUCCION SQL
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
            `Direccion`='$Direccion'
            WHERE `Cedula`='$cedula'";

            $roles = "UPDATE org_usuario_rol Set WHERE cedula = '$cedula' AND ID_Organizacion = '$organizacion' ";

            mysqli_query($conexion, $ed);
            mysqli_query($conexion, $roles);
            mysqli_query($conexion, "COMMINT");
        }

        break;

    default :

        copy($ruta, $destino);

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

            //SE LEE LA VARIABLE QUERY CON LA INSTRUCCION SQL
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
}//FIN Del switch

echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../usuario.php";
    </script>';

?>
