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



    <!--INICIO CONTENEDOR CONTENIDOS-->

    <div class="contenedorContenidos">


        <div id="contenedor_tabla_organizacion">
            <table id="tabla_organizacion" border="1">
                <thead>
                    <tr id="titulo_columnas">
                        <td width="50" height="50" colspan="2">
                            <a href="#formulario_modal_organizacion" id="btnRegistrarUsuario" title="Registar un usuario">
                                <img src="assets/image/menu/botonesTablas/btnNuevo.png">
                            </a>

                            <!--INICIO DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
                            <div id="formulario_modal_organizacion" class="contenedor_formulario">

                                <div id="formulario">

                                    <a href="#" class="cerrar">X</a>

                                    <!--INICIO DEL DISEÑO FORMULARIO CREAR USUARIO-->
                                    <div class="contenedor_formulario_organizacion">

                                        <form method="POST" action="php/organizacion/registrarOrganizacion.php">
                                            <table id="tabla_formulario_organizacion" border="0" cellpadding="7">
                                                <tr id="titulo_columna_formulario">
                                                    <td colspan="2">
                                                        <h1 id="titulo_registro_organizacion">Registrar Organización </h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Código</h5>
                                                        <input type="text" id="caja_formulario_usuario" name="txtCodigoOrganizacion" maxlength="4" required>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5 id="label_cajas_texto">Nombre De La Organización </h5>
                                                        <input type="text" id="caja_formulario_usuario" name="txtNombreOrganizacion" maxlength="100" required>
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
                        <td colspan="2">
                            <h1>Organizacion</h1>
                        </td>
                        <td colspan="5">
                            <form method="POST">
                                <input type="text" name="txtBuscarOrganizacion" id="txtBuscarOrganizacion" placeholder="Buscar Nombre" maxlength="40">
                                <button type="submit" name="btnBuscarOrganizacion" id="btnBuscarOrganizacion" title="Buscar una organizacion">Buscar</button>
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

                        <td width="400px">
                            <h5>Edición</h5>
                        </td>

                        <td width="400px">
                            <h5>Acción</h5>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conexion = conectar();


                        if (isset($_POST["txtBuscarOrganizacion"])) {

                            $nombre = $_POST["txtBuscarOrganizacion"];
                            $where = " where nombre like '%" . $nombre . "%'";

                            $consultaOrganizacion = mysqli_query($conexion, " SELECT DISTINCT(org.ID_Organizacion) as codigo,
                                                                                      org.nombre as nombre,
                                                                                      org.estatus as estatus,
                                                                                      org.Created,
                                                                                      org.CreatedBy,
                                                                                      org.Updated,
                                                                                      org.UpdatedBy
                                                                                 FROM organizacion org
                                                                                 $where
                                                                                 ORDER BY org.ID_Organizacion ");

                            if (mysqli_num_rows($consultaOrganizacion) == 0) {

                                $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
                            }
                        } else {
                            $consultaOrganizacion = mysqli_query($conexion, " SELECT DISTINCT(org.ID_Organizacion) as codigo,
                                                                                      org.nombre as nombre,
                                                                                      org.estatus as estatus,
                                                                                      org.Created,
                                                                                      org.CreatedBy,
                                                                                      org.Updated,
                                                                                      org.UpdatedBy
                                                                                 FROM organizacion org
                                                                               ORDER BY org.ID_Organizacion ");
                        }

                        while ($mostrarOrganizacion = mysqli_fetch_array($consultaOrganizacion, MYSQLI_ASSOC)) {
                            ?>
                    <tr id="datos_usuario">
                        <td>
                            <h5>
                                <?php echo $mostrarOrganizacion['codigo']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarOrganizacion['nombre']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        switch ($mostrarOrganizacion['estatus']) {
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
                                <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                         FROM   usuario
                                                         WHERE  Cedula='$mostrarOrganizacion[CreatedBy]' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarOrganizacion['Created']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre FROM usuario WHERE  Cedula='$mostrarOrganizacion[UpdatedBy]' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarOrganizacion['Updated']; ?>
                            </h5>
                        </td>

                        <td>
                            <a href='#<?php echo $mostrarOrganizacion['codigo']; ?>' id="btnEditar">
                                <img src='assets/image/menu/botonesTablas/btnEditar.png'>
                            </a>

                            <div id='<?php echo $mostrarOrganizacion['codigo']; ?>' class='contenedor_formulario'>

                                <div id='formulario'>

                                    <a href='#' class='cerrar'>X</a>

                                    <div class='contenedor_formulario_categoria'>

                                        <form method='POST' action='php/organizacion/actualizarOrganizacion.php'>

                                            <table id='tabla_formulario_categoria' border='0' cellpadding='7'>
                                                <tr id='titulo_columna_formulario'>
                                                    <td colspan='2'>
                                                        <h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Código</h5>
                                                        <input type='text' id='caja_formulario_usuario' required name='txtCodigoOrganizacion' maxlength='4' readonly value='<?php echo $mostrarOrganizacion['codigo'] ?>'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Nombre Organización</h5>
                                                        <input type='text' id='caja_formulario_usuario' required name='txtNombreOrganizacion' maxlength='100' value='<?php echo $mostrarOrganizacion['nombre'] ?>'>
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
                                    if ($mostrarOrganizacion['estatus'] == 'A') {
                                        echo"<a id='btnActivo' name='btnActivo' href='php/organizacion/actualizarEstadoOrganizacion.php?codigo=".$mostrarOrganizacion['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar' style='display: none;'>
                                            <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                        </a>";

                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/organizacion/actualizarEstadoOrganizacion.php?codigo=".$mostrarOrganizacion['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar'>
                                            <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                        </a>";
                                    } else {
                                        echo"<a id='btnActivo' name='btnActivo' href='php/organizacion/actualizarEstadoOrganizacion.php?codigo=".$mostrarOrganizacion['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar'>
                                            <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                        </a>";

                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/organizacion/actualizarEstadoOrganizacion.php?codigo=".$mostrarOrganizacion['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar' style='display: none;'>
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

        </div>


    </div>
    <!--FIN DEL CONTENEDOR CONTENIDOS-->


</body>

</html>
