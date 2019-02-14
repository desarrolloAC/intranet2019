<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/notificaciones/Notificaciones.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';


$conexion = conectar();


switch ($_SESSION['ID_Rol']) {

    case TypeUsuario::ADMINISTRADOR:
        $sql = "SELECT
            n.ID_Publicacion,
            n.Estado_Public,
            n.Mensaje
           FROM notificacion n
           INNER JOIN usuario u ON(n.CreatedBy = u.Cedula)
           INNER JOIN org_usuario_rol oru ON(oru.Cedula = u.Cedula)
           INNER JOIN rol rl ON(rl.ID_Rol = oru.ID_Rol)
           WHERE leido = 0 AND rl.ID_Rol = 'ADM' OR rl.ID_Rol = 'AUT'
           OR rl.ID_Rol = 'EDT' OR rl.ID_Rol = 'LEC' OR rl.ID_Rol = 'PUB'
           ORDER BY ID_Notificacion DESC;";

        break;

    case TypeUsuario::AUTORIZADOR:

        $sql = "SELECT
            n.ID_Publicacion,
            n.Estado_Public,
            n.Mensaje
           FROM notificacion n
           INNER JOIN usuario u ON(n.CreatedBy = u.Cedula)
           INNER JOIN org_usuario_rol oru ON(oru.Cedula = u.Cedula)
           INNER JOIN rol rl ON(rl.ID_Rol = oru.ID_Rol)
           WHERE leido = 0 AND rl.ID_Rol = 'AUT'
           ORDER BY ID_Notificacion DESC;";

        break;

    case TypeUsuario::EDITOR:

        $sql = "SELECT
            n.ID_Publicacion,
            n.Estado_Public,
            n.Mensaje
           FROM notificacion n
           INNER JOIN usuario u ON(n.CreatedBy = u.Cedula)
           INNER JOIN org_usuario_rol oru ON(oru.Cedula = u.Cedula)
           INNER JOIN rol rl ON(rl.ID_Rol = oru.ID_Rol)
           WHERE leido = 0 AND rl.ID_Rol = 'EDT'
           ORDER BY ID_Notificacion DESC;";

        break;

    case TypeUsuario::LECTOR:

        $sql = "SELECT
            n.ID_Publicacion,
            n.Estado_Public,
            n.Mensaje
           FROM notificacion n
           INNER JOIN usuario u ON(n.CreatedBy = u.Cedula)
           INNER JOIN org_usuario_rol oru ON(oru.Cedula = u.Cedula)
           INNER JOIN rol rl ON(rl.ID_Rol = oru.ID_Rol)
           WHERE leido = 0 AND rl.ID_Rol = 'LEC'
           ORDER BY ID_Notificacion DESC;";

        break;

    case TypeUsuario::PUBLICADOR:

        $sql = "SELECT
            n.ID_Publicacion,
            n.Estado_Public,
            n.Mensaje
           FROM notificacion n
           INNER JOIN usuario u ON(n.CreatedBy = u.Cedula)
           INNER JOIN org_usuario_rol oru ON(oru.Cedula = u.Cedula)
           INNER JOIN rol rl ON(rl.ID_Rol = oru.ID_Rol)
           WHERE leido = 0 AND rl.ID_Rol = 'PUB'
           ORDER BY ID_Notificacion DESC;";

        break;

    default :

        break;
}


$rs = mysqli_query($conexion, $sql);


$list = [];

while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new Notificaciones();
    $inst->setPublicacionId($row["ID_Publicacion"]);
    $inst->setEstadoPublicacion($row['Estado_Public']);
    $inst->setMensaje($row["Mensaje"]);


    array_push($list, $inst);
}

echo json_encode($list);
