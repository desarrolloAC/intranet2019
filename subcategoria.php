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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


        <div id='contenedor_tabla_subcategoria'>
            <table id="tabla_subcategoria" border="1">
                <thead>
                    <tr id="titulo_columnas">
                        <td height="50" colspan="2">
                            <a href="#formulario_modal_subcategoria" id="btnRegistrarUsuario" title="Registar Subcategoría">
                                <img src="assets/image/menu/botonesTablas/btnNuevo.png">
                            </a>

                            <!--INICIO DEL CONTENEDOR FORMULARIO SUBCATEGORÍA MODAL-->
                            <div id="formulario_modal_subcategoria" class="contenedor_formulario">

                                <div id="formulario">

                                    <a href="#" class="cerrar">X</a>

                                    <!--INICIO DEL DISEÑO FORMULARIO CREAR SUBCATEGORÍA-->
                                    <div class="contenedor_formulario_subcategoria">

                                        <form method="POST" action="php/subcategoria/registrarSubCategoria.php">
                                            <table id="tabla_formulario_subcategoria" border="0" cellpadding="7">
                                                <tr id="titulo_columna_formulario">
                                                    <td colspan="2">
                                                        <h1 id="titulo_registro_subcategoria">Registrar Subcategoría</h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Código</h5>
                                                        <input type="text" id="caja_formulario_usuario" name="txtCodigoSubCategoria" maxlength="4" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Nombre De La SubCategoría</h5>
                                                        <input type="text" id="caja_formulario_usuario" name="txtNombreSubCategoria" maxlength="60" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php
                                                            $conexion = conectar();

                                                            $sqlSubCate = mysqli_query($conexion, " SELECT * FROM categoria WHERE estatus = 'A' ");
                                                            ?>
                                                        <h5 id="label_cajas_texto">Categoría</h5>
                                                        <select id="combos_formulario_usuario" name="txtCodigoCategoria">
                                                            <option value=""> </option>
                                                            <?php
                                                                while ($mostrarSubCategoria = mysqli_fetch_array($sqlSubCate, MYSQLI_ASSOC)) {
                                                                    echo'<option value=' . $mostrarSubCategoria['ID_Categoria'] . '>' . $mostrarSubCategoria['Nombre'] . '</option>';
                                                                }//FIN DEL WHILE
                                                                ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Descripcion SubCategoría</h5>
                                                        <input type="text" id="caja_formulario_usuario" id="caja_formulario_usuario" name="txtDesc" required>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="submit" name="btnRegistrar" id="btnRegistrar" value="Registrar">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                    <!--FIN DEL DISEÑO FORMULARIO CREAR SUBCATEGORÍA-->
                                </div>
                                <!--FIN DIV FORMULARIO-->
                            </div>
                            <!--FIN DEL CONTENEDOR FORMULARIO SUBCATEGORÍA MODAL-->
                        </td>
                        <td colspan="2">
                            <h1>SubCategoria</h1>
                        </td>
                        <td colspan="6">
                            <form method="POST">
                                <input type="text" name="txtBuscarSubCategoria" id="txtBuscarSubCategoria" placeholder="Buscar Por Nombre" maxlength="40">

                                <button type="submit" name="btnBuscarSubCategoria" id="btnBuscarSubCategoria" title="Buscar una Subcategoria">Buscar</button>
                            </form>
                        </td>
                    </tr>
                    <tr id="titulo_columnas">
                        <td width="600px">
                            <h5>Código</h5>
                        </td>
                        <td width="600px">
                            <h5>Nombre</h5>
                        </td>
                        <td width="600px">
                            <h5>Estatus</h5>
                        </td>
                        <td width="1200px">
                            <h5>Descripción</h5>
                        </td>
                        <td width="600px">
                            <h5>Creada Por</h5>
                        </td>
                        <td width="800px">
                            <h5>Fecha Creación</h5>
                        </td>
                        <td width="600px">
                            <h5>Actualizada Por</h5>
                        </td>
                        <td width="800px">
                            <h5>Fecha Actualización</h5>
                        </td>
                        <td width="300px">
                            <h5>Edición</h5>
                        </td>
                        <td width="300px" colspan="2">
                            <h5>Acción</h5>
                        </td>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        /* FIN DE LAS VARIABLES DE CONSULTA */

                        if (isset($_POST["txtBuscarSubCategoria"])) {

                            $nombre = $_POST["txtBuscarSubCategoria"];
                            $where = " where nombre like '%" . $nombre . "%'";

                            $consultaSubCategoria = mysqli_query($conexion, " SELECT DISTINCT(cat.ID_Subcategoria) as codigo,
                                                                              cat.ID_Categoria,
                                                                              cat.nombre as nombre,
                                                                              cat.estatus as estatus,
                                                                              cat.Created,
                                                                              cat.CreatedBy,
                                                                              cat.Updated,
                                                                              cat.UpdatedBy,
                                                                              cat.Descripcion
                                                                         FROM subcategoria cat
                                                                         $where
                                                                         ORDER BY cat.ID_SubCategoria ");
                            if (mysqli_num_rows($consultaSubCategoria) == 0) {
                                $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
                            }
                        } else {
                            $consultaSubCategoria = mysqli_query($conexion, " SELECT DISTINCT(cat.ID_Subcategoria) as codigo,
                                                                              cat.ID_Categoria,
                                                                              cat.nombre as nombre,
                                                                              cat.estatus as estatus,
                                                                              cat.Created,
                                                                              cat.CreatedBy,
                                                                              cat.Updated,
                                                                              cat.UpdatedBy,
                                                                              cat.Descripcion
                                                                         FROM subcategoria cat

                                                                       ORDER BY cat.ID_Subcategoria ");
                        }
                        while ($mostrarSubCategoria = mysqli_fetch_array($consultaSubCategoria, MYSQLI_ASSOC)) {
                            ?>
                    <tr id="datos_usuario">
                        <td>
                            <h5>
                                <?php echo $mostrarSubCategoria['codigo']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarSubCategoria['nombre']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        switch ($mostrarSubCategoria['estatus']) {
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
                                <?php echo $mostrarSubCategoria['Descripcion']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                     FROM   usuario
                                                     WHERE  Cedula='$mostrarSubCategoria[CreatedBy]' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarSubCategoria['Created']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                     FROM   usuario
                                                     WHERE  Cedula='$mostrarSubCategoria[UpdatedBy]' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarSubCategoria['Updated']; ?>
                            </h5>
                        </td>

                        <td>

                            <a href='#<?php echo $mostrarSubCategoria['codigo']; ?>' id="btnEditar">
                                <img src='assets/image/menu/botonesTablas/btnEditar.png'>
                            </a>

                            <div id='<?php echo $mostrarSubCategoria['codigo']; ?>' class='contenedor_formulario'>

                                <div id='formulario'>

                                    <a href='#' class='cerrar'>X</a>

                                    <div class='contenedor_formulario_subcategoria'>

                                        <form method='POST' action='php/subcategoria/actualizarSubCategoria.php'>

                                            <table id='tabla_formulario_subcategoria' border='0' cellpadding='7'>
                                                <tr id='titulo_columna_formulario'>
                                                    <td colspan='2'>
                                                        <h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Código</h5>
                                                        <input type='text' id='caja_formulario_usuario' name='txtCodigoSubCategoria' maxlength='4' readonly value='<?php echo $mostrarSubCategoria['codigo']; ?>'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>SubCategoría</h5>
                                                        <input type='text' id='caja_formulario_usuario' name='txtNombreSubCategoria' maxlength='60' value='<?php echo $mostrarSubCategoria['nombre']; ?>'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php $sqlCate = mysqli_query($conexion, "SELECT * FROM categoria WHERE estatus = 'A' "); ?>
                                                        <h5 id="label_cajas_texto">Categoría</h5>
                                                        <select id="combos_formulario_usuario" name="txtCodigoCategoria">
                                                            <option value=""> </option>
                                                            <?php
                                                                    while ($sCategoria = mysqli_fetch_array($sqlCate, MYSQLI_ASSOC)) {
                                                                        if ($sCategoria['ID_Categoria'] == $mostrarSubCategoria['ID_Categoria'])
                                                                            echo"<option value='$sCategoria[ID_Categoria]' selected >$sCategoria[Nombre]</option>";
                                                                        else
                                                                            echo"<option value='$sCategoria[ID_Categoria]'>$sCategoria[Nombre]</option>";
                                                                    }//FIN DEL WHILE
                                                                    ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Descripción</h5>
                                                        <input type='text' id='caja_formulario_usuario' name='txtDesc' value='<?php echo $mostrarSubCategoria['Descripcion']; ?>'>
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
                                    if ($mostrarSubCategoria['estatus'] == 'A') {
                                        echo"<a id='btnActivo'      name='btnActivo'      href='php/subcategoria/actualizarEstadoSubCategoria.php?codigo=".$mostrarSubCategoria['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar' style='display: none;'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/subcategoria/actualizarEstadoSubCategoria.php?codigo=".$mostrarSubCategoria['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                    } else {
                                        echo"<a id='btnActivo'      name='btnActivo'      href='php/subcategoria/actualizarEstadoSubCategoria.php?codigo=".$mostrarSubCategoria['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/subcategoria/actualizarEstadoSubCategoria.php?codigo=".$mostrarSubCategoria['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar' style='display: none;'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                    }
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
