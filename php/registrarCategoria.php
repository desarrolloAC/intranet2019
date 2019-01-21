<?php

session_start();

require_once('../conexion/conexion.php');
require_once('estadosLogin.php');

$conexion = conectar();

//DECLARO LAS VARIABLES QUE AGARRA LOS VALORES DE LOS INPUT
$codigo = trim($_POST['txtCodigoCategoria']);
$nombre = $_POST['txtNombreCategoria'];
$descripcion = $_POST['txtDesc'];

//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA
$sql = mysqli_query($conexion, "SELECT * FROM categoria WHERE ID_Categoria ='$codigo'");
$vcodigo = mysqli_num_rows($sql);

if (!empty($vcodigo)) {

    echo'<script language="javascript">
        alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
        location.href="../categoria.php";
     </script>';
    
    
} else {
    
    $sql = " INSERT INTO categoria VALUES('$codigo','$nombre',DEFAULT,NOW(),'$_SESSION[Cedula]',NOW(),'$_SESSION[Cedula]','$descripcion')";
    $agregarCategoria = mysqli_query($conexion, $sql);

    echo'<script language="javascript">
            alert("Registro Creado con éxito");
            location.href="../categoria.php";
        </script>';
}
?>
