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


        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/avanceInformativo.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/boletinInformativo.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/comunicado.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/invitacionGeneral.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/nuevoIngresoAscenso.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/logro.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/postulate.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/cumpleMes.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/nacimiento.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/promocionEscolar.css">
        <link rel="stylesheet" type="text/css" href="css/categoriaparapublicar/condolencia.css">
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

            <div id='contenedor_tabla_pcategorias'>

                <!--INICIO DE LA TABLA CATEGORIAS PARA PUBLICAR-->
                <table border="0" width="100%">
                    <tr>
                        <td>
                            <div id="flip">Capsula Informativa</div>
                            <div id="panel">
                                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                                <a id="botones" href="#formularioAvanceInformativo">Avance Informativo</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/avanceInformativo.php'; ?>
                                <a id="botones" href="#formularioBoletinInformativo">Boletin Informativo</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/boletinInformativo.php'; ?>
                                <a id="botones" href="#formularioComunicado">Comunicado</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/comunicado.php'; ?>
                                <a id="botones" href="#formularioCondolencia">Condolencia</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/condolencia.php'; ?>
                            </div>
                        </td>
                        <td>
                            <div id="flip1">Invitaciones</div>
                            <div id="panel1">
                                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                                <a id="botones" href="#formularioInvitacionGeneral">Generales</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/invitacionGeneral.php'; ?>
                                <a id="botones" href="#">Flayers</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id="flip2">Talento Humano</div>
                            <div id="panel2">
                                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                                <a id="botones" href="#formularioNuevoIngresoAscenso">Nuevo Ingreso</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/nuevoIngresoAscenso.php'; ?>
                                <a id="botones" href="#formularioNuevoAscenso">Ascenso</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/nuevoAscenso.php'; ?>
                                <a id="botones" href="#formularioLogro">Logro Extracurricular</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/logro.php'; ?>
                                <a id="botones" href="#formularioPostulate">Postulate</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/postulate.php'; ?>
                            </div>
                        </td>
                        <td>
                            <div id="flip3">Celebraciones</div>
                            <div id="panel3">
                                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                                <a id="botones" href="#formularioCumpleMes">Cumpleañero Del Mes</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/cumpleMes.php'; ?>
                                <a id="botones" href="#formularioNacimiento">Nacimiento</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/nacimiento.php'; ?>
                                <a id="botones" href="#formularioPromocionEscolar">Promocion Escolar</a>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/promocionEscolar.php'; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id="flip4">Infografia</div>
                            <div id="panel4">
                                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                                <a id="botones" href="#">Tips</a>
                                <a id="botones" href="#">Recomendaciones</a>
                            </div>
                        </td>
                        <td>
                            <div id="flip5">Folleto Informativo</div>
                            <div id="panel5">
                                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                                <a id="botones" href="#">Subir Folleto</a>
                            </div>
                        </td>
                    </tr>
                </table>
                <!--FIN DE LA TABLA CATEGORIAS PARA PUBLICAR-->
            </div>

        </div>
        <!--FIN DEL CONTENEDOR CONTENIDOS-->


    </body>

</html>
