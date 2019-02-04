<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$codigo = trim($_POST['txtCodigoOrganizacion']);
$nombre = $_POST['txtNombreOrganizacion'];
$cedula = $_SESSION['Cedula'];


//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA
$vcodigo = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM organizacion WHERE ID_Organizacion ='$codigo'"));

if (!empty($vcodigo)) {

    echo '<script language="javascript">
        alert("El Código: ' . $codigo . ' Ya Existe. Ingrese uno Diferente. ");
        location.href="../../organizacion.php";
    </script>';


} else {

    $sql = " INSERT INTO organizacion VALUES (?, ?, DEFAULT, NOW(), ?, NOW(), ?, NULL)";

    $stmt = mysqli_prepare($conexion, $sql);
    $stmt->bind_param("ssss",
        $codigo,
        $nombre,
        $cedula,
        $cedula
    );

    $stmt->execute() or die(mysqli_error($conexion));

    echo'<script language="javascript">
            alert("Registro Creado con éxito");
            location.href="../../organizacion.php";
        </script>';

}

