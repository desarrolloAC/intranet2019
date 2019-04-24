<!DOCTYPE html>

<html>

<head>
    <title>Intranet Alkes Corp, S.A</title>
    <meta name="viewport" content="width=device-width,device-height initial-scale=1.5"/>
    <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
    <meta charset="utf-8">

    <link rel="icon" type="image/png" href="favicon.png" />

    <link rel="stylesheet" href="css/lib/bootstrap.min.css" media="all" />

    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all"/>

    <link rel="stylesheet" type="text/css" href="css/detalle/detalleCondolencia.css" media="all"/>

    <script type="text/javascript" src="js/lib/vue.js"></script>
    <script type="text/javascript" src="js/lib/vue-resource.min.js"></script>
    <script type="text/javascript" src="js/structura/url.js"></script>

</head>

<body>


<?php include $_SERVER["DOCUMENT_ROOT"].'/intranet/top.php'; ?>



<!--INICIO CONTENEDOR DE CONTENIDOS-->
<main class="contenedorContenido">

    <div id="contenidoCOMU" class="contenidoCOMU">
        <div class="contenidoPlantilla">
            <img class="imagen-detalle" :src="item.photo" alt="Detalle de la noticia">
            <h1 class="clai"> Fallecimiento </h1>
             <!--<textarea class="contenido" readonly>{{ item.content }}</textarea>
            LAS LLAVES NO INTERPRETAN ETIQUETAS HTML POR ESTO SE DEBE USAR EN ESTE CASO LA DIRECTIVA v-html    
            -->
            <div class="contenido" v-html="item.content"> </div>
        </div>
    </div>

    <script type="text/javascript">

        const deatalle = new Vue({
            el: '#contenidoCOMU',
            created: function() {
                this.getPublicaciones();
            },
            data: {
                item: {}
            },
            methods: {
                getPublicaciones: function() {
                    this.$http.get('php/detalle/detalleFallecimiento.php?id='+getParamURL('id')).then((responsed) => {
                        this.item = responsed.body;
                    });
                }
            }
        });

    </script>

</main>
<!--FIN CONTENEDOR DE CONTENIDOS-->

</body>

</html>
