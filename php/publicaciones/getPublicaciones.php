<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/publicaciones/Publicacion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/Autoload.php';


$conexion = conectar();
$sql = "";

switch ($_SESSION['ID_Rol']) {

    case TypeUsuario::ADMINISTRADOR:

        $sql = "SELECT  DISTINCT(pub.ID_Publicacion),
                pub.titulo as titulo,
                pub.estatus as estatus,
                pub.ID_Subcategoria,
                pub.foto,
                pub.Estado,
                pub.motivo,
                pub.Created,
                pub.CreatedBy,
                pub.Updated,
                pub.UpdatedBy,
                pub.F_Publicacion,
                pub.PublicatedBy
                           FROM         org_usuario_rol oru
                           RIGHT JOIN   usuario           u ON (oru.Cedula=u.Cedula)
                           RIGHT JOIN   rol               r ON (oru.ID_Rol=r.ID_Rol)
                           RIGHT JOIN   organizacion      o ON (oru.ID_Organizacion=o.ID_Organizacion)
                           RIGHT JOIN   publicacion     pub ON (u.Cedula=pub.Cedula)
                           WHERE        pub.ID_Organizacion = ?
                           ORDER BY     pub.ID_Publicacion DESC";

        break;


    case TypeUsuario::AUTORIZADOR:

        $sql = "SELECT  DISTINCT(pub.ID_Publicacion),
                pub.titulo as titulo,
                pub.estatus as estatus,
                pub.ID_Subcategoria,
                pub.foto,
                pub.Estado,
                pub.motivo,
                pub.Created,
                pub.CreatedBy,
                pub.Updated,
                pub.UpdatedBy,
                pub.F_Publicacion,
                pub.PublicatedBy
                           FROM         org_usuario_rol oru
                           RIGHT JOIN   usuario           u ON (oru.Cedula=u.Cedula)
                           RIGHT JOIN   rol               r ON (oru.ID_Rol=r.ID_Rol)
                           RIGHT JOIN   organizacion      o ON (oru.ID_Organizacion=o.ID_Organizacion)
                           RIGHT JOIN   publicacion     pub ON (u.Cedula=pub.Cedula)
                           WHERE        pub.estado IN('RECHAZADO_A','REVISION_A','PUBLICADA')
                             AND        pub.ID_Organizacion = ?
                           ORDER BY     pub.ID_Publicacion DESC";

        break;

    case TypeUsuario::EDITOR:

        $sql = "SELECT  DISTINCT(pub.ID_Publicacion),
                pub.titulo as titulo,
                pub.estatus as estatus,
                pub.ID_Subcategoria,
                pub.foto,
                pub.Estado,
                pub.motivo,
                pub.Created,
                pub.CreatedBy,
                pub.Updated,
                pub.UpdatedBy,
                pub.F_Publicacion,
                pub.PublicatedBy
                           FROM         org_usuario_rol oru
                           RIGHT JOIN   usuario           u ON (oru.Cedula=u.Cedula)
                           RIGHT JOIN   rol               r ON (oru.ID_Rol=r.ID_Rol)
                           RIGHT JOIN   organizacion      o ON (oru.ID_Organizacion=o.ID_Organizacion)
                           RIGHT JOIN   publicacion     pub ON (u.Cedula=pub.Cedula)
                           WHERE        pub.estado IN('REVISION_A','REVISION_E','RECHAZADO_E','RECHAZADO_A')
                             AND        pub.ID_Organizacion = ?
                           ORDER BY     pub.ID_Publicacion DESC ";


        break;


    case TypeUsuario::PUBLICADOR:


        $sql = "SELECT  DISTINCT(pub.ID_Publicacion),
                    pub.titulo as titulo,
                    pub.estatus as estatus,
                    pub.ID_Subcategoria,
                    pub.foto,
                    pub.Estado,
                    pub.motivo,
                    pub.Created,
                    pub.CreatedBy,
                    pub.Updated,
                    pub.UpdatedBy,
                    pub.F_Publicacion,
                    pub.PublicatedBy
                               FROM         org_usuario_rol oru
                               RIGHT JOIN   usuario           u ON (oru.Cedula=u.Cedula)
                               RIGHT JOIN   rol               r ON (oru.ID_Rol=r.ID_Rol)
                               RIGHT JOIN   organizacion      o ON (oru.ID_Organizacion=o.ID_Organizacion)
                               RIGHT JOIN   publicacion     pub ON (u.Cedula=pub.Cedula)
                               WHERE        pub.estado IN('PUBLICADA','RECHAZADO_E','REVISION_A','BORR','REVISION_E')
                                 AND        pub.ID_Organizacion = ?
                               ORDER BY     pub.ID_Publicacion DESC";


        break;

    default: //

        break;
}


$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("s", $_SESSION['ID_Organizacion']);
$stmt->execute() or mysqli_error($conexion);

$list = array();

var_dump($stmt->get_result());

while ($row = mysqli_fetch_assoc($stmt->get_result())) {

    $inst = new publicaciones\Publicacion();
    $inst->setTitulo($row["titulo"]);
    $inst->setStatus($row['estatus']);
    $inst->setSubcategoriaId($row['ID_Subcategoria']);
    $inst->setFoto($row['foto']);
    $inst->setEstado($row["Estado"]);
    $inst->setMotivo($row['motivo']);

    array_push($list, $inst);

}

echo json_encode($list);
