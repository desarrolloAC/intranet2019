<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = trim($_POST['txtCodigo']);
$nombre = $_POST['txtNombreRol'];
$descripcion = $_POST['txtDesc'];


//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA
$sql = mysqli_query($conexion, "SELECT * FROM rol WHERE ID_Rol ='$codigo'");
$vcodigo = mysqli_num_rows($sql);

if (!empty($vcodigo)) {

    switch ($_SESSION['ID_Rol']) {
        case TypeUsuario::ADMINISTRADOR:

            echo'<script language="javascript">
	                    alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
	                    location.href="../menuAdministrador.php";
	                 </script>';
            break;
        case TypeUsuario::AUTORIZADOR:

            echo'<script language="javascript">
	                alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
	                 location.href="../menuAutorizador.php";
	                 </script>';
            break;
        case TypeUsuario::EDITOR:

            echo'<script language="javascript">
	                 alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
	                 location.href="../menuEditor.php";
	                 </script>';
            break;
        case TypeUsuario::PUBLICADOR:

            echo'<script language="javascript">
	                 alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
	                 location.href="../menuPublicador.php";
	            </script>';
            break;
        default: //LECTOR

            break;
    }
} else {

    $sql = " INSERT INTO rol
		              VALUES      ('$codigo','$nombre',DEFAULT,NOW(),'$_SESSION[Cedula]',NOW(),'$_SESSION[Cedula]','$descripcion')";

    $agregarRol = mysqli_query($conexion, $sql);


    switch ($_SESSION['ID_Rol']) {

        case TypeUsuario::ADMINISTRADOR:
            echo'<script language="javascript">
		                 alert("Rol Creado con éxito");
		                 location.href="../menuAdministrador.php";
		                 </script>';
            break;

        case TypeUsuario::AUTORIZADOR:
            echo'<script language="javascript">
		                 alert("Rol Creado con éxito");
		                 location.href="../menuAutorizador.php";
		                 </script>';
            break;

        case TypeUsuario::EDITOR:
            echo'<script language="javascript">
		                 alert("Rol Creado con éxito");
		                 location.href="../menuEditor.php";
		                 </script>';
            break;

        case TypeUsuario::PUBLICADOR:
            echo'<script language="javascript">
		                  alert("Rol Creado con éxito");
		                 location.href="../menuPublicador.php";
		            </script>';
            break;

        default: //LECTOR

            break;
    }
}
?>
