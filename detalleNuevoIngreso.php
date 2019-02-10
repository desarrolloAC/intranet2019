<!DOCTYPE html>

<html>

<head>
    <title>Intranet Alkes Corp, S.A</title>
    <meta name="viewport" content="width=device-width,device-height initial-scale=1.5"/>
    <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
    <meta charset="utf-8">

    <link rel="icon" type="image/png" href="favicon.png" />

    <link rel="stylesheet" type="text/css" href="css/detalle/detalleNuevoIngreso.css" media="all"/>

    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all"/>

    <script src="js/lib/vue.js"></script>
    <script src="js/lib/vue-resource.min.js"></script>

</head>

<body>


<?php include $_SERVER["DOCUMENT_ROOT"].'/intranet/top.php'; ?>



<!--INICIO CONTENEDOR DE CONTENIDOS-->
<main class="contenedorContenido">

    <div id="contenidoAVIF" class="contenidoAVIF">
        <div class="contenidoPlantilla">
            <img class="imagen-detalle" :src="imagen" alt="Detalle de la noticia">
            <h1 class='titulo'>{{ titulo }}</h1>
            <h5 class="org">{{ org }}</h5>
            <textarea class="contenido" readonly>{{ contenido }}</textarea>
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
