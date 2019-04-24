<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$_SESSION['ID_Organizacion'] = $_POST['txtOrg'];
$ID_Rol = $_POST['txtPerfil'];

$sql = "   SELECT r.ID_Rol,r.Nombre
            FROM         org_usuario_rol oru
            RIGHT   JOIN rol               r  ON (oru.ID_Rol  =  r.ID_Rol)
            RIGHT   JOIN usuario           u  ON (oru.Cedula           =  u.Cedula)
            RIGHT   JOIN organizacion      o  ON (oru.ID_Organizacion  =  o.ID_Organizacion)
            WHERE oru.Estatus='A'
            AND     u.Estatus='A'
            AND     r.Estatus='A'
            AND     o.Estatus='A'
            AND     o.ID_Organizacion='$_SESSION[ID_Organizacion]'
            AND     r.ID_Rol ='$ID_Rol'
            AND     u.Cedula='$_SESSION[Cedula]' ";

$rs = mysqli_query($conexion, $sql);


if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    //Asignamos el Rol a una variable de Sesión, para usarla en el Contexto.
    $_SESSION['ID_Rol'] = $row['ID_Rol'];

    echo'<script language="javascript">
            alert("Bienvenido al Sistema");
            location.href="../../publicacion.php";
        </script>';
            
} else {

    echo'<script language="javascript">
            alert("Error: Los roles prporciondos son incorrectos");
            location.href="../../login.php";
        </script>';
}
?>
