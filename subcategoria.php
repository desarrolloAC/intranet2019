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

    <script src="js/previsualizarImagen.js" type="text/javascript" charset="utf-8"></script>


    <script src="js/lib/vue.js"></script>
    <script src="js/lib/vue-resource.min.js"></script>
    <!--FIN LLAMADA ARCHIVOS JS-->



    <style type="text/css">
        div#contenedorNombreUsuario {
            position: relative;
            top: 2.7cm;
            left: -0.4cm;
            float: right;
        }

        div#bandeja {
            z-index: 2;
            position: relative;
            left: -18cm;
            top: 1cm;
            width: 7cm;
            height: 1cm;
            float: right;
            padding: 0.2cm;
        }

        div#bandeja {
            background-color: rgb(69, 69, 69);
            transition: 1s ease-in-out;
            cursor: pointer;
            border-radius: 1rem;
        }

        a#abrirBandeja {
            z-index: 2;
            position: relative;
            top: 0.2cm;
            text-decoration: none;
            color: rgb(255, 255, 255);
            font-weight: bold;
            margin-left: 0.5cm;
        }

        img#imagenBandeja {
            z-index: 2;
            position: relative;
            float: left;
        }

        div#contenidoBandeja {
            z-index: 2;
            position: relative;
            top: -1.2cm;
            left: -0.2cm;
            width: 10cm;
            height: 7cm;
            background-color: rgb(69, 69, 69);
            border-radius: 1rem;
            overflow: auto;
        }

        div#contenedorNotificaciones {
            position: relative;
            width: 9.6cm;
            height: 2cm;
            margin-bottom: 0.5cm;
            text-align: center;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            border-color: rgb(255, 255, 255);
            transition: 1s ease-in-out;
            font-weight: bold;
            animation: fondo 5s infinite;
        }

        a#enlaceNotificaciones {
            position: relative;
            top: 0.8cm;
            text-decoration: none;
            color: rgb(255, 255, 255);
        }


        @keyframes fondo {
            0% {
                background-color: rgb(69, 69, 69);
                transition: 1s ease-in-out;
            }

            100% {
                background-color: rgb(167, 166, 166);
                color: rgb(69, 69, 69);
            }
        }

        div#nNotificacion {
            z-index: 3;
            position: relative;
            top: -1.4cm;
            left: 6cm;
            color: rgb(255, 255, 255);
            background-color: rgb(69, 69, 69);
            width: 0.7cm;
            height: 0.7cm;
            border-radius: 2rem;
        }

        h5#rNumero {
            position: relative;
            top: 0.1cm;
            left: 0cm;
            font-size: 20px;
            text-align: center;
        }

    </style>



    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('submit', '#formularioChat', function() {
                //Obtenemos datos formulario.
                var data = $(this).serialize();

                //AJAX.
                $.ajax({
                    type: 'POST',
                    url: 'mensajes/mensaje.php',
                    data: data,
                    success: function(data) {
                        $('#respuesta').html(data).fadeIn();
                    }
                });
                return false;
            });

        }); //Fin document.

    </script>
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

                                        <form method="POST" action="php/registrarSubCategoria.php">
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

                            <a href='#<?php echo $mostrarSubCategoria[' codigo']; ?>' id="btnEditar">
                                <img src='assets/image/menu/botonesTablas/btnEditar.png'>
                            </a>

                            <div id='<?php echo $mostrarSubCategoria[' codigo']; ?>' class='contenedor_formulario'>

                                <div id='formulario'>

                                    <a href='#' class='cerrar'>X</a>

                                    <div class='contenedor_formulario_subcategoria'>

                                        <form method='POST' action='php/actualizarSubCategoria.php'>

                                            <table id='tabla_formulario_subcategoria' border='0' cellpadding='7'>
                                                <tr id='titulo_columna_formulario'>
                                                    <td colspan='2'>
                                                        <h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Código</h5>
                                                        <input type='text' id='caja_formulario_usuario' name='txtCodigoSubCategoria' maxlength='4' readonly value='<?php echo $mostrarSubCategoria[' codigo']; ?>'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>SubCategoría</h5>
                                                        <input type='text' id='caja_formulario_usuario' name='txtNombreSubCategoria' maxlength='60' value='<?php echo $mostrarSubCategoria[' nombre']; ?>'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php
                                                                $sqlCate = mysqli_query($conexion, " SELECT * FROM categoria WHERE estatus = 'A' ");
                                                                ?>
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
                                                        <input type='text' id='caja_formulario_usuario' name='txtDesc' value='<?php echo $mostrarSubCategoria[' Descripcion']; ?>'>
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
                                        echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoSubCategoria.php?codigo=".$mostrarSubCategoria['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar' style='display: none;'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoSubCategoria.php?codigo=".$mostrarSubCategoria['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                    } else {
                                        echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoSubCategoria.php?codigo=".$mostrarSubCategoria['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoSubCategoria.php?codigo=".$mostrarSubCategoria['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar' style='display: none;'>
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
