<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/publicaciones/Publicaciones.php';


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
                           WHERE        pub.ID_Organizacion='$_SESSION[ID_Organizacion]'
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
                             AND        pub.ID_Organizacion='$_SESSION[ID_Organizacion]'
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
                             AND        pub.ID_Organizacion='$_SESSION[ID_Organizacion]'
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
                               WHERE        pub.Cedula='$_SESSION[Cedula]'
                                 AND        pub.estado IN('PUBLICADA','RECHAZADO_E','REVISION_A','BORR','REVISION_E')
                                 AND        pub.ID_Organizacion='$_SESSION[ID_Organizacion]'
                               ORDER BY     pub.ID_Publicacion DESC";


        break;

    default: //

        break;
}


$rs = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

$list = [];

while ($row = mysqli_fetch_assoc($rs)) {

    $inst = new Publicaciones();
    $inst->setTitulo($row["titulo"]);
    $inst->setStatus($row['estatus']);
    $inst->setSubCategoriaId($row['ID_Subcategoria']);
    $inst->setFoto($row['foto']);
    $inst->setEstado($row["Estado"]);
    $inst->setMotivo($row['motivo']);
    $inst->setCreated($row["Created"]);
    $inst->setCreatedBy($row['CreatedBy']);
    $inst->setUpdated($row["Updated"]);
    $inst->setUpdatedBy($row['UpdatedBy']);
    $inst->setF_Publicacion($row["F_Publicacion"]);
    $inst->setPublicatedBy($row['PublicatedBy']);

    array_push($list, $inst);
}

echo json_encode($list);
