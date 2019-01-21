<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = trim($_POST['txtCodigoOrganizacion']);
$nombre = $_POST['txtNombreOrganizacion'];

//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA
$sql = mysqli_query($conexion, "SELECT * FROM organizacion WHERE ID_Organizacion ='$codigo'");
$vcodigo = mysqli_num_rows($sql);

if (!empty($vcodigo)) {

    echo '<script language="javascript">
        alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
        location.href="../organizacion.php";
    </script>';
    
    
} else {

    $sql = " INSERT INTO organizacion VALUES ('$codigo','$nombre',DEFAULT,NOW(),'$_SESSION[Cedula]',NOW(),'$_SESSION[Cedula]',NULL)";

    $agregarOrganizacion = mysqli_query($conexion, $sql);

    echo'<script language="javascript">
            alert("Registro Creado con éxito");
            location.href="../organizacion.php";
        </script>';
    
    
}
?>
