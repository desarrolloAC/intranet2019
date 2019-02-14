<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$Correo = $_POST['txtCorreo'];
$pass = $_POST['txtPass'];

$sql = "SELECT u.Cedula, u.Correo FROM seguridad s RIGHT JOIN usuario u ON(s.CORREO = u.Correo)
             WHERE s.CORREO='$Correo' AND s.CLAVE=SHA1($pass) AND s.ESTATUS='A' ";


$rs = mysqli_query($conexion, $sql);


if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $_SESSION['Correo'] = $row["Correo"];
    $_SESSION['Cedula'] = $row["Cedula"];

    echo'<script language="javascript">
        location.href="../../perfilesLogin.php";
      </script>';
    
} else {

    echo'<script language="javascript">
         alert("Error: Usuario o contraseña incorrectos");
         location.href="../../login.php";
       </script>';
}
?>
