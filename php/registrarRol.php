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

    echo '<script language="javascript">
        alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
        location.href="../rol.php";
    </script>';
    
    
} else {

    $sql = " INSERT INTO rol
		              VALUES      ('$codigo','$nombre',DEFAULT,NOW(),'$_SESSION[Cedula]',NOW(),'$_SESSION[Cedula]','$descripcion')";

    $agregarRol = mysqli_query($conexion, $sql);


    echo'<script language="javascript">
            alert("Registro Creado con éxito");
            location.href="../rol.php";
        </script>';
    
    
}
?>
