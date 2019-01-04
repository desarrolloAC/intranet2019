<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA



$cedula = $_POST["txtCedula"];
$pNombre = $_POST["txtpNombre"];
$pApellido = $_POST["txtpApellido"];
$sNombre = $_POST["txtsNombre"];
$sApellido = $_POST["txtsApellido"];
$sexo = $_POST["cbSexo"];
$departamento = $_POST["txtDpto"];
$cargo = $_POST["cbCargo"];
$correo = $_POST["txtCorreo"];
$rol = $_POST["cbRol"];

$pais = $_POST["pai"];
$estado = $_POST["edo"];
$municipio = $_POST["mun"];
$ciudad = $_POST["ciu"];
$parroquia = $_POST["par"];
$Direccion = $_POST["dir"];

$createdBy = $_SESSION['Cedula'];

$date = date("Y-m-d_His"); // date('Y-m-d i:m:s');


$error = $_FILES['btnImagen']['error'];
$foto = $_FILES['btnImagen']['name'];
$type = $_FILES['btnImagen']['type'];
$ruta = $_FILES['btnImagen']['tmp_name'];


$destino_temp = 'assets/image/directorio/' . $date . strstr($foto, '.');
$destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp;
$organizacion = $_SESSION['ID_Organizacion'];

$sql = mysqli_query($conexion, "SELECT * FROM usuario WHERE cedula ='$cedula'");
$codigo = mysqli_num_rows($sql);

print_r($_POST);

if (!empty($codigo)) {

    switch ($_SESSION['ID_Rol']) {

        case TypeUsuario::ADMINISTRADOR:

            echo'<script language="javascript">
		                    alert("La Cédula N°:  ' . $cedula . ' Ya Existe. Ingrese una Diferente. ");
		                    location.href="../menuAdministrador.php";
		                 </script>';
            break;
        case TypeUsuario::AUTORIZADOR:

            echo'<script language="javascript">
		                alert("La Cédula N°:  ' . $cedula . ' Ya Existe. Ingrese una Diferente. ");
		                 location.href="../menuAutorizador.php";
		                 </script>';
            break;
        case TypeUsuario::EDITOR:

            echo'<script language="javascript">
		                 alert("La Cédula N°:  ' . $cedula . ' Ya Existe. Ingrese una Diferente. ");
		                 location.href="../menuEditor.php";
		                 </script>';
            break;
        case TypeUsuario::PUBLICADOR:

            echo'<script language="javascript">
		                 alert("La Cédula N°:  ' . $cedula . ' Ya Existe. Ingrese una Diferente. ");
		                 location.href="../menuPublicador.php";
		            </script>';
            break;
        default: //LECTOR

            break;
    }
}


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

        $sql1 = " INSERT INTO seguridad VALUES (NULL,'$txtCorreo',DEFAULT, SHA1('$clave1'),'$pre', '$res'); ";
        mysqli_query($conexion, $sql1);
        mysqli_query($conexion, "COMMIT");

        $sql2 = " INSERT INTO usuario (Cedula, ID_Cargo, ID_Pais, ID_Estado, ID_Municipio, ID_Parroquia,
                                             ID_Ciudad, PNombre, SNombre, PApellido, SApellido, Correo,Telefono, Sexo, Direccion,
                                             Estatus, Foto, Created, CreatedBy, Updated, UpdatedBy)
                                      VALUES ('$txtCedula', '$txtCargo', '$pai', '$edo', '$mun', '$par', '$ciu',
                                      '$txtpNombre', '$txtsNombre', '$txtpApellido', '$txtsApellido', '$txtCorreo',
                                       '$txttelefono','$cbSexo', '$dir', DEFAULT, '$destino_temp', CURRENT_TIMESTAMP, '$createdBy',
                                      CURRENT_TIMESTAMP, '$createdBy'); ";

        mysqli_query($conexion, $sql2);
        $q2 = mysqli_affected_rows($conexion);
        mysqli_query($conexion, "COMMIT");

        if ($q2 > 0) {
            $sql3 = " INSERT INTO org_usuario_rol (ID_Organizacion, ID_Rol, Cedula, Estatus, Created, CreatedBy, Updated, UpdatedBy)
                                 VALUES ('$organizacion', '$rol', '$txtCedula', DEFAULT, CURRENT_TIMESTAMP, '$createdBy', CURRENT_TIMESTAMP, '$createdBy');";

            mysqli_query($conexion, $sql3);
            $q3 = mysqli_affected_rows($conexion);
        }

        if ($q3 > 0) {


            switch ($_SESSION['ID_Rol']) {

                case TypeUsuario::ADMINISTRADOR:
                    echo'<script language="javascript">
                                     alert("Usuario Creado con Éxito.");
                                     location.href="../menuAdministrador.php";
                                     </script>';
                    break;


                case TypeUsuario::AUTORIZADOR:

                    echo'<script language="javascript">
                                     alert("Usuario Creado con Éxito.");
                                     location.href="../menuAutorizador.php";
                                     </script>';
                    break;


                case TypeUsuario::EDITOR:

                    echo'<script language="javascript">
                                     alert("Usuario Creado con Éxito.");
                                     location.href="../menuEditor.php";
                                     </script>';
                    break;


                case TypeUsuario::PUBLICADOR:

                    echo'<script language="javascript">
                                      alert("Usuario Creado con Éxito.");
                                     location.href="../menuPublicador.php";
                                    </script>';
                    break;


                default: //LECTOR

                    break;
            } // fin del switch switch ($_SESSION
        }

        break;
}
?>
