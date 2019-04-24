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

        <link rel="stylesheet" type="text/css" href="css/detalle/detallePostulate.css" media="all"/>

        <script type="text/javascript" src="js/lib/vue.js"></script>
        <script type="text/javascript" src="js/lib/vue-resource.min.js"></script>

        <script type="text/javascript" src="js/structura/url.js"></script>

    </head>

    <body>


        <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/top.php'; ?>



        <!--INICIO CONTENEDOR DE CONTENIDOS-->
        <main class="contenedorContenido">

            <div id="contenidoAVIF" class="contenidoAVIF">
                    <div class="contenidoPlantilla">
                        <img class="imagen-detalle" :src="item.photo" alt="Detalle de la Postulacion">
                        <h1 class='titulo'>{{ item.tipo}}</h1>
                        <h5 class="org">{{ item.org }}</h5>
                        <!--   <h1 class='titulo'>{{ item.title }}</h1>-->
                        <div class="requisitos" v-html="item.requirement"></div>
                        <div class="posiciones" v-html="item.positions"></div>
                        <div class="responsabilidades" v-html="item.chargue"></div>
                        <label class="tituloCaracteresCorreo">Si estas interesado en postularte envia tu sintesis curricular a la siguiente direccion electronica:</label>
                        <h5 class="correo">{{ item.correo}}</h5>                                            
                        <label class="valido">Valido Hasta: </label>
                         <!--<textarea class="contenido" readonly>{{ item.content }}</textarea>
            LAS LLAVES NO INTERPRETAN ETIQUETAS HTML POR ESTO SE DEBE USAR EN ESTE CASO LA DIRECTIVA v-html              -->
                        <div class="contenido" v-html="item.content"> </div>
                    </div>
                </div>

                <script type="text/javascript">

const deatalle = new Vue({
    el: '#contenidoAVIF',
    created: function () {
        this.getPublicaciones();
    },
    data: {
        item: {}
    },
    methods: {
        getPublicaciones: function () {
            this.$http.get('php/detalle/detallePostulate.php?id=' + getParamURL('id')).then((responsed) => {
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