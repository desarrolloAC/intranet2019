<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$codigo = trim($_POST['txtCodigo']);
$nombre = $_POST['txtNombreRol'];
$descripcion = $_POST['txtDesc'];
$cedula = $_SESSION['Cedula'];



//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA
$vcodigo = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM rol WHERE ID_Rol ='$codigo'"));

if (!empty($vcodigo)) {

    echo '<script language="javascript">
        alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
        location.href="../../rol.php";
    </script>';


} else {

    $sql = " INSERT INTO rol VALUES (?, ?, DEFAULT, NOW(), ?, NOW(), ?, ?);";

    $stmt = mysqli_prepare($conexion, $sql);
    $stmt->bind_param("sssss",
        $codigo,
        $nombre,
        $cedula,
        $cedula,
        $descripcion
    );

    $stmt->execute() or die(mysqli_error($conexion));


    echo'<script language="javascript">
            alert("Registro Creado con éxito");
            location.href="../../rol.php";
        </script>';


}

