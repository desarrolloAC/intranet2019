<?php
$conexion = conectar();
?>

<script type="text/javascript" src="js/selectdependientes.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

<table id="tabla_usuario" border="1">
    <thead>
        <tr id="titulo_columnas" class="ancho">
            <td width="50" height="50" colspan="2" class="ancho">
                <a href="#formulario_modal_usuario" id="btnRegistrarUsuario" title="Registar un usuario">
                    <img src="assets/image/menu/botonesTablas/btnNuevo.png">
                </a>

                <!--INICIO DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
                <div id="formulario_modal_usuario" class="contenedor_formulario">

                    <div id="formulario">

                        <a href="#" class="cerrar">X</a>

                        <!--INICIO DEL DISEÑO FORMULARIO CREAR USUARIO-->
                        <div class="contenedor_formulario_usuario">

                            <form method="POST" enctype="multipart/form-data" action="php/registroUsuario.php">

                                <table id="tabla_formulario_usuario" border="0" cellpadding="7">
                                    <tr id="titulo_columna_formulario" class="ancho">
                                        <td colspan="3" class="ancho">
                                            <h1 id="titulo_registro_usuario">Registro De Usuario</h1>
                                        </td>
                                    </tr>
                                    <tr class="ancho">
                                        <td>
                                            <h5 id="label_cajas_texto">Cédula</h5>
                                            <input type="text" id="caja_formulario_usuario" name="txtCedula" maxlength="8" required>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Primer Nombre</h5>
                                            <input type="text" id="caja_formulario_usuario" name="txtpNombre" maxlength="40" required>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Primer Apellido</h5>
                                            <input type="text" id="caja_formulario_usuario" name="txtpApellido" maxlength="40" required>
                                        </td>
                                    </tr>
                                    <tr class="ancho">
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Segundo Nombre</h5>
                                            <input type="text" id="caja_formulario_usuario" maxlength="40" name="txtsNombre">
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Segundo Apellido</h5>
                                            <input type="text" id="caja_formulario_usuario" maxlength="40" name="txtsApellido">
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Género</h5>
                                            <select id="combos_formulario_usuario" name="cbSexo" required>
                                                <option value="">Seleccione</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Masculino">Masculino</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="ancho">
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto"> Departamento </h5>
                                            <?php
                                            echo "
													<select name='txtDpto' class='combos_formulario_usuario' id='txtDpto' required >
													<option> Departamento </option>";

                                            $sql = " SELECT d.ID_Departamento,d.Nombre FROM departamento d WHERE d.Estatus='A'";
                                            $rs = mysqli_query($conexion, $sql);
                                            if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                do {
                                                    echo "<option value='$row[ID_Departamento]'> $row[Nombre] </option>";
                                                } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                            }

                                            echo "</select>";
                                            ?>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto"> Cargo </h5>
                                            <select name='txtCargo' class='combos_formulario_usuario' id='txtCargo' required>
                                                <option> Cargo </option>
                                            </select>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Rol</h5>
                                            <?php
                                            echo "
														<select name='rol' id='rol'  class='combos_formulario_usuario'   required >
														<option>Rol </option>";

                                            $sql = "SELECT * FROM rol WHERE estatus='A' ORDER BY Nombre ";
                                            $rs = mysqli_query($conexion, $sql);
                                            if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                do {
                                                    echo "<option value='$row[ID_Rol]'> $row[Nombre] </option>";
                                                } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                            }

                                            echo "</select>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="ancho">
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Teléfono</h5>
                                            <input type="text" id="caja_formulario_usuario" maxlength="200" name="txttelefono" required>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Correo</h5>
                                            <input type="text" id="caja_formulario_usuario" maxlength="200" name="txtCorreo" required>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Contraseña</h5>
                                            <input type="password" id="caja_formulario_usuario" maxlength="200" name="clave1" required>
                                        </td>
                                    </tr>
                                    <tr class="ancho">
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Repita Contraseña</h5>
                                            <input type="password" id="caja_formulario_usuario" maxlength="200" name="clave2" required>
                                        </td>
                                        <td>
                                            <h5 id="label_cajas_texto"> Pregunta Secreta </h5>
                                            <select name="pre" id="pre" class='combos_formulario_usuario' required>
                                                <option value="">Seleccionar</option>
                                                <option value="Nombre de tu Primera Mascota">Nombre de tu Primera Mascota</option>
                                                <option value="Procer de la Independencia">Procer de la Independencia</option>
                                                <option value="Estado de Venezuela">Estado de Venezuela</option>
                                                <option value="Lugar de Nacimiento de la Madre">Lugar de Nacimiento de la Madre</option>
                                                <option value="Lugar de Nacimiento del Padre">Lugar de Nacimiento del Padre</option>
                                                <option value="Mejor Amigo de la Infancia">Mejor Amigo de la Infancia</option>
                                                <option value="Maestro Preferido de tu Infancia">Maestro Preferido de la Infancia</option>
                                                <option value="Lugar Favorito">Lugar Favorito</option>
                                                <option value="Comida Favorita">Comida Favorita</option>
                                            </select>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Respuesta Secreta</h5>
                                            <input type="password" id="caja_formulario_usuario" maxlength="200" name="res" required>
                                        </td>
                                    </tr>
                                    <tr class="ancho">
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Pais</h5>
                                            <?php
                                            echo "
														<select name='pai' id='pai'  class='combos_formulario_usuario' required >
														<option>Pais </option>";

                                            $sql = "SELECT * FROM paises";
                                            $rs = mysqli_query($conexion, $sql);
                                            if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                do {
                                                    echo "<option value='$row[0]'> $row[1] </option>";
                                                } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                            }

                                            echo "</select>";
                                            ?>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Estado</h5>
                                            <select name="edo" id="edo" class='combos_formulario_usuario' id='edo' required>
                                                <option value="">Estado</option>
                                            </select>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Municipio</h5>
                                            <select name="mun" id="mun" class='combos_formulario_usuario' id='mun' required>
                                                <option value="">Municipio</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="ancho">
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Ciudad</h5>
                                            <select name="ciu" id="ciu" class='combos_formulario_usuario' id='ciu' required>
                                                <option value="">Ciudad</option>
                                            </select>
                                        </td>
                                        <td class="ancho">
                                            <h5 id="label_cajas_texto">Parroquia</h5>
                                            <select name="par" id="par" class='combos_formulario_usuario' id='par' required>
                                                <option value="">Parroquia</option>
                                            </select>
                                        </td>
                                        <td id="color_fondo_cajas" class="ancho">
                                            <h5 id="label_cajas_texto">Subir Imagen</h5>
                                            <input type="file" name="btnImagen" id="btnImage" required>
                                        </td>
                                    </tr>
                                    <tr class="ancho">
                                        <td colspan="3" class="ancho">
                                            <h5 id="label_cajas_texto">Dirección</h5>
                                            <input type="text" id="caja_formulario_usuario" name="dir" required>
                                        </td>
                                    </tr>
                                    <tr align="center" class="ancho">
                                        <td colspan="3" class="ancho">
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
            <td colspan="12" class="ancho">
                <form method="POST">
                    <input type="text" name="txtBuscarUsuario" id="txtBuscarUsuario" placeholder="Buscar Cédula" maxlength="40">
                    <button type="submit" name="btnBuscarUsuario" id="btnBuscarUsuario" title="Buscar un usuario">Buscar</button>
                </form>
            </td>
        </tr>
        <tr id="titulo_columnas" class="ancho">
            <td width="10px" class="ancho">
                <h5>Cédula</h5>
            </td>

            <td width="800px" class="ancho">
                <h5>Nombres</h5>
            </td>

            <td width="800px" class="ancho">
                <h5>Apellidos</h5>
            </td>
            <td width="100px" class="ancho">
                <h5>Género</h5>
            </td>

            <td width="100px" class="ancho">
                <h5>Estatus</h5>
            </td>

            <td width="700px" class="ancho">
                <h5>Correo</h5>
            </td>

            <td width="100px" class="ancho">
                <h5>Teléfono</h5>
            </td>

            <td width="100px" class="ancho">
                <h5>Dirección</h5>
            </td>

            <td width="800px" class="ancho">
                <h5>Organización</h5>
            </td>

            <td width="800px" class="ancho">
                <h5>Departamento</h5>
            </td>

            <td width="200px" class="ancho">
                <h5>Cargo</h5>
            </td>

            <td width="100px" class="ancho">
                <h5>Rol</h5>
            </td>

            <td width="100px" class="ancho">
                <h5>Edicion</h5>
            </td>

            <td width="100px" colspan="2" class="ancho">
                <h5>Acción</h5>
            </td>
        </tr>
    </thead>
    <tbody>
        <?php
        /* FIN DE LAS VARIABLES DE CONSULTA */

        if (isset($_POST["txtBuscarUsuario"])) {

            $ced = $_POST["txtBuscarUsuario"];
            $where = " where u.Cedula like '%" . $ced . "%' AND o.ID_Organizacion='$_SESSION[ID_Organizacion]'";

            $consultarUsuario = mysqli_query($conexion, "SELECT DISTINCT(u.Cedula) as codigo,
																       CONCAT(u.PNombre,' ',    SUBSTRING(u.SNombre,1,1)) as nombre,
																       CONCAT(u.PApellido,' ',  SUBSTRING(u.SApellido,1,1) ) as  Apellido,
																       u.PNombre,
																       u.SNombre,
																       u.PApellido,
																       u.SApellido,
																       u.Sexo,
																       u.Estatus,
																       u.Correo,
																       u.Telefono,
																       u.Direccion,
																       o.Nombre as organizacion,
                                                                       d.Nombre as departamento,
                                                                       c.Nombre as cargo,
																       r.Nombre as rol,
																       u.foto,
																       u.ID_Pais,
																       u.ID_Estado,
																       u.ID_Municipio,
																       u.ID_Parroquia,
																       u.ID_Ciudad

																FROM org_usuario_rol  oru
																RIGHT JOIN usuario      u ON (oru.Cedula=u.Cedula)
																RIGHT JOIN organizacion o ON (oru.ID_Organizacion=o.ID_Organizacion)
																LEFT JOIN rol           r ON (oru.ID_Rol=r.ID_Rol)
																LEFT JOIN cargo         c ON (c.ID_Cargo=u.ID_Cargo)
                                                                LEFT JOIN departamento  d ON (c.ID_Departamento=d.ID_Departamento)
                                                                $where
				                                                ORDER BY u.Cedula ");
            if (mysqli_num_rows($consultarUsuario) == 0) {
                $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
            }
        } else {
            $consultarUsuario = mysqli_query($conexion, " SELECT DISTINCT(u.Cedula) as codigo,
																       CONCAT(u.PNombre,' ',    SUBSTRING(u.SNombre,1,1)) as nombre,
																       CONCAT(u.PApellido,' ',  SUBSTRING(u.SApellido,1,1) ) as  Apellido,
																       u.PNombre,
																       u.SNombre,
																       u.PApellido,
																       u.SApellido,
																       u.Sexo,
																       u.Estatus,
																       u.Correo,
																       u.Telefono,
																       u.Direccion,
																       o.Nombre as organizacion,
                                                                       d.Nombre as departamento,
                                                                       c.Nombre as cargo,
																       r.Nombre as rol,
																       u.foto,
																       u.ID_Pais,
																       u.ID_Estado,
																       u.ID_Municipio,
																       u.ID_Parroquia,
																       u.ID_Ciudad

																FROM org_usuario_rol  oru
																RIGHT JOIN usuario      u ON (oru.Cedula=u.Cedula)
																RIGHT JOIN organizacion o ON (oru.ID_Organizacion=o.ID_Organizacion)
																LEFT JOIN rol           r ON (oru.ID_Rol=r.ID_Rol)
																LEFT JOIN cargo         c ON (c.ID_Cargo=u.ID_Cargo)
                                                                LEFT JOIN departamento  d ON (c.ID_Departamento=d.ID_Departamento)
                                                                WHERE     o.ID_Organizacion='$_SESSION[ID_Organizacion]'
				                                                ORDER BY u.Cedula  ");
        }
        while ($mostrarUsuario = mysqli_fetch_array($consultarUsuario, MYSQLI_ASSOC)) {
            ?>
            <tr id="datos_usuario" class="ancho">
                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['codigo']; ?>
                    </h5>
                </td>

                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['nombre']; ?>
                    </h5>
                </td>
                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['Apellido']; ?>
                    </h5>
                </td>
                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['Sexo']; ?>
                    </h5>
                </td>
                <td class="ancho">
                    <h5>
                        <?php
                        switch ($mostrarUsuario['Estatus']) {
                            case 'A':
                                echo "ACTIVO";
                                break;
                            default:
                                echo "INACTIVO";
                                break;
                        }
                        ?>
                    </h5>
                </td>

                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['Correo']; ?>
                    </h5>
                </td>

                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['Telefono']; ?>
                    </h5>
                </td>

                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['Direccion']; ?>
                    </h5>
                </td>
                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['organizacion']; ?>
                    </h5>
                </td>

                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['departamento']; ?>
                    </h5>
                </td>

                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['cargo']; ?>
                    </h5>
                </td>

                <td class="ancho">
                    <h5>
                        <?php echo $mostrarUsuario['rol']; ?>
                    </h5>
                </td>

                <td class="ancho">

                    <a href='#<?php echo $mostrarUsuario['codigo']; ?>' id='btnEditar'>
                        <img src='assets/image/menu/botonesTablas/btnEditar.png'>
                    </a>

                    <div id='<?php echo $mostrarUsuario['codigo']; ?>' class='contenedor_formulario'>

                        <div id='formulario'>

                            <a href='#' class='cerrar'>X</a>

                            <div class='contenedor_formulario_usuario'>

                                <form method='POST' action='php/actualizarUsuario.php' enctype="multipart/form-data">

                                    <table id='tabla_formulario_usuario' border='0' cellpadding='7'>
                                        <tr id='titulo_columna_formulario'>
                                            <td colspan='3'>
                                                <h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id='label_cajas_texto'>Cédula</h5>
                                                <input type='text' id='caja_formulario_usuario' name='txtCedula' maxlength='8' readonly value='<?php echo $mostrarUsuario['codigo']; ?>'>
                                            </td>
                                            <td>
                                                <h5 id='label_cajas_texto'>Primer Nombre</h5>
                                                <input type='text' id='caja_formulario_usuario' name='txtpNombre' maxlength='40' value='<?php echo $mostrarUsuario['PNombre']; ?>'>
                                            </td>

                                            <td>
                                                <h5 id='label_cajas_texto'>Primer Apellido</h5>
                                                <input type='text' id='caja_formulario_usuario' name='txtpApellido' maxlength='40' value='<?php echo $mostrarUsuario['PApellido']; ?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id='label_cajas_texto'>Segundo Nombre</h5>
                                                <input type='text' id='caja_formulario_usuario' maxlength='40' name='txtsNombre' value='<?php echo $mostrarUsuario['SNombre']; ?>'>
                                            </td>

                                            <td>
                                                <h5 id='label_cajas_texto'>Segundo Apellido</h5>
                                                <input type='text' id='caja_formulario_usuario' maxlength='40' name='txtsApellido' value='<?php echo $mostrarUsuario['SApellido']; ?>'>
                                            </td>
                                            <td>
                                                <h5 id='label_cajas_texto'>Género</h5>
                                                <select id='combos_formulario_usuario' name='cbSexo'>
                                                    <?php
                                                    if ($mostrarUsuario['Sexo'] == "Femenino") {
                                                        echo "<option value=''>Seleccionar</option>";
                                                        echo "<option selected value='Femenino'>Femenino</option>";
                                                        echo "<option   value='Masculino'>Masculino</option>";
                                                    } else if ($mostrarUsuario['Sexo'] == "Masculino") {
                                                        echo "<option value=''>Seleccionar</option>";
                                                        echo "<option  value='Femenino'>Femenino</option>";
                                                        echo "<option selected  value='Masculino'>Masculino</option>";
                                                    } else {
                                                        echo "<option  value=''>Seleccionar</option>";
                                                        echo "<option  value='Femenino'>Femenino</option>";
                                                        echo "<option  value='Masculino'>Masculino</option>";
                                                    }
                                                    ?>

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id="label_cajas_texto"> Organización </h5>
                                                <?php
                                                echo "
													<select name='cbOrganizacion' class='combos_formulario_usuario' id='cbOrganizacion' required >
													<option> Organización </option>";

                                                $sql = " SELECT d.ID_Organizacion,d.Nombre FROM organizacion d WHERE d.Estatus='A'";
                                                $rs = mysqli_query($conexion, $sql);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($row['Nombre'] == $mostrarUsuario['organizacion']) {
                                                            echo "<option selected value='$row[ID_Organizacion]'> $row[Nombre] </option>";         # code...
                                                        } else
                                                            echo "<option value='$row[ID_Organizacion]'> $row[Nombre] </option>";
                                                    }while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                            <td>
                                                <h5 id='label_cajas_texto'>Cargo</h5>

                                                <?php
                                                echo "
													<select name='cbCargo' id='combos_formulario_usuario'   required >
													<option> Cargo </option>";

                                                $sql = " SELECT d.ID_Cargo,d.Nombre FROM cargo d WHERE d.Estatus='A'";
                                                $rs = mysqli_query($conexion, $sql);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($row['Nombre'] == $mostrarUsuario['cargo']) {
                                                            echo "<option selected value='$row[ID_Cargo]'> $row[Nombre] </option>";
                                                        } else {
                                                            echo "<option   value='$row[ID_Cargo]'> $row[Nombre] </option>";
                                                        }
                                                    } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                            <td>
                                                <h5 id='label_cajas_texto'>Correo</h5>
                                                <input type='text' readonly id='caja_formulario_usuario' maxlength='200' name='txtCorreo' value='<?php echo $mostrarUsuario['Correo']; ?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id="label_cajas_texto"> Departamento </h5>
                                                <?php
                                                echo "
													<select name='txtDpto' class='combos_formulario_usuario' id='txtDpto' required >
													<option> Departamento </option>";

                                                $sql = " SELECT d.ID_Departamento,d.Nombre FROM departamento d WHERE d.Estatus='A'";
                                                $rs = mysqli_query($conexion, $sql);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($row['Nombre'] == $mostrarUsuario['departamento']) {
                                                            echo "<option selected value='$row[ID_Departamento]'> $row[Nombre] </option>";
                                                        } else {
                                                            echo "<option   value='$row[ID_Departamento]'> $row[Nombre] </option>";
                                                        }
                                                    } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                            <td>
                                                <h5 id='label_cajas_texto'>Contraseña</h5>
                                                <input type='password' id='caja_formulario_usuario' name='txtPass' maxlength='10' value='' placeholder="Nueva Contraseña">
                                            </td>
                                            <td>
                                                <h5 id='label_cajas_texto'>Repita Contraseña</h5>
                                                <input type='password' id='caja_formulario_usuario' name='txtPass2' maxlength='10' value='' placeholder="Repita Contraseña">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="color_fondo_cajas">
                                                <h5 id="label_cajas_texto">Seleccionar Imagen</h5>
                                                <input type="file" name="btnImagen" id="btnImage">

                                                <h5><img src="<?php echo $mostrarUsuario['foto']; ?>" id="imagen" width='100' height='100'></h5>
                                            </td>
                                            <td id='color_fondo_cajas'>
                                                <h5 id='label_cajas_texto'>Rol</h5>

                                                <?php
                                                echo "
													<select name='cbRol' id='combos_formulario_usuario'   required >
													<option> Rol </option>";

                                                $sql = " SELECT d.ID_Rol,d.Nombre FROM rol d WHERE d.Estatus='A'";
                                                $rs = mysqli_query($conexion, $sql);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($row['Nombre'] == $mostrarUsuario['rol']) {
                                                            echo "<option selected value='$row[ID_Rol]'> $row[Nombre] </option>";
                                                        } else {
                                                            echo "<option   value='$row[ID_Rol]'> $row[Nombre] </option>";
                                                        }
                                                    } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                            <td>
                                                <h5 id="label_cajas_texto">Pais</h5>
                                                <?php
                                                echo "
														<select name='pai' id='pai'  class='combos_formulario_usuario' required >
														<option>Pais </option>";

                                                $sql = "SELECT * FROM paises";
                                                $rs = mysqli_query($sql, $conexion);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($row['ID_PAIS'] == $mostrarUsuario['ID_Pais']) {
                                                            echo "<option selected value='$row[ID_PAIS]'> $row[PAIS] </option>";
                                                        } else {
                                                            echo "<option  value='$row[ID_PAIS]'> $row[PAIS] </option>";
                                                        }
                                                    } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id="label_cajas_texto">Estado</h5>
                                                <?php
                                                echo "
													<select name='edo' id='edo'  class='combos_formulario_usuario' >
													<option>Estado </option>";

                                                $sql = "SELECT * FROM estados";
                                                $rs = mysqli_query($sql, $conexion);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($row['ID_ESTADO'] == $mostrarUsuario['ID_Estado']) {
                                                            echo "<option selected value='$row[ID_ESTADO]'> $row[ESTADO] </option>";
                                                        } else {
                                                            echo "<option  value='$row[ID_ESTADO]'> $row[ESTADO] </option>";
                                                        }
                                                    } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                            <td>
                                                <h5 id="label_cajas_texto">Municipio</h5>
                                                <?php
                                                echo "
													<select name='mun' id='mun'  class='combos_formulario_usuario' >
													<option>Municipio </option>";

                                                $sql = "SELECT * FROM municipios";
                                                $rs = mysqli_query($sql, $conexion);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($row['ID_MUNICIPIO'] == $mostrarUsuario['ID_Municipio']) {
                                                            echo "<option selected value='$row[ID_MUNICIPIO]'> $row[MUNICIPIO] </option>";
                                                        } else {
                                                            echo "<option  value='$row[ID_MUNICIPIO]'> $row[MUNICIPIO] </option>";
                                                        }
                                                    } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                            <td>
                                                <h5 id="label_cajas_texto">Ciudad</h5>
                                                <?php
                                                echo "
													<select name='ciu' id='ciu'  class='combos_formulario_usuario' >
													<option>Ciudad </option>";

                                                $sql = "SELECT * FROM ciudades";
                                                $rs = mysqli_query($conexion, $sql);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($row['ID_CIUDAD'] == $mostrarUsuario['ID_Ciudad']) {
                                                            echo "<option selected value='$row[ID_CIUDAD]'> $row[CIUDAD] </option>";
                                                        } else {
                                                            echo "<option  value='$row[ID_CIUDAD]'> $row[CIUDAD] </option>";
                                                        }
                                                    } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 id="label_cajas_texto">Parroquia</h5>
                                                <?php
                                                echo "
													<select name='par' id='par'  class='combos_formulario_usuario' >
													<option>Parroquia </option>";

                                                $sql = "SELECT * FROM parroquias";
                                                $rs = mysqli_query($conexion, $sql);
                                                if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                    do {
                                                        if ($row['ID_PARROQUIA'] == $mostrarUsuario['ID_Parroquia']) {
                                                            echo "<option selected value='$row[ID_PARROQUIA]'> $row[PARROQUIA] </option>";
                                                        } else {
                                                            echo "<option  value='$row[ID_PARROQUIA]'> $row[PARROQUIA] </option>";
                                                        }
                                                    } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                                }

                                                echo "</select>";
                                                ?>
                                            </td>
                                            <td colspan="2">
                                                <h5 id="label_cajas_texto">Dirección</h5>
                                                <input type="text" id="caja_formulario_usuario" name="dir" value='<?php echo $mostrarUsuario['Direccion']; ?>' >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan='3'>
                                                <input type='submit' name='btnActualizar' id='btnRegistrar' value='Actualizar'>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
                <td width="70px" class="ancho">
                    <?php
                    if ($mostrarUsuario['Estatus'] == 'A') {
                        echo"<a id='btnActivo' name='btnActivo' href='opcionUsuario/actualizarEstado.php?cedula=$mostrarUsuario[codigo]&estatus=A' title='Activar' style='display: none;'>
							<img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
						</a>";

                        echo"<a id='btnDesactivado' name='btnDesactivado' href='opcionUsuario/actualizarEstado.php?cedula=$mostrarUsuario[codigo]&estatus=D' title='Desactivar'>
							<img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
						</a>";
                    } else {
                        echo"<a id='btnActivo' name='btnActivo' href='opcionUsuario/actualizarEstado.php?cedula=$mostrarUsuario[codigo]&estatus=A' title='Activar'>
							<img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
						</a>";

                        echo"<a id='btnDesactivado' name='btnDesactivado' href='opcionUsuario/actualizarEstado.php?cedula=$mostrarUsuario[codigo]&estatus=D' title='Desactivar' style='display: none;'>
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
