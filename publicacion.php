<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadoPublicacion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

//SI EL USUARIO NO ESTA REGISTRADO NO PODRA VISUALIZAR LA PAGINA HASTA NO ESTAR LOGEADO Y LO LLEVARA DIRECTO AL LOGIN
if (!isset($_SESSION['Correo']))
    header("Location: login.php")
    ?>



<!DOCTYPE html>
<html>

    <head>
        <title>Intranet Alkes Corp, S.A</title>
        <meta name="viewport" content="width=device-width,device-height initial-scale=1.5" />
        <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
        <meta charset="utf-8">

        <!--INICIO LLAMADA DE ARCHIVOS CSS-->
        <link rel="stylesheet" type="text/css" href="css/structura/estructura.css">
        <link rel="stylesheet" type="text/css" href="css/structura/tablaMenuVertical.css">
        <link rel="stylesheet" type="text/css" href="css/structura/bandeja.css">

        <link rel="icon" type="image/png" href="favicon.png" />

        <link rel="stylesheet" type="text/css" href="css/cargo/opcionCargo.css">
        <link rel="stylesheet" type="text/css" href="css/categoria/opcionCategoria.css">
        <link rel="stylesheet" type="text/css" href="css/departamento/opcionDepartamento.css">
        <link rel="stylesheet" type="text/css" href="css/organizacion/opcionOrganizacion.css">
        <link rel="stylesheet" type="text/css" href="css/publicacion/opcionPublicacion.css">
        <link rel="stylesheet" type="text/css" href="css/publicacion/estiloPublicar.css">
        <link rel="stylesheet" type="text/css" href="css/rol/opcionRol.css">
        <link rel="stylesheet" type="text/css" href="css/subcategoria/opcionSubcategoria.css">
        <link rel="stylesheet" type="text/css" href="css/usuario/opcionUsuario.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/categoriasParaPublicar.css">
        <!--FIN DE LLAMADA ARCHIVOS CSS-->

        <!--INICIO LLAMADA ARCHIVOS JS-->
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="js/selectdependientes.js"></script>
        <script type="text/javascript" src="js/efectoBandeja.js"></script>
        <script type="text/javascript" src="js/setInterval.js"></script>
        <script type="text/javascript" src="js/list.js"></script>
        <script type="text/javascript" src="js/previsualizarImagen.js"></script>

        <script type="text/javascript" src="js/lib/vue.js"></script>
        <script type="text/javascript" src="js/lib/vue-resource.min.js"></script>
        <!--FIN LLAMADA ARCHIVOS JS-->

    </head>



    <body>

        <!--INICIO CONTENEDOR CABECERA-->

        <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/topAdmin.php'; ?>

        <!--FIN DEL CONTENEDOR CABECERA-->



        <!--INICIO CONTENEDOR MENU-->

        <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/menuAdmin.php'; ?>

        <!--FIN CONTENEDOR MENU-->


    <!--MENSAJE DE ERRORES-->
    <?php
    $errorA="<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
    $errorB= "<h5 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>Este tipo de publicacion no contiene Imagen.</h5>";    
    $errorC="El criterio de Busqueda no conincide con la publicacion";

    ?>
         <!--INICIO CONTENEDOR CONTENIDOS-->

        <div class="contenedorContenidos">


            <div id='contenedor_tabla_publicacion'>

                <script type="text/javascript" src="js/subCategoriaParaRegistrar.js"></script>
                <script type="text/javascript" src="js/subCategoriaParaEditar.js"></script>
                <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
                <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>

                <table id="tabla_publicacion" border="1">
                    <thead>
                        <tr id="titulo_columnas">

                            <td width="50" height="50" colspan="4">

                                <h1>Publicación</h1>

                            </td>
                            <td colspan="10">
                                <form method="POST" action=''>
                                    <input type="text" name="txtbuscar" id="txtBuscarPublicacion" placeholder="Buscar Por Título" maxlength="40">
                                    <button type="submit" name="btnBuscarPublicacion" id="btnBuscarPublicacion" title="Buscar una Publicación">Buscar</button>
                                </form>
                            </td>
                        </tr>
                        <tr id="titulo_columnas">
                            <td width="600px">
                                <h5>Código</h5>
                            </td>
                            <td width="800px">
                                <h5>Título</h5>
                            </td>

                            <td width="800px">
                                <h5>Categoría</h5>
                            </td>

                            <td width="800px">
                                <h5>Subcategoría</h5>
                            </td>

                            <td width="800px">
                                <h5>Estatus</h5>
                            </td>

                            <td width="800px">
                                <h5>Observaciones</h5>
                            </td>
                            <td width="800px">
                                <h5>Creada Por</h5>
                            </td>
                            <td width="800px">
                                <h5>Fecha Creación</h5>
                            </td>
                            <td width="800px">
                                <h5>Actualizada Por</h5>
                            </td>
                            <td width="800px">
                                <h5>Fecha Actualización</h5>
                            </td>
                            <td width="800px">
                                <h5>Publicada Por</h5>
                            </td>
                            <td width="800px">
                                <h5>Fecha Publicación</h5>
                            </td>
                            <td width="300px">
                                <h5>Edición</h5>
                            </td>
                            <td width="300px">
                                <h5>Acción</h5>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . '/intranet/conexion/conexion.php';
                        $conexion = conectar();

                        $consultaPublicacion;

                        switch ($_SESSION['ID_Rol']) {

                            case TypeUsuario::ADMINISTRADOR:
                                /* INGRESAR EL USUARIO COMO ADMINISTRADOR */
                                if (isset($_POST['txtbuscar'])) {

                                    $titulo = $_POST['txtbuscar'];
                                    $where = " WHERE  pub.titulo like '%" . $titulo . "%'
                                                            AND  pub.ID_Organizacion='$_SESSION[ID_Organizacion]' ";

                                    $sql = "SELECT      DISTINCT(pub.ID_Publicacion),
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

                                                   $where
                                                   ORDER BY     pub.ID_Publicacion DESC";

                                    $consultaPublicacion = mysqli_query($conexion, $sql);

                                    if (mysqli_num_rows($consultaPublicacion) == 0) {
                                        $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
                                    }
                                } else {

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

                                    $consultaPublicacion = mysqli_query($conexion, $sql);
                                }

                                break;
                            case TypeUsuario::AUTORIZADOR:
                                /* INGRESAR EL USUARIO COMO AUTORIZADOR */
                                if (isset($_SESSION['txtbuscar'])) {

                                    $titulo = $_SESSION['txtbuscar'];
                                    $where = " WHERE  pub.titulo like '%" . $titulo . "%'
                                                            AND  pub.estado IN('RECHAZADO_A','REVISION_A','PUBLICADA')
                                                            AND  pub.ID_Organizacion='$_SESSION[ID_Organizacion]' ";

                                    $sql = "SELECT      DISTINCT(pub.ID_Publicacion),
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
                                                   $where
                                                   ORDER BY     pub.ID_Publicacion DESC ";

                                    $consultaPublicacion = mysqli_query($conexion, $sql);

                                    if (mysqli_num_rows($consultaPublicacion) == 0) {
                                        $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
                                    }
                                } else {

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
                                               WHERE        pub.estado IN ('REVISION_A','PUBLICADA')
                                                 AND        pub.ID_Organizacion='$_SESSION[ID_Organizacion]'
                                               ORDER BY     pub.ID_Publicacion DESC";

                                    $consultaPublicacion = mysqli_query($conexion, $sql);
                                }
                                break;
                            case TypeUsuario::EDITOR:
                                /* INGRESAR EL USUARIO COMO EDITOR */
                                if (isset($_SESSION['txtbuscar'])) {

                                    $titulo = $_SESSION['txtbuscar'];
                                    $where = " WHERE  pub.titulo like '%" . $titulo . "%'
                                                            AND  pub.estado IN('REVISION_A','REVISION_E','RECHAZADO_E','RECHAZADO_A')
                                                            AND  pub.ID_Organizacion='$_SESSION[ID_Organizacion]' ";

                                    $sql = "SELECT      DISTINCT(pub.ID_Publicacion),
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
                                                   $where
                                                   ORDER BY     pub.ID_Publicacion DESC";

                                    $consultaPublicacion = mysqli_query($conexion, $sql);

                                    if (mysqli_num_rows($consultaPublicacion) == 0) {
                                        $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
                                    }
                                } else {

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
                                               WHERE        pub.estado IN ('RECHAZADO_A','REVISION_E')
                                                 AND        pub.ID_Organizacion='$_SESSION[ID_Organizacion]'
                                               ORDER BY     pub.ID_Publicacion DESC ";

                                    $consultaPublicacion = mysqli_query($conexion, $sql);
                                }
                                break;
                            case TypeUsuario::PUBLICADOR:
                                /* INGRESAR EL USUARIO COMO EDITOR */
                                if (isset($_SESSION['txtbuscar'])) {

                                    $titulo = $_SESSION['txtbuscar'];
                                    $where = " WHERE  pub.titulo like '%" . $titulo . "%'
                                                            AND  pub.Cedula='$_SESSION[Cedula]'
                                                            AND  pub.estado IN('PUBLICADA','RECHAZADO_E','BORR','REVISION_E','REVISION_A')
                                                            AND  pub.ID_Organizacion='$_SESSION[ID_Organizacion]' ";

                                    $sql = "SELECT      DISTINCT(pub.ID_Publicacion),
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
                                                   $where
                                                   ORDER BY     pub.ID_Publicacion DESC ";

                                    $consultaPublicacion = mysqli_query($conexion, $sql);

                                    if (mysqli_num_rows($consultaPublicacion) == 0) {
                                        $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
                                    }
                                } else {

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
                                                 AND        pub.estado IN ('RECHAZADO_E','BORR')
                                                 AND        pub.ID_Organizacion='$_SESSION[ID_Organizacion]'
                                               ORDER BY     pub.ID_Publicacion DESC";

                                    $consultaPublicacion = mysqli_query($conexion, $sql);
                                }
                                break;
                            default: //
                                echo ' <h5></h5>';
                                break;
                        }

                        while ($mostrarPublicacion = mysqli_fetch_array($consultaPublicacion, MYSQLI_ASSOC)) {
                            ?>
                            <tr id="datos_usuario">
                                <td>
                                    <h5>
                                        <?php echo $mostrarPublicacion['ID_Publicacion']; ?>
                                    </h5>
                                </td>

                                <td>
                                    <h5>
                                        <?php echo $mostrarPublicacion['titulo']; ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?php
                                        $sql = " SELECT ( SELECT Nombre
                                                          FROM categoria
                                                          WHERE ID_Categoria=s.ID_Categoria) as Nombre,
                                                          ( SELECT ID_Categoria
                                                          FROM categoria
                                                          WHERE ID_Categoria=s.ID_Categoria) as ID_Categoria
                                                 FROM   subcategoria s
                                                 WHERE  s.ID_Subcategoria='$mostrarPublicacion[ID_Subcategoria]'";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        $_SESSION['ID_Categoria'] = $row['ID_Categoria'];
                                        ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?php
                                        $sql = " SELECT Nombre
                                                 FROM subcategoria
                                                 WHERE ID_Subcategoria='$mostrarPublicacion[ID_Subcategoria]'";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?php
                                        switch ($mostrarPublicacion['Estado']) {
                                            case EstadoPublicacion::RECHAZADO_A:
                                                echo 'RECHAZADA POR AUTORIZADOR';
                                                break;
                                            case EstadoPublicacion::REVISION_E:
                                                echo 'REVISIÓN DEL EDITOR';
                                                break;
                                            case EstadoPublicacion::RECHAZADO_E:
                                                echo 'RECHAZADA POR EDITOR';
                                                break;
                                            case EstadoPublicacion::REVISION_A:
                                                echo 'REVISIÓN DEL AUTORIZADOR';
                                                break;
                                            case EstadoPublicacion::PUBLICADA:
                                                echo 'PUBLICADA';
                                                break;
                                            default: //BORR
                                                echo 'BORRADOR';
                                                break;
                                        }
                                        ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?php echo $mostrarPublicacion['motivo']; ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                     FROM   usuario
                                                     WHERE  Cedula='$mostrarPublicacion[CreatedBy]' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                                    </h5>
                                </td>

                                <td>
                                    <h5>
                                        <?php echo $mostrarPublicacion['Created']; ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                     FROM   usuario
                                                     WHERE  Cedula='$mostrarPublicacion[UpdatedBy]' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?php echo $mostrarPublicacion['Updated']; ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                     FROM   usuario
                                                     WHERE  Cedula='$mostrarPublicacion[PublicatedBy]' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?php echo $mostrarPublicacion['F_Publicacion']; ?>
                                    </h5>
                                </td>
                                <td>
                                    <?php
                                    /* boton editar */
                                      switch ($_SESSION['ID_Rol']) {

                                      case TypeUsuario::ADMINISTRADOR:

                                      switch ($mostrarPublicacion['Estado']) {
                                      case EstadoPublicacion::RECHAZADO_A:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";

                                      break;
                                      case EstadoPublicacion::RECHAZADO_E:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";

                                      break;
                                      case EstadoPublicacion::REVISION_E:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";

                                      break;
                                      case EstadoPublicacion::REVISION_A:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";

                                      break;
                                      case EstadoPublicacion::PUBLICADA:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";
                                      break;
                                      default:// EstadoPublicacion::BORR:;
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";
                                      break;
                                      } //FIN SWITCH
                                      break;
                                      case TypeUsuario::AUTORIZADOR:

                                      switch ($mostrarPublicacion['Estado']) {
                                      case EstadoPublicacion::RECHAZADO_A:

                                      break;
                                      case EstadoPublicacion::RECHAZADO_E:

                                      break;
                                      case EstadoPublicacion::REVISION_E:

                                      break;
                                      case EstadoPublicacion::REVISION_A:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";
                                      break;
                                      case EstadoPublicacion::PUBLICADA:

                                      break;
                                      default:

                                      break;
                                      } //FIN SWITCH
                                      break;
                                      case TypeUsuario::EDITOR:

                                      switch ($mostrarPublicacion['Estado']) {
                                      case EstadoPublicacion::RECHAZADO_A:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";
                                      break;
                                      case EstadoPublicacion::RECHAZADO_E:

                                      break;
                                      case EstadoPublicacion::REVISION_E:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";
                                      break;
                                      case EstadoPublicacion::REVISION_A:

                                      break;
                                      case EstadoPublicacion::PUBLICADA:
                                      break;
                                      default:

                                      break;
                                      } //FIN SWITCH  EDITOR
                                      break;
                                      case TypeUsuario::PUBLICADOR:

                                      switch ($mostrarPublicacion['Estado']) {
                                      case EstadoPublicacion::RECHAZADO_A:

                                      break;
                                      case EstadoPublicacion::RECHAZADO_E:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/image/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
                                      </a>";
                                      break;
                                      case EstadoPublicacion::REVISION_E:
                                      break;
                                      case EstadoPublicacion::REVISION_A:

                                      // echo "REVISION_P";
                                      break;
                                      case EstadoPublicacion::PUBLICADA:
                                      //echo"<a id='btnDesactivado'    name='btnDesactivado'  href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E' title='Enviar a Editor'>Enviar a Editor</a>";
                                      break;
                                      default:
                                      echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
                                      <img src='assets/i!las/btnEditar.png' title='Editar Publicación'>
                                      </a>";
                                      break;
                                      } //FIN SWITCH PUB!
                                      break;
                                      default: //PUBLICA!
                                      echo ' <h5></h5>';
                                      break;
                                      }//FIN DE SWITCH PRINCIPAL ROL
                                      /* _____________________________*/
                                    ?>

                                    <div id='<?php echo $mostrarPublicacion['ID_Publicacion']; ?>' class='contenedor_formulario'>

                                        <div id='formulario'>

                                            <a href='#' class='cerrar'>X</a>

                                            <div class='contenedor_formulario_publicacion'>

                                                <form method='POST' enctype='multipart/form-data' action='php/publicaciones/actualizarPublicacion.php'>

                                                    <table id='tabla_formulario_publicacion' border='0' cellpadding='7'>
                                                        <tr id='titulo_columna_formulario'>
                                                            <td colspan='2'>
                                                                <h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            <?php /** Datos que no se motrataran en el formulario***/?>
                                                                <input type='hidden' class='caja_formulario_usuario' readonly="readonly" name='txtCodigoP' maxlength='3' value='<?php echo $mostrarPublicacion['ID_Publicacion']; ?>'>
                                                                <input type='hidden' class='caja_formulario_usuario' readonly="readonly" name='txtCodigoSubC' maxlength='3' value='<?php echo $mostrarPublicacion['ID_Subcategoria']; ?>'>
                                                            </td>
                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                    //Inicio de Titulo
                                                                    $tit=false;
                                                                    switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                        case 'AVIF':
                                                                        $tit=true;
                                                                            break;
                                                                        case 'BOIF':
                                                                        $tit=true;
                                                                            break;
                                                                        case 'COMU':
                                                                        $tit=true;
                                                                            break;
                                                                        default:
                                                                        $tit=false;
                                                                            break;
                                                                    }   
                                                                    if(!$tit){
                                                                        echo "";
                                                                    }else{
                                                                        echo"<h5 id='label_cajas_texto'>Titulo: </h5>";
                                                                        ?><input class=Titulo type='text' name='Titulo' value="<?php echo $mostrarPublicacion['titulo']?>";><?php
                                                                    }
                                                                    //Fin de Titulo
                                                                    ?>
                                                                </td>
                                                                <tr>
                                                                <td>
                                                                <?php
                                                                //Inicio de Fecha 
                                                                    $valido=false;
                                                                    switch (($mostrarPublicacion['ID_Subcategoria'])) {
                                                                        case 'POST':
                                                                            $sqlValido  =" SELECT Contenido as fecha from publicacion_postulate where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $valido=true;
                                                                            break; 
                                                                            case 'CUPL':
                                                                            $sqlValido  =" SELECT fecha from publicacion_cumpleañomes where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $valido=true;
                                                                            break;
                                                                        $valido=false;
                                                                            break;
                                                                    }
                                                                    if(!$valido){
                                                                        echo "";
                                                                    }else{
                                                                        $rs = mysqli_query($conexion,$sqlValido);
                                                                        if (mysqli_num_rows($rs)>0) {
                                                                            while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                             echo" <h5 id='label_cajas_texto'>Fecha : </h5>";?>
                                                                            <input class=txtCajaFormulario id="txtFecha" type="date" name="txtFecha" value="<?php echo $row['fecha']?>"><?php                                                                     
                                                                        };
                                                                     }  
                                                                    }
                                                                //FIn de Fecha 
                                                                ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <?php
                                                                //Inicio Correo 
                                                                        $A=false;
                                                                            switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                                case 'POST':
                                                                                    $sqlCorreo="SELECT Correo FROM publicacion_postulate WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                    $A=true;
                                                                                    break;
                                                                                default:
                                                                                    echo"";
                                                                                    $A=false;
                                                                                    break;
                                                                            }
                                                                                if(!$A){
                                                                                    echo "";
                                                                                }else{
                                                                                    $rs = mysqli_query($conexion,$sqlCorreo);
                                                                                    if (mysqli_num_rows($rs)>0) {
                                                                                        while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                                         echo" <h5 id='label_cajas_texto'>Correo: </h5>";?>
                                                                                        <input class=txtCajaFormulario id="txtCorreo" type="text" name="txtCorreo" value="<?php echo $row['Correo']?>"><?php                                                                     
                                                                                    };
                                                                                 }
                                                                            }
                                                                  //fin de Correo  
                                                                  ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <?php
                                                                //Inicio de  de Colaborador 
                                                                $colab=false;
                                                                switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                    case 'NUIN':
                                                                        $sqlColaborador="SELECT colaborador FROM publicacion_nuevoingreso WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        $colab=true;
                                                                        break;
                                                                    case 'NUAS':
                                                                        $colab=true;    
                                                                        $sqlColaborador="SELECT colaborador FROM publicacion_nuevoascenso WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        break;
                                                                    case 'LOEX':
                                                                        $colab=true;    
                                                                        $sqlColaborador="SELECT colaborador FROM publicacion_logroext WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        break;
                                                                    case 'CUPL':
                                                                        $colab=true;
                                                                        $sqlColaborador="SELECT colaborador FROM publicacion_cumpleañomes WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        break;
                                                                    case 'NACI':
                                                                        $colab=true;
                                                                        $sqlColaborador="SELECT colaborador FROM publicacion_nacimiento WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        break;
                                                                        case 'POES':
                                                                        $colab=true;
                                                                        $sqlColaborador="SELECT colaborador FROM publicacion_promoescolar WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        break;
                                                                        
                                                                    default:
                                                                        echo"";
                                                                        $colab=false;
                                                                        break;
                                                                }
                                                                if (!$colab) {
                                                                    echo "";
                                                                }else{
                                                                    $rs= mysqli_query($conexion,$sqlColaborador);
                                                                    if (mysqli_num_rows($rs)>0){
                                                                        while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                            echo" <h5 id='label_cajas_texto'>Colaborador: </h5>";?>
                                                                           <input class=txtCajaFormulario id="txtColaborador" type="text" name="txtColaborador" value="<?php echo $row['colaborador']?>"><?php                                                                     
                                                                       };
                                                                    };
                                                                }; //fin de Colaborador 
                                                                  ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <?php
                                                                 //Inicio de Departamento
                                                                    $dep=false;
                                                                    switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                    case 'NUIN':
                                                                        $dep=true;
                                                                        $sqlIDdepartamento="SELECT departamento FROM publicacion_nuevoingreso WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        break;
                                                                    case 'NUAS':
                                                                        $dep=true;
                                                                        $sqlIDdepartamento="SELECT departamento FROM publicacion_nuevoascenso WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        break;
                                                                    case 'LOEX':
                                                                        $dep=true;
                                                                        $sqlIDdepartamento="SELECT departamento FROM publicacion_logroext    WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        break;
                                                                    case 'CUPL':
                                                                        $dep=true;
                                                                        $sqlIDdepartamento="SELECT departamento FROM publicacion_cumpleañomes    WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        break;
                                                                        default:
                                                                        $colab=false;
                                                                        break;
                                                                }

                                                                    if (!$dep) {
                                                                        echo"";
                                                                    }else{
                                                                        $IDdeparatamento;
                                                                        $rsd = mysqli_query($conexion,$sqlIDdepartamento);
                                                                        if(mysqli_num_rows($rsd)>0){
                                                                            while ($row = mysqli_fetch_array($rsd, MYSQLI_ASSOC)) {
                                                                                $IDdeparatamento=$row['departamento'];
                                                                            }; 
                                                                            echo"<h5 id='label_cajas_texto'>Departamento: </h5>";
                                                                            echo "<select name='txtCodigoDept' class='combos_formulario_usuario' id='txtCodigoDept' required>
                                                                            <option> Departamento </option>";
                                                                         $sql = " SELECT ID_Departamento,Nombre from departamento ";
                                                                         $rs = mysqli_query($conexion, $sql);
                                                                            if(mysqli_num_rows($rs)>0){
                                                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)){
                                                                                    do {
                                                                                        if ($row['ID_Departamento']==$IDdeparatamento){
                                                                                            echo "<option value='$row[ID_Departamento]' selected='selected'> $row[Nombre] </option>";
                                                                                        }else{
                                                                                            echo "<option value='$row[ID_Departamento]'> $row[Nombre] </option>";
                                                                                        };   
                                                                                    }while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                                                };
                                                                            };
                                                                        echo "</select>";
                                                                    };
                                                                };//Fin de Departamento
                                                                  ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <?php
                                                                //Inicio de Cargo
                                                                if(($mostrarPublicacion['ID_Subcategoria']=='NUIN')||($mostrarPublicacion['ID_Subcategoria']=='NUAS')|| ($mostrarPublicacion['ID_Subcategoria']=='LOEX')){
                                                                    echo" <h5 id='label_cajas_texto'>Cargo: </h5>";
                                                                    switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                        case 'NUIN':
                                                                        $sqlIDdepartamento="SELECT cargo FROM publicacion_nuevoingreso WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            break;
                                                                        case 'NUAS':
                                                                        $sqlIDdepartamento="SELECT cargo FROM publicacion_nuevoascenso WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";                                                                        
                                                                        case 'LOEX':
                                                                        $sqlIDdepartamento="SELECT cargo FROM publicacion_logroext WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";                                                                        
                                                                            break;
                                                                    }
                                                                    $IDCargo;
                                                                    $rsc = mysqli_query($conexion,$sqlIDdepartamento);
                                                                    if(mysqli_num_rows($rsc)>0){
                                                                        while ($row = mysqli_fetch_array($rsc, MYSQLI_ASSOC)) {
                                                                            $IDCargo=$row['cargo'];
                                                                        }
                                                                    }
                                                                    echo "<select name='txtCodigoCarg' class='combos_formulario_usuario' id='txtCodigoCarg' required>
                                                                         <option> Cargo </option>";
                                                                         
                                                                         $sql = " SELECT ID_Cargo,Nombre FROM cargo ";
                                                                         $rs = mysqli_query($conexion, $sql);
                                                                         if(mysqli_num_rows($rs)>0){
                                                                            if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)){
                                                                                do {
                                                                                    if ($row['ID_Cargo']==$IDCargo)
                                                                                        echo "<option value='$row[ID_Cargo]' selected='selected'> $row[Nombre] </option>";
                                                                                    else
                                                                                        echo "<option value='$row[ID_Cargo]'> $row[Nombre] </option>";
                                                                                }while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                                            }
                                                                         }
                                                                    
                                                                    echo "</select>";

                                                                }
                                                                //Fin de Cargo
                                                                  ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                    //Inicio de tipo de,logro
                                                                       if ($mostrarPublicacion['ID_Subcategoria']=='LOEX') {
                                                                        $sqlTipo="SELECT tipo_logro FROM publicacion_logroext WHERE ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        $rs = mysqli_query($conexion,$sqlTipo);
                                                                            if (mysqli_num_rows($rs)>0) {
                                                                                while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                                     echo" <h5 id='label_cajas_texto'>Tipo de logro: </h5>";?>
                                                                                    <input class=txtCajaFormulario id="txtTipoLogro" type="text" name="txtTipoLogro" value="<?php echo $row['tipo_logro']?>"><?php                                                                     
                                                                                };
                                                                             }
                                                                        }
                                                                        //Fin de Tipo de Logro
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr> 
                                                                <td id="color_fondo_cajas">
                                                                    <h5 id="label_cajas_texto">Seleccionar Imagen</h5>
                                                                        <?php
                                                                //Fotos Publicacion
                                                                    switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                        case "AVIF":
                                                                            $sqlimage = " SELECT imagen1, imagen2, imagen3, imagen4 from publicacion_avanceinf where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 4;
                                                                            break;
                                                                        case "BOIF":
                                                                            $sqlimage = " SELECT imagen1, imagen2, imagen3, imagen4 FROM publicacion_boletininf where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 4;
                                                                            break;
                                                                        case "COMU":
                                                                            $sqlimage = " SELECT '#' as imagen1 from publicacion_comunicado where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'CUPL':
                                                                            $sqlimage = " SELECT foto as imagen1 from publicacion_cumpleañomes where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'COND':
                                                                            $sqlimage = " SELECT '#' as imagen1 from publicacion_fallecimiento where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'GENE':
                                                                            $sqlimage = " SELECT '#' as imagen1 from publicacion_invitaciongeneral where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'LOEX':
                                                                            $sqlimage = " SELECT foto as imagen1 from publicacion_logroext where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'NACI':
                                                                            $sqlimage = " SELECT foto as imagen1 from publicacion_nacimiento where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'NUAS':
                                                                            $sqlimage = " SELECT foto as imagen1 from publicacion_nuevoacenso where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'NUIN':
                                                                            $sqlimage = " SELECT foto as imagen1 from publicacion_nuevoingreso where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'POST':
                                                                            $sqlimage = " SELECT '#' as imagen1 from publicacion_postulate where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'POES':
                                                                            $sqlimage = " SELECT foto as imagen1 from publicacion_promoescolar where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        case 'FLAY':
                                                                            $sqlimage = " SELECT foto as imagen1 from publicacion_flayers where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                            $c = 1;
                                                                            break;
                                                                        default:
                                                                        echo $errorC;
                                                                        break;
                                                                    }
                                                                        
                                                                        $rs = mysqli_query($conexion,$sqlimage);
                                                                        if (mysqli_num_rows($rs)<=0) {
                                                                            echo $errorA;
                                                                            }else{
                                                                                echo "<div class='padre'>";
                                                                                while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                               
                                                                                    if(($mostrarPublicacion['ID_Subcategoria']=='COMU') || ($mostrarPublicacion['ID_Subcategoria']=='COND')|| ($mostrarPublicacion['ID_Subcategoria']=='GENE') || ($mostrarPublicacion['ID_Subcategoria']=='POST')){
                                                                                    echo $errorB;
                                                                                        }else{
                                                                                            for ($i=1; $i<=$c ; $i++) { 
                                                                                            echo"<div class='hijo'>";
                                                                                                ?> <img class="imgEditar"src="<?php echo $row['imagen'.$i];?>" id="<?php echo"imagen".$i;?>"><?php
                                                                                                ?> <input class="btnImageEditar" type="file" name="<?php echo "archivo".$i;?>" id="<?php echo "btnImage".$i;?>"><?php  
                                                                                            echo"</div>"; 
                                                                                            }
                                                                                        }
                                                                                    };//FIn de While 
                                                                                echo "</div>";  // fin de DIV;
                                                                             };
                                                                    //Fin de Fotos Publicacion
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                switch ($_SESSION['ID_Rol']) {
                                                                    case TypeUsuario::ADMINISTRADOR:
                                                                        /* INGRESAR EL USUARIO COMO ADMINISTRADOR */
                                                                        echo"
                                                                      <h5 id='label_cajas_texto'>Observaciones de la Edición</h5>
                                                                         <textarea name='motivo' id='motivo' rows='10' cols='100' >$mostrarPublicacion[motivo]</textarea>
                                                                        <script>
                                                                            CKEDITOR.replace( 'motivo' );
                                                                        </script>";
                                                                        break;
                                                                    case TypeUsuario::AUTORIZADOR:
                                                                        /* INGRESAR EL USUARIO COMO AUTORIZADOR */
                                                                        echo"
                                                                      <h5 id='label_cajas_texto'>Observaciones de la Edición</h5>
                                                                         <textarea name='motivo' id='motivo' rows='10' cols='100' >$mostrarPublicacion[motivo]</textarea>
                                                                        <script>
                                                                            CKEDITOR.replace( 'motivo' );
                                                                        </script>";
                                                                        break;
                                                                    case TypeUsuario::EDITOR:
                                                                        /* INGRESAR EL USUARIO COMO EDITOR */
                                                                        echo"
                                                                      <h5 id='label_cajas_texto'>Observaciones de la Edición</h5>
                                                                         <textarea name='motivo' id='motivo' rows='10' cols='100' >$mostrarPublicacion[motivo]</textarea>
                                                                        <script>
                                                                            CKEDITOR.replace( 'motivo' );
                                                                        </script>";
                                                                        break;
                                                                    default: //LECTOR
                                                                        echo ' <h5></h5>';
                                                                        break;
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php 
                                                        
                                                                        // Primer contenido
                                                                        switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                            case "AVIF":
                                                                                $sqlContenido = "SELECT contenido from publicacion_avanceinf where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;
                                                                                break;
                                                                            case "BOIF":
                                                                                $sqlContenido = "SELECT contenido from publicacion_boletininf where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;
                                                                                break;
                                                                            case "COMU":
                                                                                $sqlContenido = "SELECT contenido from publicacion_comunicado where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;
                                                                                break;
                                                                            case 'CUPL':
                                                                                $sqlContenido = "SELECT colaborador as contenido from publicacion_cumpleañomes where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=false;
                                                                                break;
                                                                            case 'COND':
                                                                                $sqlContenido = "SELECT contenido from publicacion_fallecimiento where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;
                                                                                break;
                                                                            case 'GENE':
                                                                                $sqlContenido = "SELECT contenido from publicacion_invitaciongeneral where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;
                                                                                break;
                                                                            case 'LOEX':
                                                                                $sqlContenido = " SELECT contenido from publicacion_logroext where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;
                                                                                break;
                                                                            case 'NACI':
                                                                                $sqlContenido = " SELECT contenido from publicacion_nacimiento where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;
                                                                                break;
                                                                            case 'NUAS':
                                                                                $sqlContenido = " SELECT contenido from publicacion_nuevoacenso where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";                                                                      
                                                                                $Con=true;    
                                                                            break;
                                                                            case 'NUIN':
                                                                                $sqlContenido = " SELECT contenido from publicacion_nuevoingreso where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;  
                                                                                break;
                                                                            case 'POST':
                                                                                $sqlContenido = " SELECT  Requisito as contenido from publicacion_postulate where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;
                                                                                break;
                                                                            case 'POES':
                                                                                $sqlContenido = " SELECT contenido from publicacion_promoescolar where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                                $Con=true;
                                                                                break;
                                                                            default:
                                                                            echo $errorC;
                                                                            $Con=false;
                                                                                break;
                                                                        };// FIN DEL SWITCH CASE
                                                                        if(!$Con){
                                                                            echo"";
                                                                        }else{
                                                                            $rs = mysqli_query($conexion, $sqlContenido);
                                                                            if(mysqli_num_rows($rs)<=0){
                                                                                echo $errorA;
                                                                            }else{
                                                                                while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)){
                                                                                    echo "<h5 id='label_cajas_texto'>Primer Contenido</h5>";  
                                                                                    ?><textarea name="contenido1" id="contenido1" rows="10" cols="100" required><?php echo $row['contenido'];?></textarea><?php
                                                                                };
                                                                            };
                                                                        };//Fin del Primer contenido 
                                                                ?>
                                                                <script>
                                                                       CKEDITOR.replace( 'contenido1' );
                                                                </script>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            <?php
                                                            //Segundo Contenido                                                         
                                                                $con2=false;
                                                                switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                    case 'GENE':
                                                                        $sqlContenido2="SELECT contenido1 as contenido2 from publicacion_invitaciongeneral where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        $con2=true;
                                                                        break;
                                                                    case 'POST':
                                                                        $sqlContenido2="SELECT Posiciones as contenido2 from publicacion_postulate where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        $con2=true;    
                                                                        break;
                                                                    default:
                                                                        $con2=false;
                                                                        break;
                                                                }    
                                                                if(!$con2){
                                                                    echo"";
                                                                }else{
                                                                    
                                                                    if (mysqli_num_rows($rs)<=0){
                                                                        echo $errorA;
                                                                    }else {
                                                                        $rs = mysqli_query($conexion, $sqlContenido2);
                                                                        while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                            echo "<h5 id='label_cajas_texto'>Segundo Contenido</h5>";  
                                                                            ?><textarea name="contenido2" id="contenido2" rows="10" cols="100" ><?php echo $row['contenido2']?></textarea><?php
                                                                        };
                                                                    };
                                                                };//FIn del Segundo Contenido
                                                                ?>
                                                            <script>
                                                                CKEDITOR.replace( 'contenido2' );
                                                            </script>
                                                            </td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                            <td>
                                                            <?php
                                                            //Tercer Contenido                                                         
                                                                $con3=false;
                                                                switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                    case 'POST':
                                                                        $sqlContenido3="SELECT Responsabilidades as contenido3 from publicacion_postulate where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        $con3=true;    
                                                                        break;
                                                                    default:
                                                                        $con3=false;
                                                                        break;
                                                                }    
                                                                if(!$con3){
                                                                    echo"";
                                                                }else{
                                                                    
                                                                    if (mysqli_num_rows($rs)<=0){
                                                                        echo $errorA;
                                                                    }else {
                                                                        $rs = mysqli_query($conexion, $sqlContenido3);
                                                                        while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                            echo "<h5 id='label_cajas_texto'>Tercer Contenido</h5>";  
                                                                            ?><textarea name="contenido3" id="contenido3" rows="10" cols="100" ><?php echo $row['contenido3']?></textarea><?php
                                                                        };
                                                                    };
                                                                };//FIn del Tercer Contenido
                                                                ?>
                                                            <script>
                                                                CKEDITOR.replace( 'contenido3' );
                                                            </script>
                                                            </td>
                                                        </td>
                                                    </tr>
                                                        <tr>
                                                            <td colspan='2'>
                                                                <input type='submit' name='btnActualizar' id='btnRegistrar' value='Actualizar'>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td width="70px;">
                                    <?php
                                    switch ($_SESSION['ID_Rol']) {

                                        case TypeUsuario::ADMINISTRADOR:
                                            /* INGRESAR EL USUARIO COMO ADMINISTRADOR */
                                            switch ($mostrarPublicacion['Estado']) {
                                                case EstadoPublicacion::RECHAZADO_A:
                                                    echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_A&usuario=$_SESSION[Cedula]' title='Rechazada por el Autorizador' style='display: none;'>
                                                                        <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                      </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Reenviar a Publicador'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/regresar.png'>
                                                                 </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Reenviar a Autorizador'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                 </a>";
                                                    // echo "RECHAZADO_A";
                                                    break;
                                                case EstadoPublicacion::RECHAZADO_E:
                                                    echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Rechazada por Editor' style='display: none;'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/regresar.png'>
                                                                 </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado'	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                 </a>";
                                                    // echo "RECHAZADO_E";
                                                    break;
                                                case EstadoPublicacion::REVISION_E:
                                                    echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Revisión del Editor' style='display: none;'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                 </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Reenviar a Publicador'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/regresar.png'>
                                                                 </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Enviar a Autorizador'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                 </a>";
                                                    break;
                                                case EstadoPublicacion::REVISION_A:
                                                    echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Revisión Final' style='display: none;'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png' title='Editar Publicación'>
                                                                 </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_A&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/regresar.png'>
                                                                 </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=PUBLICADA&fecha=f&usuario=$_SESSION[Cedula]' title='Publicar'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/publicar.png'>
                                                                 </a>";
                                                    // echo "REVISION_P";
                                                    break;
                                                case EstadoPublicacion::PUBLICADA:
                                                    if ($mostrarPublicacion['estatus'] == 'A') {
                                                        echo"<a id='btnActivo' name='btnActivo' href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar' style='display: none;'>
                                                                            <img id='imagenBoton' src='assets/image/menu/botonesTablas/btnOffOn.png'>
                                                                        </a>";
                                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar'>
                                                                            <img id='imagenBoton' src='assets/image/menu/botonesTablas/btnOffOn.png'>
                                                                        </a>";
                                                    } else {
                                                        echo"<a id='btnActivo'      name='btnActivo' href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar'>
                                                                            <img id='imagenBoton' src='assets/image/menu/botonesTablas/btnOffOn.png'>
                                                                        </a>";
                                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar' style='display: none;'>
                                                                            <img id='imagenBoton' src='assets/image/menu/botonesTablas/btnOffOn.png'>
                                                                        </a>";
                                                    }

                                                    break;
                                                default:
                                                    echo"<a id='btnActivo' 		name='btnActivo' 		href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=BORR&usuario=$_SESSION[Cedula]' title='Estado Borrador' style='display: none;'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                 </a>";
                                                    echo"<a id='btnDesactivado' 	name='btnDesactivado'	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Enviar a Editor'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                 </a>";
                                                    //echo EstadoPublicacion::BORR:;
                                                    break;
                                            } //FIN SWITCH
                                            break;
                                            case TypeUsuario::AUTORIZADOR:
                                            /* INGRESAR EL USUARIO COMO AUTORIZADOR */
                                            switch ($mostrarPublicacion['Estado']) {
                                                case EstadoPublicacion::RECHAZADO_A:
                                                    // echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_A' title='Rechazada por el Autorizador'>Rechazada por Autorizador</a>";
                                                    // echo "RECHAZADO_A";
                                                    break;
                                                case EstadoPublicacion::RECHAZADO_E:
                                                    echo"<a id='btnDesactivado' name='btnDesactivado'	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'></a>";
                                                    // echo "RECHAZADO_E";
                                                    break;
                                                case EstadoPublicacion::REVISION_E:

                                                    break;
                                                case EstadoPublicacion::REVISION_A:

                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_A&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'>
                                                                <img id='imagenBoton' src='assets/image/menu/botonesTablas/regresar.png'>
                                                             </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=PUBLICADA&fecha=f&usuario=$_SESSION[Cedula]' title='Publicar'>
                                                                <img id='imagenBoton' src='assets/image/menu/botonesTablas/publicar.png'>
                                                             </a>";
                                                    // echo "REVISION_P";
                                                    break;
                                                case EstadoPublicacion::PUBLICADA:
                                                    if ($mostrarPublicacion['estatus'] == 'A') {
                                                        echo"<a id='btnActivo' name='btnActivo' href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar' style='display: none;'>
                                                                            <img id='imagenBoton' src='assets/image/menu/botonesTablas/btnOffOn.png'>
                                                                        </a>";
                                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar'>
                                                                            <img id='imagenBoton' src='assets/image/menu/botonesTablas/btnOffOn.png'>
                                                                        </a>";
                                                    } else {
                                                        echo"<a id='btnActivo'      name='btnActivo' href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar'>
                                                                            <img id='imagenBoton' src='assets/image/menu/botonesTablas/btnOffOn.png'>
                                                                        </a>";
                                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar' style='display: none;'>
                                                                            <img id='imagenBoton' src='assets/image/menu/botonesTablas/btnOffOn.png'>
                                                                        </a>";
                                                    }
                                                    break;
                                                default:
                                                    //echo EstadoPublicacion::BORR:;
                                                    break;
                                            } //FIN SWITCH
                                            break;
                                        case TypeUsuario::EDITOR:
                                            /* INGRESAR EL USUARIO COMO EDITOR */
                                            switch ($mostrarPublicacion['Estado']) {
                                                case EstadoPublicacion::RECHAZADO_A:
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Reenviar a Publicador'>
                                                                        <img id='imagenBoton' src='assets/image/menu/botonesTablas/regresar.png'>
                                                                     </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Reenviar a Autorizador'>
                                                                        <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                     </a>";
                                                    // echo "RECHAZADO_A";
                                                    break;
                                                case EstadoPublicacion::RECHAZADO_E:
                                                    // echo "RECHAZADO_E";
                                                    break;
                                                case EstadoPublicacion::REVISION_E:
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Reenviar a Publicador'>
                                                                        <img id='imagenBoton' src='assets/image/menu/botonesTablas/regresar.png'>
                                                                     </a>";
                                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Enviar a Autorizador'>
                                                                        <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                     </a>";
                                                    break;
                                                case EstadoPublicacion::REVISION_A:
                                                    // echo "REVISION_P";
                                                    break;
                                                case EstadoPublicacion::PUBLICADA:
                                                    break;
                                                default:
                                                    //echo EstadoPublicacion::BORR:;
                                                    break;
                                            } //FIN SWITCH  EDITOR
                                            break;
                                        case TypeUsuario::PUBLICADOR:
                                            /* INGRESAR EL USUARIO COMO EDITOR */
                                            switch ($mostrarPublicacion['Estado']) {
                                                case EstadoPublicacion::RECHAZADO_A:
                                                    // echo "RECHAZADO_A";
                                                    break;
                                                case EstadoPublicacion::RECHAZADO_E:
                                                    echo"<a id='btnDesactivado' name='btnDesactivado'	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                 </a>";
                                                    // echo "RECHAZADO_E";
                                                    break;
                                                case EstadoPublicacion::REVISION_E:
                                                    break;
                                                case EstadoPublicacion::REVISION_A:

                                                    // echo "REVISION_P";
                                                    break;
                                                case EstadoPublicacion::PUBLICADA:
                                                    //echo"<a id='btnDesactivado'    name='btnDesactivado'  href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E' title='Enviar a Editor'>Enviar a Editor</a>";
                                                    break;
                                                default:
                                                    echo"<a id='btnDesactivado' 	name='btnDesactivado'	href='php/publicaciones/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Enviar a Editor'>
                                                                    <img id='imagenBoton' src='assets/image/menu/botonesTablas/siguiente.png'>
                                                                 </a>";
                                                    //echo EstadoPublicacion::BORR:;
                                                    break;
                                            } //FIN SWITCH PUBLICADOR
                                            break;
                                        default: //PUBLICADOR
                                            echo ' <h5></h5>';
                                            break;
                                    }//FIN DE SWITCH PRINCIPAL ROL
                                    ?>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>
                        <!--FIN DEL WHILE-->
                    </tbody>
                </table>
                <?php
                if (isset($mensajeError)) {
                    echo $mensajeError;
                }
                ?>

            </div>


        </div>
        <!--FIN DEL CONTENEDOR CONTENIDOS-->


    </body>

</html>