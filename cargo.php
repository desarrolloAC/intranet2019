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

        <div id="contenedor_tabla_cargo">

            <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
            <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
            <script type="text/javascript" src="js/validar.js"></script>


            <table id="tabla_cargo" border="1">
                <thead>
                    <tr id="titulo_columnas">
                        <td width="50" height="50" colspan="2">
                            <a href="#formulario_modal_cargo" id="btnRegistrarUsuario" title="Registar Cargo">
                                <img src="assets/image/menu/botonesTablas/btnNuevo.png">
                            </a>

                            <!--INICIO DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
                            <div id="formulario_modal_cargo" class="contenedor_formulario">

                                <div id="formulario">

                                    <a href="#" class="cerrar">X</a>

                                    <!--INICIO DEL DISEÑO FORMULARIO CREAR USUARIO-->
                                    <div class="contenedor_formulario_cargo">

                                        <form method="POST" action="php/registrarCargo.php" name="form" id="form">
                                            <table id="tabla_formulario_categoria" border="0" cellpadding="7">
                                                <tr id="titulo_columna_formulario">
                                                    <td colspan="2">
                                                        <h1 id="titulo_registro_categoria">Registrar Cargo</h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Código Cargo</h5>
                                                        <input type="text" id="caja_formulario_usuario" name="txtCodigoCargo" maxlength="4" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Nombre Cargo</h5>
                                                        <input type="text" id="caja_formulario_usuario" name="txtNombreCargo" maxlength="60" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php
                                                            $conexion = conectar();
                                                            $sqldpto = mysqli_query($conexion, " SELECT ID_Departamento,Nombre FROM departamento WHERE estatus = 'A' ");
                                                            ?>
                                                        <h5 id="label_cajas_texto">Departamento</h5>
                                                        <select id="combos_formulario_usuario" name="txtDep" required>
                                                            <option value=""></option>
                                                            <?php
                                                                //
                                                                while ($mostdpto = mysqli_fetch_array($sqldpto, MYSQLI_ASSOC)) {
                                                                    echo'<option value=' . $mostdpto['ID_Departamento'] . '>' . $mostdpto['Nombre'] . '</option>';
                                                                }//FIN DEL WHILE
                                                                //
                                                                ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Descripcion Cargo</h5>
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
                                    <!--FIN DEL DISEÑO FORMULARIO CREAR USUARIO-->
                                </div>
                                <!--FIN DIV FORMULARIO-->
                            </div>
                            <!--FIN DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
                        </td>
                        <td colspan="3">
                            <h1>Cargo</h1>
                        </td>
                        <td colspan="5">
                            <form method="POST">
                                <input type="text" name="txtBuscarCargo" id="txtBuscarCargo" placeholder="Buscar Por Nombre" maxlength="40">
                                <button type="submit" name="btnBuscarCargo" id="btnBuscarCargo" title="Buscar un cargo">Buscar</button>
                            </form>
                        </td>
                    </tr>
                    <tr id="titulo_columnas">
                        <td width="300px">
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
                        $conexion = conectar();
                        /* FIN DE LAS VARIABLES DE CONSULTA */

                        if (isset($_POST["txtBuscarCargo"])) {

                            $nombre = $_POST["txtBuscarCargo"];
                            $where = " where nombre like '%" . $nombre . "%'";

                            $consultaCargo = mysqli_query($conexion, " SELECT DISTINCT(car.ID_Cargo) as codigo,
                                                                                      car.nombre as nombre,
                                                                                      car.estatus as estatus,
                                                                                      car.Created,
                                                                                      car.CreatedBy,
                                                                                      car.Updated,
                                                                                      car.UpdatedBy,
                                                                                      car.Descripcion
                                                                                 FROM cargo car
                                                                                 $where
                                                                                 ORDER BY car.ID_Cargo ");
                            if (mysqli_num_rows($consultaCargo) == 0) {
                                $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
                            }
                        } else {
                            $consultaCargo = mysqli_query($conexion, " SELECT DISTINCT(car.ID_Cargo) as codigo,
                                                                                      car.nombre as nombre,
                                                                                      car.estatus as estatus,
                                                                                      car.Created,
                                                                                      car.CreatedBy,
                                                                                      car.Updated,
                                                                                      car.UpdatedBy,
                                                                                      car.Descripcion
                                                                                 FROM cargo car

                                                                               ORDER BY car.ID_Cargo ");
                        }
                        while ($mostrarCargo = mysqli_fetch_array($consultaCargo, MYSQLI_ASSOC)) {
                            ?>
                    <tr id="datos_usuario">
                        <td>
                            <h5>
                                <?php echo $mostrarCargo['codigo']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarCargo['nombre']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        switch ($mostrarCargo['estatus']) {
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
                                <?php echo $mostrarCargo['Descripcion']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                         FROM   usuario
                                                         WHERE  Cedula='".$mostrarCargo['CreatedBy']."' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarCargo['Created']; ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php
                                        $sql = " SELECT CONCAT(PNombre,' ', PApellido) as Nombre
                                                         FROM   usuario
                                                         WHERE  Cedula='".$mostrarCargo['UpdatedBy']."' ";
                                        $rs = mysqli_query($conexion, $sql);
                                        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                                        echo $row['Nombre'];
                                        ?>
                            </h5>
                        </td>

                        <td>
                            <h5>
                                <?php echo $mostrarCargo['Updated']; ?>
                            </h5>
                        </td>


                        <td>
                            <a href='#<?php echo $mostrarCargo[' codigo']; ?>' id="btnEditar">
                                <img src='assets/image/menu/botonesTablas/btnEditar.png'>
                            </a>

                            <div id='<?php echo $mostrarCargo[' codigo']; ?>' class='contenedor_formulario'>

                                <div id='formulario'>

                                    <a href='#' class='cerrar'>X</a>

                                    <div class='contenedor_formulario_categoria'>

                                        <form method='POST' action='php/actualizarCargo.php'>

                                            <table id='tabla_formulario_categoria' border='0' cellpadding='7'>
                                                <tr id='titulo_columna_formulario'>
                                                    <td colspan='2'>
                                                        <h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Código</h5>
                                                        <input type='text' id='caja_formulario_usuario' required name='txtCodigo' maxlength='4' readonly value='<?php echo $mostrarCargo[' codigo'] ?>'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Nombre Del Cargo</h5>
                                                        <input type='text' id='caja_formulario_usuario' required name='txtNombre' maxlength='100' value='<?php echo $mostrarCargo[' nombre'] ?>'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="label_cajas_texto">Departamento</h5>
                                                        <select id="combos_formulario_usuario" name="txtDep" required>
                                                            <option value=""></option>
                                                            <?php

                                                                        $conexion = conectar();
                                                                        $sqldpto = mysqli_query($conexion, "SELECT ID_Departamento,Nombre FROM departamento WHERE estatus = 'A' ");

                                                                        if ($row = mysqli_fetch_array($sqldpto, MYSQLI_ASSOC)) {
                                                                            do {
                                                                                if ($row['Nombre'] == $mostrarUsuario['departamento']) {
                                                                                    echo "<option selected value='".$row['ID_Departamento']."'> ".$row['Nombre']." </option>";

                                                                                } else {
                                                                                    echo "<option value='".$row['ID_Departamento']."'> ".$row['Nombre']." </option>";

                                                                                }

                                                                            } while ($row = mysqli_fetch_array($sqldpto, MYSQLI_ASSOC));
                                                                        }

                                                                    ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id='label_cajas_texto'>Descripción</h5>
                                                        <input type='text' id='caja_formulario_usuario' required name='txtDesc' value='<?php echo $mostrarCargo[' Descripcion']; ?>'>
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
                                    if ($mostrarCargo['estatus'] == 'A') {
                                        echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoCargo.php?codigo=".$mostrarCargo['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar' style='display: none;'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoCargo.php?codigo=".$mostrarCargo['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                    } else {
                                        echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoCargo.php?codigo=".$mostrarCargo['codigo']."&estatus=A&usuario=".$_SESSION['Cedula']."' title='Activar'>
                                                <img src='assets/image/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
                                            </a>";
                                        echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoCargo.php?codigo=".$mostrarCargo['codigo']."&estatus=D&usuario=".$_SESSION['Cedula']."' title='Desactivar' style='display: none;'>
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
