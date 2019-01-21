<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

$codigo = trim($_POST['txtCodigoSubCategoria']);
$codigo_cate = $_POST['txtCodigoCategoria'];
$nombre = $_POST['txtNombreSubCategoria'];
$descripcion = $_POST['txtDesc'];

//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA
$sql = mysqli_query($conexion, "SELECT * FROM subcategoria WHERE ID_Subcategoria ='$codigo'");
$vcodigo = mysqli_num_rows($sql);

if (!empty($vcodigo)) {

    echo '<script language="javascript">
        alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
        location.href="../subcategoria.php";
    </script>';
    
    
} else {

    $sql = " INSERT INTO subcategoria
	              VALUES      ('$codigo','$codigo_cate','$nombre',DEFAULT,NOW(),'$_SESSION[Cedula]',NOW(),'$_SESSION[Cedula]','$descripcion')";

    $agregarCategoria = mysqli_query($conexion, $sql);


    echo'<script language="javascript">
            alert("Registro Creado con éxito");
            location.href="../subcategoria.php";
        </script>';
    
    
}
?>
