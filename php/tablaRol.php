<table id="tabla_rol" border="1">
    <thead>
        <tr id="titulo_columnas">
            <td width="50" height="50" colspan="2">
                <a href="#formulario_modal_rol" id="btnRegistrarUsuario" title="Registar un Rol">
                    <img src="assets/image/menu/botonesTablas/btnNuevo.png">
                </a>

                <!--INICIO DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
                <div id="formulario_modal_rol" class="contenedor_formulario">

                    <div id="formulario">

                        <a href="#" class="cerrar">X</a>

                        <!--INICIO DEL DISEÑO FORMULARIO CREAR USUARIO-->
                        <div class="contenedor_formulario_rol">

                            <form method="POST" action="php/registrarRol.php">
                                <table id="tabla_formulario_rol" border="0" cellpadding="7">
                                    <tr id="titulo_columna_formulario">
                                        <td colspan="2">
                                            <h1 id="titulo_registro_rol">Registrar Rol</h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 id="label_cajas_texto">Codigo</h5>
                                            <input type="text" id="caja_formulario_usuario" name="txtCodigo" maxlength="4" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 id="label_cajas_texto">Nombre Del Rol</h5>
                                            <input type="text" id="caja_formulario_usuario" name="txtNombreRol" maxlength="100" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 id="label_cajas_texto">Descripción Del Rol</h5>
                                            <input type="text" id="caja_formulario_usuario" name="txtDesc" maxlength="255" required>
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
                <form method="POST">
                    <input type="text" name="txtBuscarRol" id="txtBuscarRol" placeholder="Buscar por nombre" maxlength="40">

                    <button type="submit" name="btnBuscarRol" id="btnBuscarRol" title="Buscar un rol">Buscar</button>
                </form>
            </td>
        </tr>

        <tr id="titulo_columnas">
            <td width="800px">
                <h5>Código</h5>
            </td>
            <td width="800px">
                <h5>Nombre</h5>
            </td>
            <td width="800px">
                <h5>Estatus</h5>
            </td>
            <td width="800px">
                <h5>Descripción</h5>
            </td>
            <td width="800px">
                <h5>Creado Por</h5>
            </td>
            <td width="800px">
                <h5>Fecha Creación</h5>
            </td>
            <td width="800px">
                <h5>Actualizado Por</h5>
            </td>
            <td width="800px">
                <h5>Fecha Actualización</h5>
            </td>
            <td width="0px">
                <h5></h5>
            </td>
            <td width="0px">
                <h5></h5>
            </td>
            <td width="0px">
                <h5></h5>
            </td>
            <td width="0px">
                <h5></h5>
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
        $conexion = conectar();
        /* FIN DE LAS VARIABLES DE CONSULTA */

        if (isset($_POST["txtBuscarRol"])) {

            $nombre = $_POST["txtBuscarRol"];
            $where = " where nombre like '%" . $nombre . "%'";

            $consultarol = mysqli_query($conexion, " SELECT DISTINCT(cat.ID_Rol) as codigo,
					                                          cat.nombre as nombre,
					                                          cat.estatus as estatus,
					                                          cat.Created,
				                                              cat.CreatedBy,
				                                              cat.Updated,
				                                              cat.UpdatedBy,
				                                              cat.Descripcion
				                                         FROM rol cat
		                                                 $where
		                                                 ORDER BY cat.ID_Rol ");
            if (mysqli_num_rows($consultarol) == 0) {
                $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
            }
        } else {
            $consultarol = mysqli_query($conexion, " SELECT DISTINCT(cat.ID_Rol) as codigo,
				 	                                          cat.nombre as nombre,
					                                          cat.estatus as estatus,
					                                          cat.Created,
				                                              cat.CreatedBy,
				                                              cat.Updated,
				                                              cat.UpdatedBy,
				                                              cat.Descripcion
				                                         FROM rol cat

		                                               ORDER BY cat.ID_Rol ");
        }
        while ($mostrarRol = mysqli_fetch_array($consultarol, MYSQLI_ASSOC)) {
            ?>
            <tr id="datos_usuario">
                <td>
                    <h5>
                        <?php echo $mostrarRol['codigo']; ?>
                    </h5>
                </td>

                <td>
                    <h5>
                        <?php echo $mostrarRol['nombre']; ?>
                    </h5>
                </td>

                <td>
                    <h5>
                        <?php
                        switch ($mostrarRol['estatus']) {
                            case 'A':
                                echo "ACTIVA";
                                break;
                            default:
                                echo "INACTIVA";
                                break;
                        }
                        ?>
                    </h5>
                </td>

                <td>
                    <h5>
                        <?php echo $mostrarRol['Descripcion']; ?>
                    </h5>
                </td>

                <td>
                    <h5>
                        <?php
                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
							         FROM   usuario
							         WHERE  Cedula='$mostrarRol[CreatedBy]' ";
                        $rs = mysqli_query($conexion, $sql);
                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                        echo $row['Nombre'];
                        ?>
                    </h5>
                </td>

                <td>
                    <h5>
                        <?php echo $mostrarRol['Created']; ?>
                    </h5>
                </td>

                <td>
                    <h5>
                        <?php
                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
							         FROM   usuario
							         WHERE  Cedula='$mostrarRol[UpdatedBy]' ";
                        $rs = mysqli_query($conexion, $sql);
                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                        echo $row['Nombre'];
                        ?>
                    </h5>
                </td>

                <td>
                    <h5>
                        <?php echo $mostrarRol['Updated']; ?>
                    </h5>
                </td>

                <td>
                    <h5></h5>
                </td>

                <td>
                    <h5></h5>
                </td>

                <td>
                    <h5></h5>
                </td>

                <td>
                    <h5></h5>
                </td>

                <td>
                    <a href="#<?php echo $mostrarRol['codigo']; ?>" id="btnEditar">
                        <img src='assets/image/menu/botonesTablas/btnEditar.png'>
                    </a>

                    <div id="<?php echo $mostrarRol['codigo']; ?>" class='contenedor_formulario'>

                        <div id='formulario'>

                            <a href='#' class='cerrar'>X</a>

                            <div class='contenedor_formulario_directorio'>

                                <form method='POST' action='php/actualizarRol.php'>

                                    <table id='tabla_formulario_rol' border='0' cellpadding='7'>
                                        <tr id='titulo_columna_formulario'>
                                            <td colspan='2'>
                                                <h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id='label_cajas_texto'>Código</h5>
                                                <input type='text' id='caja_formulario_usuario' name='txtCodigo' maxlength='4' value='<?php echo $mostrarRol['codigo']; ?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id='label_cajas_texto'>Nombre</h5>
                                                <input type='text' id='caja_formulario_usuario' name='txtNombre' maxlength='100' value='<?php echo $mostrarRol['nombre']; ?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id='label_cajas_texto'>Descripción Rol</h5>
                                                <input type='text' id='caja_formulario_usuario' name='txtDesc' maxlength="255" value='<?php echo $mostrarRol['Descripcion']; ?>'>
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
                    if ($mostrarRol['estatus'] == 'A') {
                        echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoRol.php?codigo=$mostrarRol[codigo]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar' style='display: none;'>
								<img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoRol.php?codigo=$mostrarRol[codigo]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar'>
								<img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
                    } else {
                        echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoRol.php?codigo=$mostrarRol[codigo]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar'>
								<img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoRol.php?codigo=$mostrarRol[codigo]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar' style='display: none;'>
								<img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
        <!--FIN DEL WHILE-->
    </tbody>
</table>
<?php
if (isset($mensajeError)) {
    echo $mensajeError;
}
?>
