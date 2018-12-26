<?php

	include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';

	$conexion = conectar();

	$n = $_GET['n'];

$sql = "SELECT pub.ID_Publicacion AS n,
                            pub.ID_Organizacion AS org,
                            pub.ID_Subcategoria,
                            cat.ID_Categoria,
                            cat.Nombre AS Categoria,
                            subc.Nombre AS SubCategoria,
                            pub.Estatus,
                            pub.Titulo AS Titulo,
                            pub.Foto,
                            pub.Contenido,
                            pub.CreatedBy,
                            pub.F_Publicacion
                    FROM    publicacion pub INNER JOIN subcategoria subc    ON pub.ID_Subcategoria  = subc.ID_Subcategoria
                                        INNER JOIN categoria cat        ON cat.ID_Categoria     = subc.ID_Categoria
                    WHERE cat.ID_Categoria = 'CAIF' AND pub.ID_Subcategoria='AVIF' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = $n;";

	$result = mysql_query($sql,$conexion);

?>

<!DOCTYPE html>

<html>

<head>
    <title>Intranet Alkes Corp, S.A</title>
    <meta name="viewport" content="width=device-width,device-height initial-scale=1.5"/>
    <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="css/index/indexNoticiaCapsulaInformativa.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/detalle/detalleNoticiaAVIF.css" media="screen">

    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all"/>

    <script src="js/lib/vue.js"></script>
    <script src="js/lib/vue-resource.min.js"></script>

</head>

<body>

<!--INICIO CONTENEDOR TOP-->
<header class="contenedorTop">

    <a href="index.html">
        <img id="logoAlkes" src="imagenes/top/logoAlkes.png">
    </a>
    <a href="login.php">
        <img id="logoUsuario" src="imagenes/top/usuario.png">
    </a>

    <ul class="menu">
        <!--OPCION ACTUALIDAD-->
        <li>
            <a href="#" title="">Actualidad</a>

            <!--SUBMENU DE ACTUALIDAD-->
            <ul>
                <li>
                    <a id="upa"   href="#" title="">Últimos proyectos y acuerdos</a>
                </li>
                <li>
                    <a id="upa"   href="#" title="">Próximos eventos</a>
                </li>
                <li>
                    <a href="#" title="">Boletín de noticias</a>
                </li>
            </ul>
            <!--FIN DEL SUBMENU ACTUALIDAD-->

        </li>
        <!--FIN DE LA OPCION ACTUALIDAD-->

        <!--OPCION INFORMACION-->
        <li>
            <a href="#" title="">Informacion</a>

            <!--SUBMENU DE INFORMACION-->
            <ul>
                <li>
                    <a href="#" title="">Mensajes de la CEO</a>
                </li>
                <li>
                    <a href="#" title="">Misión y Visión Corporativa</a>
                </li>
                <li>
                    <a href="#" title="">Directorio de la organización</a>
                </li>
                <li>
                    <a href="#" title="">Políticas y procedimientos</a>
                </li>
                <li>
                    <a href="#" title="">Resultados generales</a>
                </li>
            </ul>
            <!--FIN DEL SUBMENU INFORMACION-->

        </li>
        <!--FIN DE LA OPCION INFORMACION-->

        <!--OPCION INFORMACION PARA EL TRABAJO-->
        <li>
            <a href="#" title="">Informacion para el trabajo</a>

            <!--SUBMENU DE INFORMACION PARA EL TRABAJO-->
            <ul>
                <li>
                    <a href="#" title="">Acceso a documentos, estudios, informes</a>
                </li>
                <li>
                    <a href="#" title="">Manuales y procedimientos de trabajo</a>
                </li>
                <li>
                    <a href="#" title="">Directorio de la organización</a>
                </li>
                <li>
                    <a href="#" title="">Políticas y procedimientos</a>
                </li>
                <li>
                    <a href="#" title="">Informacion de Documentos de SIG</a>
                       <ul>
                           <li>
                               <a href="#" title="">Norma ISO  </a>
                                <ul>
                                    <li><a href="visorpdf.php?id=iso0" target="_blank">Norma BASC 4:2012</a></li>
                                    <li><a href="visorpdf.php?id=iso1" target="_blank">Norma ISO 22000:2005 </a></li>
                                    <li><a href="visorpdf.php?id=iso2" target="_blank">Norma ISO 19011:2011</a></li>
                                    <li><a href="visorpdf.php?id=iso3" target="_blank">Norma ISO 9001:2015</a></li>
                                    <li><a href="visorpdf.php?id=iso4" target="_blank">Norma ISO 9001:2008 </a></li>
                                    <li><a href="visorpdf.php?id=iso5" target="_blank">Norma ISO 9004:2010</a></li>
                                </ul>
                           </li>
                       </ul>
                </li>
            </ul>
            <!--FIN DEL SUBMENU INFORMACION PARA EL TRABAJO-->

        </li>
        <!--FIN DE LA OPCION INFORMACION PARA EL TRABAJO-->

        <li>
            <a href="directorio.php">Directorio</a>
        </li>


        <li>
            <a href="#" title="">Descargas</a>

            <ul>
                <li>
                    <a href="#" title="">Gestión Humana</a>

                    <ul>

                       <li>
                        <a href="php/Descargas.php?id=1" target="_blank">Formato Unico</a>
                       </li>

                     </ul>
                    <a href="#" title="">Mercadeo</a>
                    <a href="#" title="">Cuentas por Pagar</a>

                </li>

            </ul>

        </li>

        <li>
            <a href="../alkes/index.html">Reservar Sala De Reunion</a>
        </li>

    </ul>

</header>
<!--FIN CONTENEDOR TOP-->





<!--INICIO CONTENEDOR DE CONTENIDOS-->
<main class="contenedorContenido">

    <div id="contenidoAVIF">
        <div id="contenidoPlantilla">
            <img id="imagen-detalle" :src="imagen" alt="Detalle de la noticia">
            <h1 id='titulo'>{{ titulo }}</h1>
            <h5 id="org">{{ org }}</h5>
            <textarea id="contenido" readonly>{{ contenido }}</textarea>
        </div>
    </div>

    <script type="text/javascript">

        function obtenerValorParametro(sParametroNombre) {

            var sPaginaURL = window.location.search.substring(1);
            var sURLVariables = sPaginaURL.split('&');

            for (var i = 0; i < sURLVariables.length; i++) {
                var sParametro = sURLVariables[i].split('=');
                if (sParametro[0] == sParametroNombre) {
                    return sParametro[1];
                }
            }

            return '';
        }

        const detatalleUrl = 'php/detalleNoticia/detalleNoticia.php?n='+obtenerValorParametro('n');
        console.log(detatalleUrl);

        const deatalle = new Vue({
            el: '#contenidoAVIF',
            created: function() {
                this.getPublicaciones();
            },
            data: {
                org: '',
                titulo: '',
                contenido: '',
                imagen: ''
            },
            methods: {
                getPublicaciones: function() {
                    this.$http.get(detatalleUrl).then((responsed) => {
                        this.org = responsed.body.org;
                        this.titulo = responsed.body.title;
                        this.contenido = responsed.body.content;
                        this.imagen = responsed.body.image;
                    });
                }
            }
        });

    </script>

</main>
<!--FIN CONTENEDOR DE CONTENIDOS-->

</body>

</html>
