<?php
@session_start();
//define("BASE_DIR", realpath(dirname(__FILE__)));
//include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';
//include $_SERVER["DOCUMENT_ROOT"].'/intranet/php/estadoPublicacion.php';
//include $_SERVER["DOCUMENT_ROOT"].'/intranet//php/estadosLogin.php';
?>

<script type="text/javascript" src="js/subCategoriaParaRegistrar.js"></script>
<script type="text/javascript" src="js/subCategoriaParaEditar.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>

<table id="tabla_publicacion" border="1">
    <thead>
        <tr id="titulo_columnas">
            <td width="50" height="50" colspan="2">
                <!--<a href="#formulario_modal_publicacion" id="btnRegistrarUsuario" title="Crear Publicación">
                        <img src="imagenes/menu/botonesTablas/btnNuevo.png">
                </a>-->
                <!--INICIO DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
                <div id="formulario_modal_publicacion" class="contenedor_formulario">

                    <div id="formulario">

                        <a href="#" class="cerrar"> X </a>

                        <!--INICIO DEL DISEÑO FORMULARIO CREAR PUBLICACION-->
                        <div class="contenedor_formulario_publicacion">

                            <form method="POST" enctype="multipart/form-data" action="php/registrarPublicacion.php">
                                <table id="tabla_formulario_publicacion" border="0" cellpadding="7">
                                    <tr id="titulo_columna_formulario">
                                        <td colspan="2">
                                            <h1 id="titulo_registro_publicaion">Registrar Publicaciones</h1>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 id="label_cajas_texto">Título de la Publicación</h5>
                                            <input type="text" class="caja_formulario_usuario" name="txtTituloP" maxlength="400" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 id="label_cajas_texto">Categoría de la Publicación: </h5>

                                            <?php
                                            $conexion = conectar();
                                            echo "
												<select name='txtCodigoC' class='combos_formulario_usuario' id='txtCodigoC' required >
												<option> Categoría </option>";

                                            $sql = " SELECT c.ID_Categoria,c.Nombre FROM categoria c WHERE c.Estatus='A'";
                                            $rs = mysqli_query($conexion, $sql);
                                            if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                do {
                                                    echo "<option value='$row[ID_Categoria]'> $row[Nombre] </option>";
                                                } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                            }
                                            echo "</select>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 id="label_cajas_texto">SubCategoría de la Publicación: </h5>
                                            <select name="txtCodSubCate" id="txtCodSubCate" class ="combos_formulario_usuario" required>
                                                <option value="">Subcategorías</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="color_fondo_cajas">
                                            <h5 id="label_cajas_texto">Subir Imagen</h5>
                                            <input type="file" name="btnImagen" id="btnImage" class='btn' required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 id="label_cajas_texto">Contenido de la Publicación</h5>

                                            <textarea name="contenido" id="contenido" rows="80" cols="640" >

                                            </textarea>
                                            <script>

                                                CKEDITOR.replace('contenido');
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" name="btnRegistrar" id="btnRegistrar" value="Registrar">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <!--FIN DEL DISEÑO FORMULARIO CREAR USUARIO-->
                    </div>
                    <!--FIN DIV FORMULARIO-->
                </div>
                <!--FIN DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
            </td>
            <td colspan="12">
                <form method="POST" action=''>
                    <input type="text" name="txtbuscar" id="txtBuscarPublicacion" placeholder="Buscar Por Título" maxlength="40">

                    <button type="submit" name="btnBuscarPublicacion" id="btnBuscarPublicacion" title="Buscar una Publicación">Buscar</button>
                </form>
            </td>
        </tr>
        <tr id="titulo_columnas">
            <td width="800px">
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
            <td width="800px">
                <h5>Edición</h5>
            </td>
            <td width="100px">
                <h5>Acción</h5>
            </td>
        </tr>
    </thead>
    <tbody>
        <?php
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
                } else {

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
                } else {

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
                } else {

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
                } else {

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
                    <h5><?php echo $mostrarPublicacion['ID_Publicacion']; ?></h5>
                </td>

                <td>
                    <h5><?php echo $mostrarPublicacion['titulo']; ?></h5>
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
                    <h5><?php echo $mostrarPublicacion['motivo']; ?></h5>
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
                    <h5><?php echo $mostrarPublicacion['Created']; ?></h5>
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
                    <h5><?php echo $mostrarPublicacion['Updated']; ?></h5>
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
                    <h5><?php echo $mostrarPublicacion['F_Publicacion']; ?></h5>
                </td>
                <td>
                    <?php
                    switch ($_SESSION['ID_Rol']) {

                        case TypeUsuario::ADMINISTRADOR:
                            /* INGRESAR EL USUARIO COMO ADMINISTRADOR */
                            switch ($mostrarPublicacion['Estado']) {
                                case EstadoPublicacion::RECHAZADO_A:
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													     <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
												     </a>";

                                    break;
                                case EstadoPublicacion::RECHAZADO_E:
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													     <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
												     </a>";

                                    break;
                                case EstadoPublicacion::REVISION_E:
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													     <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
												     </a>";

                                    break;
                                case EstadoPublicacion::REVISION_A:
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													     <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
												     </a>";

                                    break;
                                case EstadoPublicacion::PUBLICADA:
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													     <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
												     </a>";
                                    break;
                                default:// EstadoPublicacion::BORR:;
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													     <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
												     </a>";
                                    break;
                            } //FIN SWITCH
                            break;
                        case TypeUsuario::AUTORIZADOR:
                            /* INGRESAR EL USUARIO COMO AUTORIZADOR */
                            switch ($mostrarPublicacion['Estado']) {
                                case EstadoPublicacion::RECHAZADO_A:

                                    break;
                                case EstadoPublicacion::RECHAZADO_E:

                                    break;
                                case EstadoPublicacion::REVISION_E:

                                    break;
                                case EstadoPublicacion::REVISION_A:
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													         <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
												           </a>";
                                    break;
                                case EstadoPublicacion::PUBLICADA:

                                    break;
                                default:

                                    break;
                            } //FIN SWITCH
                            break;
                        case TypeUsuario::EDITOR:
                            /* INGRESAR EL USUARIO COMO EDITOR */
                            switch ($mostrarPublicacion['Estado']) {
                                case EstadoPublicacion::RECHAZADO_A:
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													         <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
												           </a>";
                                    break;
                                case EstadoPublicacion::RECHAZADO_E:

                                    break;
                                case EstadoPublicacion::REVISION_E:
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													         <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
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
                            /* INGRESAR EL USUARIO COMO EDITOR */
                            switch ($mostrarPublicacion['Estado']) {
                                case EstadoPublicacion::RECHAZADO_A:

                                    break;
                                case EstadoPublicacion::RECHAZADO_E:
                                    echo"<a href='#$mostrarPublicacion[ID_Publicacion]' id='btnEditar'>
													           <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
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
													           <img src='imagenes/menu/botonesTablas/btnEditar.png' title='Editar Publicación'>
												            </a>";
                                    break;
                            } //FIN SWITCH PUBLICADOR
                            break;
                        default: //PUBLICADOR
                            echo ' <h5></h5>';
                            break;
                    }//FIN DE SWITCH PRINCIPAL ROL
                    ?>

                    <div id='<?php echo $mostrarPublicacion['ID_Publicacion']; ?>' class='contenedor_formulario'>

                        <div id='formulario'>

                            <a href='#' class='cerrar'>X</a>

                            <div class='contenedor_formulario_publicacion'>

                                <form method='POST' enctype='multipart/form-data' action='php/actualizarPublicacion.php'>

                                    <table id='tabla_formulario_publicacion' border='0' cellpadding='7'>
                                        <tr id='titulo_columna_formulario'>
                                            <td colspan='2'>
                                                <h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h5></h5>
                                                <input type='hidden' class='caja_formulario_usuario' readonly="readonly" name='txtCodigoP' maxlength='3' value='<?php echo $mostrarPublicacion['ID_Publicacion']; ?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id='label_cajas_texto'>Título</h5>
                                                <input type='text' class='caja_formulario_usuario' id='txtTituloP' required name='txtTituloP' maxlength='100' value='<?php echo $mostrarPublicacion['titulo']; ?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id="label_cajas_texto">Categoría: </h5>

                                                <?php
                                                echo "
												<select name='txtCodigoCat' class='combos_formulario_usuario' id='txtCodigoCat' required >
												<option> Categoría </option>";

                                                $sql = " SELECT ID_Categoria, Nombre
												         FROM categoria
												         WHERE Estatus='A'";
                                                $rs = mysqli_query($conexion, $sql);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($_SESSION['ID_Categoria'] == $row['ID_Categoria'])
                                                            echo "<option value='$row[ID_Categoria]' selected='selected'> $row[Nombre] </option>";
                                                        else
                                                            echo "<option value='$row[ID_Categoria]'> $row[Nombre] </option>";
                                                    }while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id="label_cajas_texto">SubCategoría: </h5>
                                                <?php
                                                echo "
													<select name='txtCodigoSubC' class='combos_formulario_usuario' id='txtCodigoSubC' required>
													<option> SubCategoría </option>";

                                                $sql = " SELECT ID_Subcategoria,Nombre FROM subcategoria ";
                                                $rs = mysqli_query($conexion, $sql);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($mostrarPublicacion['ID_Subcategoria'] == $row[ID_Subcategoria])
                                                            echo "<option value='$row[ID_Subcategoria]' selected='selected'> $row[Nombre] </option>";
                                                        else
                                                            echo "<option value='$row[ID_Subcategoria]'> $row[Nombre] </option>";
                                                    }while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="color_fondo_cajas">
                                                <h5 id="label_cajas_texto">Seleccionar Imagen</h5>
                                                <input type="file" name="btnImagen" id="btnImage">

                                                <h5><img src="<?php echo $mostrarPublicacion['foto']; ?>" id="imagen" width='100' height='100'></h5>
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
														 <textarea name='motivo' id='motivo' rows='10' cols='80' >
											                 $mostrarPublicacion[motivo]
											            </textarea>
											            <script>
											                CKEDITOR.replace( 'motivo' );
											            </script>";
                                                        break;
                                                    case TypeUsuario::AUTORIZADOR:
                                                        /* INGRESAR EL USUARIO COMO AUTORIZADOR */
                                                        echo"
						                              <h5 id='label_cajas_texto'>Observaciones de la Edición</h5>
														 <textarea name='motivo' id='motivo' rows='10' cols='80' >
											                 $mostrarPublicacion[motivo]
											            </textarea>
											            <script>
											                CKEDITOR.replace( 'motivo' );
											            </script>";
                                                        break;
                                                    case TypeUsuario::EDITOR:
                                                        /* INGRESAR EL USUARIO COMO EDITOR */
                                                        echo"
						                              <h5 id='label_cajas_texto'>Observaciones de la Edición</h5>
														 <textarea name='motivo' id='motivo' rows='10' cols='80' >
											                 $mostrarPublicacion[motivo]
											            </textarea>
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
                                                <h5 id="label_cajas_texto">Contenido</h5>

                                                <textarea name="contenido2" id="contenido2" rows="10" cols="80" required>
                                                    <?php echo $mostrarPublicacion['contenido']; ?>
                                                </textarea>
                                                <script>
                                                    CKEDITOR.replace('contenido2');
                                                </script>
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
                                    echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_A&usuario=$_SESSION[Cedula]' title='Rechazada por el Autorizador' style='display: none;'>
									     	     		<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
									     	     	  </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Reenviar a Publicador'>
									     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/regresar.png'>
									     		 </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Reenviar a Autorizador'>
									     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
									     		 </a>";
                                    // echo "RECHAZADO_A";
                                    break;
                                case EstadoPublicacion::RECHAZADO_E:
                                    echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Rechazada por Editor' style='display: none;'>
									     	     	<img id='imagenBoton' src='imagenes/menu/botonesTablas/regresar.png'>
									     	     </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado'	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'>
									     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
									     		 </a>";
                                    // echo "RECHAZADO_E";
                                    break;
                                case EstadoPublicacion::REVISION_E:
                                    echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Revisión del Editor' style='display: none;'>
									     	     	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
									     	     </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Reenviar a Publicador'>
										         	<img id='imagenBoton' src='imagenes/menu/botonesTablas/regresar.png'>
										         </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Enviar a Autorizador'>
									     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
									     		 </a>";
                                    break;
                                case EstadoPublicacion::REVISION_A:
                                    echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Revisión Final' style='display: none;'>
									     	     	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png' title='Editar Publicación'>
									     	     </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_A&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'>
										         	<img id='imagenBoton' src='imagenes/menu/botonesTablas/regresar.png'>
										         </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=PUBLICADA&fecha=f&usuario=$_SESSION[Cedula]' title='Publicar'>
									     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/publicar.png'>
									     		 </a>";
                                    // echo "REVISION_P";
                                    break;
                                case EstadoPublicacion::PUBLICADA:
                                    if ($mostrarPublicacion['estatus'] == 'A') {
                                        echo"<a id='btnActivo' name='btnActivo' href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar' style='display: none;'>
															<img id='imagenBoton' src='imagenes/menu/botonesTablas/btnOffOn.png'>
														</a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar'>
															<img id='imagenBoton' src='imagenes/menu/botonesTablas/btnOffOn.png'>
														</a>";
                                    } else {
                                        echo"<a id='btnActivo'      name='btnActivo' href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar'>
															<img id='imagenBoton' src='imagenes/menu/botonesTablas/btnOffOn.png'>
														</a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar' style='display: none;'>
															<img id='imagenBoton' src='imagenes/menu/botonesTablas/btnOffOn.png'>
														</a>";
                                    }

                                    break;
                                default:
                                    echo"<a id='btnActivo' 		name='btnActivo' 		href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=BORR&usuario=$_SESSION[Cedula]' title='Estado Borrador' style='display: none;'>
									     	     	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
									     	     </a>";
                                    echo"<a id='btnDesactivado' 	name='btnDesactivado'	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Enviar a Editor'>
										         	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
										         </a>";
                                    //echo EstadoPublicacion::BORR:;
                                    break;
                            } //FIN SWITCH
                            break;
                        case TypeUsuario::AUTORIZADOR:
                            /* INGRESAR EL USUARIO COMO AUTORIZADOR */
                            switch ($mostrarPublicacion['Estado']) {
                                case EstadoPublicacion::RECHAZADO_A:
                                    // echo"<a id='btnActivo' 	 name='btnActivo' 		href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_A' title='Rechazada por el Autorizador'>Rechazada por Autorizador</a>";
                                    // echo "RECHAZADO_A";
                                    break;
                                case EstadoPublicacion::RECHAZADO_E:
                                    echo"<a id='btnDesactivado' name='btnDesactivado'	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'></a>";
                                    // echo "RECHAZADO_E";
                                    break;
                                case EstadoPublicacion::REVISION_E:

                                    break;
                                case EstadoPublicacion::REVISION_A:

                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_A&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'>
									         	<img id='imagenBoton' src='imagenes/menu/botonesTablas/regresar.png'>
									         </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=PUBLICADA&fecha=f&usuario=$_SESSION[Cedula]' title='Publicar'>
								     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/publicar.png'>
								     		 </a>";
                                    // echo "REVISION_P";
                                    break;
                                case EstadoPublicacion::PUBLICADA:
                                    if ($mostrarPublicacion['estatus'] == 'A') {
                                        echo"<a id='btnActivo' name='btnActivo' href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar' style='display: none;'>
															<img id='imagenBoton' src='imagenes/menu/botonesTablas/btnOffOn.png'>
														</a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar'>
															<img id='imagenBoton' src='imagenes/menu/botonesTablas/btnOffOn.png'>
														</a>";
                                    } else {
                                        echo"<a id='btnActivo'      name='btnActivo' href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar'>
															<img id='imagenBoton' src='imagenes/menu/botonesTablas/btnOffOn.png'>
														</a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar' style='display: none;'>
															<img id='imagenBoton' src='imagenes/menu/botonesTablas/btnOffOn.png'>
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
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Reenviar a Publicador'>
										     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/regresar.png'>
										     		 </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Reenviar a Autorizador'>
										     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
										     		 </a>";
                                    // echo "RECHAZADO_A";
                                    break;
                                case EstadoPublicacion::RECHAZADO_E:
                                    // echo "RECHAZADO_E";
                                    break;
                                case EstadoPublicacion::REVISION_E:
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=RECHAZADO_E&usuario=$_SESSION[Cedula]' title='Reenviar a Publicador'>
											         	<img id='imagenBoton' src='imagenes/menu/botonesTablas/regresar.png'>
											         </a>";
                                    echo"<a id='btnDesactivado' name='btnDesactivado' 	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_A&usuario=$_SESSION[Cedula]' title='Enviar a Autorizador'>
										     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
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
                                    echo"<a id='btnDesactivado' name='btnDesactivado'	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Reenviar a Editor'>
									     		 	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
									     		 </a>";
                                    // echo "RECHAZADO_E";
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
                                    echo"<a id='btnDesactivado' 	name='btnDesactivado'	href='php/actualizarEstadoPublicacion.php?codigo=$mostrarPublicacion[ID_Publicacion]&estado=REVISION_E&usuario=$_SESSION[Cedula]' title='Enviar a Editor'>
										         	<img id='imagenBoton' src='imagenes/menu/botonesTablas/siguiente.png'>
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
        ?><!--FIN DEL WHILE-->
    </tbody>
</table>
<?php
if (isset($mensajeError)) {
    echo $mensajeError;
}
?>
