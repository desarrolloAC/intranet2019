<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/notificaciones/UsuarioActual.php';


$conexion = conectar();

$sql = "SELECT
    u.Correo,
    rl.Nombre as cargo,
    o.Nombre as org
   FROM usuario u
   INNER JOIN org_usuario_rol oru ON(oru.Cedula = u.Cedula)
   INNER JOIN rol rl ON(rl.ID_Rol = oru.ID_Rol)
   INNER JOIN organizacion o ON(o.ID_Organizacion = oru.ID_Organizacion)
   WHERE u.Correo = '" . $_SESSION['Correo'] . "';";


$rs = mysqli_query($conexion, $sql);


$list = [];

while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new UsuarioActual();
    $inst->setCorreo($row["Correo"]);
    $inst->setCargo($row['cargo']);
    $inst->setOrg($row["org"]);


    array_push($list, $inst);
}

echo json_encode($list);
