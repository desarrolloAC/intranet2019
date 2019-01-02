<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadoPublicacion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

//SI EL USUARIO NO ESTA REGISTRADO NO PODRA VISUALIZAR LA PAGINA HASTA NO ESTAR LOGEADO Y LO LLEVARA DIRECTO AL LOGIN
if (!isset($_SESSION['Correo']))
    header("Location: login.php")
    ?>



<!DOCTYPE html>
<html>

<head>
    <title>Intranet Alkes</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--INICIO LLAMADA DE ARCHIVOS CSS-->
    <link rel="stylesheet" type="text/css" href="estructura/css/estructura.css">
    <link rel="stylesheet" type="text/css" href="estructura/css/tablaMenuVertical.css">
    <link rel="stylesheet" type="text/css" href="css/opcionCargo.css">
    <link rel="stylesheet" type="text/css" href="css/opcionCategoria.css">
    <link rel="stylesheet" type="text/css" href="css/opcionDepartamento.css">
    <link rel="stylesheet" type="text/css" href="css/opcionDirectorio.css">
    <link rel="stylesheet" type="text/css" href="css/opcionOrganizacion.css">
    <link rel="stylesheet" type="text/css" href="css/opcionPublicacion.css">
    <link rel="stylesheet" type="text/css" href="css/opcionRol.css">
    <link rel="stylesheet" type="text/css" href="css/opcionSubcategoria.css">
    <link rel="stylesheet" type="text/css" href="css/opcionUsuario.css">
    <link rel="stylesheet" type="text/css" href="css/categoriasParaPublicar.css">

    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/avanceInformativo.css">
    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/boletinInformativo.css">
    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/comunicado.css">
    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/invitacionGeneral.css">
    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/nuevoIngresoAscenso.css">
    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/logro.css">
    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/postulate.css">
    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/cumpleMes.css">
    <!--<link rel="stylesheet" type="text/css" href="formularioPublicaciones/nacimiento.css">-->
    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/promocionEscolar.css">
    <link rel="stylesheet" type="text/css" href="formularioPublicaciones/condolencia.css">
    <!--FIN DE LLAMADA ARCHIVOS CSS-->

    <!--INICIO LLAMADA ARCHIVOS JS-->
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="js/listaMenu.js"></script>
    <script type="text/javascript" src="js/selectdependientes.js"></script>
    <script type="text/javascript" src="js/efectoBandeja.js"></script>
    <script type="text/javascript" src="js/setInterval.js"></script>

    <script src="js/efectoCategoriasParaPublicar.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/previsualizarImagen.js" type="text/javascript" charset="utf-8"></script>

    <script src="js/efectoCategoriasParaPublicar.js" type="text/javascript" charset="utf-8"></script>

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
            animation: fondo 5s infinite;
        }


        @keyframes fondo {
            0% {
                background-color: rgb(69, 69, 69);
                transition: 1s ease-in-out;
            }

            100% {
                background-color: rgb(241, 129, 3);
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

        <!--*******************************************************************************-->

        <!--**************INICIO DE LA OPCION PUBLICAR**************-->

        <!--*******************************************************************************-->

        <div id='contenedor_tabla_publicacion'>
            <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/tablaPublicacion.php'; ?>
        </div>



        <div id='contenedor_tabla_pcategorias'>
            <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/tablaCategoriasParaPublicar.php'; ?>
        </div>

        <!--*******************************************************************************-->

        <!--**************FIN DE LA OPCION PUBLICAR**************-->

        <!--*******************************************************************************-->



        <!--*******************************************************************************-->

        <!--**************INICIO DE LA OPCION CATEGORIA**************-->

        <!--*******************************************************************************-->

        <div id='contenedor_tabla_categoria'>
            <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/tablaCategoria.php'; ?>
        </div>

        <!--*******************************************************************************-->

        <!--**************FIN DE LA OPCION CATEGORIA**************-->

        <!--*******************************************************************************-->





        <!--*******************************************************************************-->

        <!--**************INICIO DE LA OPCION SUBCATEGORIA**************-->

        <!--*******************************************************************************-->

        <div id='contenedor_tabla_subcategoria'>
            <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/tablaSubcategoria.php'; ?>
        </div>

        <!--*******************************************************************************-->

        <!--**************FIN DE LA OPCION SUBCATEGORIA**************-->

        <!--*******************************************************************************-->



        <!--*******************************************************************************-->

        <!--**************INICIO DE LA OPCION ROL**************-->

        <!--*******************************************************************************-->

        <div id='contenedor_tabla_rol'>
            <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/tablaRol.php'; ?>
        </div>

        <!--*******************************************************************************-->

        <!--**************FIN DE LA OPCION ROL**************-->

        <!--*******************************************************************************-->



        <!--*******************************************************************************-->

        <!--**************INICIO DE LA OPCION USUARIO**************-->

        <!--*******************************************************************************-->

        <div id="contenedor_tabla_usuario">
            <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/tablaUsuario.php'; ?>
        </div>

        <!--*******************************************************************************-->

        <!--**************FIN DE LA OPCION USUARIO**************-->

        <!--*******************************************************************************-->



        <!--*******************************************************************************-->

        <!--**************INICIO DE LA OPCION ORGANIZACION**************-->

        <!--*******************************************************************************-->

        <div id="contenedor_tabla_organizacion">
            <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/tablaOrganizacion.php'; ?>
        </div>

        <!--*******************************************************************************-->

        <!--**************FIN DE LA OPCION ORGANIZACION**************-->

        <!--*******************************************************************************-->



        <!--*******************************************************************************-->

        <!--**************INICIO DE LA OPCION DEPARTAMENTO**************-->

        <!--*******************************************************************************-->

        <div id="contenedor_tabla_departamento">
            <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/tablaDepartamento.php'; ?>
        </div>

        <!--*******************************************************************************-->

        <!--**************FIN DE LA OPCION DEPARTAMENTO**************-->

        <!--*******************************************************************************-->



        <!--*******************************************************************************-->

        <!--**************INICIO DE LA OPCION CARGO**************-->

        <!--*******************************************************************************-->

        <div id="contenedor_tabla_cargo">
            <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/tablaCargo.php'; ?>
        </div>

        <!--*******************************************************************************-->

        <!--**************FIN DE LA OPCION DEPARTAMENTO**************-->

        <!--*******************************************************************************-->

    </div>
    <!--FIN DEL CONTENEDOR CONTENIDOS-->


    <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/estructura/footer.php'; ?>
</body>

</html>
