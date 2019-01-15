<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



switch ($_SESSION['ID_Rol']) {

    case TypeUsuario::ADMINISTRADOR:


        if (isset($_POST['txtbuscar'])) {

            $titulo = $_POST['txtbuscar'];
            $where = " WHERE  pub.titulo like '%" . $titulo . "%'
                                    AND  pub.ID_Organizacion='$_SESSION[ID_Organizacion]' ";

            $sql = "SELECT      DISTINCT(pub.ID_Publicacion),
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

                                                           $where
                                                           ORDER BY     pub.ID_Publicacion DESC";
        }

        break;
    case TypeUsuario::AUTORIZADOR:

        if (isset($_SESSION['txtbuscar'])) {

            $titulo = $_SESSION['txtbuscar'];
            $where = " WHERE  pub.titulo like '%" . $titulo . "%'
                                    AND  pub.estado IN('RECHAZADO_A','REVISION_A','PUBLICADA')
                                    AND  pub.ID_Organizacion='$_SESSION[ID_Organizacion]' ";

            $sql = "SELECT      DISTINCT(pub.ID_Publicacion),
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
                                                           $where
                                                           ORDER BY     pub.ID_Publicacion DESC ";

            $consultaPublicacion = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($consultaPublicacion) == 0) {
                $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
            }
        }

        break;
    case TypeUsuario::EDITOR:

        if (isset($_SESSION['txtbuscar'])) {

            $titulo = $_SESSION['txtbuscar'];
            $where = " WHERE  pub.titulo like '%" . $titulo . "%'
                                    AND  pub.estado IN('REVISION_A','REVISION_E','RECHAZADO_E','RECHAZADO_A')
                                    AND  pub.ID_Organizacion='$_SESSION[ID_Organizacion]' ";

            $sql = "SELECT      DISTINCT(pub.ID_Publicacion),
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
                                                           $where
                                                           ORDER BY     pub.ID_Publicacion DESC";

            $consultaPublicacion = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($consultaPublicacion) == 0) {
                $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
            }
        }

        break;

    case TypeUsuario::PUBLICADOR:

        if (isset($_SESSION['txtbuscar'])) {

            $titulo = $_SESSION['txtbuscar'];
            $where = " WHERE  pub.titulo like '%" . $titulo . "%'
                                    AND  pub.Cedula='$_SESSION[Cedula]'
                                    AND  pub.estado IN('PUBLICADA','RECHAZADO_E','BORR','REVISION_E','REVISION_A')
                                    AND  pub.ID_Organizacion='$_SESSION[ID_Organizacion]' ";

            $sql = "SELECT      DISTINCT(pub.ID_Publicacion),
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
                                                           $where
                                                           ORDER BY     pub.ID_Publicacion DESC ";

            $consultaPublicacion = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($consultaPublicacion) == 0) {
                $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
            }
        }


        break;
    default: //
        echo ' <h5></h5>';
        break;
}
