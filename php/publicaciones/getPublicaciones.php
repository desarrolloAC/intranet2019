<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();


switch ($_SESSION['ID_Rol']) {

    case TypeUsuario::ADMINISTRADOR:


        $sql = "SELECT  DISTINCT(pub.ID_Publicacion),
                pub.titulo as titulo,
                pub.estatus as estatus,
                pub.contenido as contenido,
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
                pub.contenido as contenido,
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
                pub.contenido as contenido,
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
                    pub.contenido as contenido,
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


$consultaPublicacion = mysqli_query($conexion, $sql);

$list = [];

while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new Directorio();
    $inst->setFoto($row["foto"]);
    $inst->setNombreCompleto($row['nc']);
    $inst->setSexo($row["Sexo"]);
    $inst->setOrganizacion($row['organizacion']);
    $inst->setDepartamento($row['departamento']);
    $inst->setCargo($row["cargo"]);
    $inst->setTelefono($row['Telefono']);
    $inst->setCorreo($row["Correo"]);
    $inst->setDireccion($row['Direccion']);

    array_push($list, $inst);
}

echo json_encode($list);
