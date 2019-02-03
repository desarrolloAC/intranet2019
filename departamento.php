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




        <div id="contenedor_tabla_departamento">
            <table id="tabla_departamento" border="1">
                <thead>
                    <tr id="titulo_columnas">
                        <td width="50" height="50" colspan="2">
                            <a href="#formulario_modal_departamento" id="btnRegistrarUsuario" title="Registar un Departamento">
                                <img src="assets/image/menu/botonesTablas/btnNuevo.png">
                            </a>

                            <!--INICIO DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
                            <div id="formulario_modal_departamento" class="contenedor_formulario">

                                <div id="formulario">

                                    <a href="#" class="cerrar">X</a>

                                    <!--INICIO DEL DISEÑO FORMULARIO CREAR USUARIO-->
                                    <div class="contenedor_formulario_departamento">

                                        <form method="POST" action="php/registrarDepartamento.php">
                                            <table id="tabla_formulario_departamento" border="0" cellpadding="7">
                                                <tr id="titulo_columna_formulario">
                                                    <td colspan="2">
                                                        <h1 id="titulo_registro_departamento">Registrar Departamento</h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Codigo</h5>
                                                        <input type="text" id="caja_formulario_usuario" name="txtCodigoDepartamento" maxlength="4" required>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <h5 id="label_cajas_texto">Nombre Del Departamento</h5>
                                                        <input type="text" id="caja_formulario_usuario" name="txtNombreDepartamento" maxlength="100" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php
                                                            $conexion = conectar();
                                                            $sqlOrg = mysqli_query($conexion, " SELECT ID_Organizacion,Nombre FROM organizacion WHERE estatus = 'A' ");
                                                            ?>
                                                        <h5 id="label_cajas_texto">Organizacion</h5>
                                                        <select id="combos_formulario_usuario" name="txtOrg" required>
                                                            <option value=""></option>
                                                            <?php
                                                                while ($mostOrg = mysqli_fetch_array($sqlOrg, MYSQLI_ASSOC)) {
                                                                    echo'<option value=' . $mostOrg['ID_Organizacion'] . '>' . $mostOrg['Nombre'] . '</option>';
                                                                }//FIN DEL WHILE
                                                                ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Descripcion Departamento</h5>
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
                        <td colspan="2">
                            <h1>Departamento</h1>
                        </td>
                        <td colspan="6">
                            <form method="POST">
                                <input type="text" name="txtBuscarDepartamento" id="txtBuscarDepartamento" placeholder="Buscar Nombre" maxlength="40">
                                <button type="submit" name="btnBuscarDepartamento" id="btnBuscarDepartamento" title="Buscar un departamento">Buscar</button>
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
                            <h5>Edicion</h5>
                        </td>

                        <td width="300px">
                            <h5>Acción</h5>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        /* include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php'; */

                        $conexion = conectar();
                        /* FIN DE LAS VARIABLES DE CONSULTA */

                        if (isset($_POST["txtBuscarDepartamento"])) {

                            $nombre = $_POST["txtBuscarDepartamento"];
                            $where = " where nombre like '%" . $nombre . "%'";

                            $consultaDepartamento = mysqli_query($conexion, " SELECT DISTINCT(dpto.ID_Departamento) as codigo,
                                                                                      dpto.nombre as nombre,
                                                                                      dpto.estatus as estatus,
                                                                                      dpto.Created,
                                                                                      dpto.CreatedBy,
                                                                                      dpto.Updated,
                                                                                      dpto.UpdatedBy,
                                                                                      dpto.Descripcion
                                                                                 FROM departamento dpto
                                                                                 $where
                                                                                 ORDER BY dpto.ID_Departamento ");
                            if (mysqli_num_rows($consultaDepartamento) == 0) {
                                $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
                            }
                        } else {
                            $consultaDepartamento = mysqli_query($conexion, " SELECT DISTINCT(dpto.ID_Departamento) as codigo,
                                                                                      dpto.nombre as nombre,
                                                                                      dpto.estatus as estatus,
                                                                                      dpto.Created,
                                                                                      dpto.CreatedBy,
                                                                                      dpto.Updated,
                                                                                      dpto.UpdatedBy,
                                                                                      dpto.Descripcion
                                                                                 FROM departamento dpto

                                                                               ORDER BY dpto.ID_Departamento ");
                        }
                        while ($mostrarDepartamento = mysqli_fetch_array($consultaDepartamento, MYSQLI_ASSOC)) {
                            ?>
                    <tr id="datos_usuario">
                        <td>
                            <h5>
                                <?php echo $mostrarDepartamento['codigo']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarDepartamento['nombre']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        switch ($mostrarDepartamento['estatus']) {
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
                                <?php echo $mostrarDepartamento['Descripcion']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                         FROM   usuario
                                                         WHERE  Cedula='$mostrarDepartamento[CreatedBy]' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarDepartamento['Created']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                         FROM   usuario
                                                         WHERE  Cedula='$mostrarDepartamento[UpdatedBy]' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarDepartamento['Updated']; ?>
                            </h5>
                        </td>

                        <td>
                            <a href='#<?php echo $mostrarDepartamento['codigo']; ?>' id="btnEditar">
                                <img src='assets/image/menu/botonesTablas/btnEditar.png'>
                            </a>

                            <div id='<?php echo $mostrarDepartamento['codigo']; ?>' class='contenedor_formulario'>

                                <div id='formulario'>

                                    <a href='#' class='cerrar'>X</a>

                                    <div class='contenedor_formulario_categoria'>

                                        <form method='POST' action='php/actualizarDepartamento.php'>

                                            <table id='tabla_formulario_categoria' border='0' cellpadding='7'>
                                                <tr id='titulo_columna_formulario'>
                                                    <td colspan='2'>
                                                        <h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Código</h5>
                                                        <input type='text' id='caja_formulario_usuario' required name='txtCodigoDepartamento' maxlength='4' readonly value='<?php echo $mostrarDepartamento['codigo'] ?>'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Categoria</h5>
                                                        <input type='text' id='caja_formulario_usuario' required name='txtNombreDepartamento' maxlength='100' value='<?php echo $mostrarDepartamento['nombre'] ?>'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php
                                                                $conexion = conectar();
                                                                $sqlOrg = mysqli_query($conexion, " SELECT ID_Organizacion,Nombre FROM organizacion WHERE estatus = 'A' ");
                                                                ?>
                                                        <h5 id="label_cajas_texto">Organizacion</h5>
                                                        <select id="combos_formulario_usuario" name="txtOrg" required>
                                                            <option value=""></option>
                                                            <?php
                                                                    while ($mostOrg = mysqli_fetch_array($sqlOrg, MYSQLI_ASSOC)) {
                                                                        echo'<option value=' . $mostOrg['ID_Organizacion'] . '>' . $mostOrg['Nombre'] . '</option>';
                                                                    }//FIN DEL WHILE
                                                                    ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Descripción</h5>
                                                        <input type='text' id='caja_formulario_usuario' required name='txtDesc' value='<?php echo $mostrarDepartamento['Descripcion']; ?>'>
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
                                    if ($mostrarDepartamento['estatus'] == 'A') {
                                        echo"<a id='btnActivo' name='btnActivo' href='php/actualizarEstadoDepartamento.php?codigo=".$mostrarDepartamento['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar' style='display: none;'>
                                            <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                        </a>";

                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoDepartamento.php?codigo=".$mostrarDepartamento['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar'>
                                            <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                        </a>";
                                    } else {
                                        echo"<a id='btnActivo' name='btnActivo' href='php/actualizarEstadoDepartamento.php?codigo=".$mostrarDepartamento['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar'>
                                            <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                        </a>";

                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoDepartamento.php?codigo=".$mostrarDepartamento['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar' style='display: none;'>
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
