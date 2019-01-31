<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Intranet Alkes Corp, S.A</title>
        <meta name="viewport" content="width=device-width,device-height initial-scale=1.5" />
        <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
        <meta charset="utf-8">

        <link rel="icon" type="image/png" href="favicon.png" />
        <link rel="stylesheet" href="css/lib/bootstrap.min.css" media="all" />

        <link rel="stylesheet" type="text/css" href="css/index/index.css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/index/indexNoticiaCapsulaInformativa.css" media="all" />

        <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all" />

        <script src="js/lib/vue.js"></script>
        <script src="js/lib/vue-resource.min.js"></script>

    </head>

    <body>

        <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/top.php'; ?>


        <!--INICIO CONTENEDOR DE CONTENIDOS-->
        <main class="contenedorContenido">

            <div id="empresa" class="container-fluid empresa">
                <div class="row">

                     <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="assets/image/Logos/alkescorp3.png" alt="Mi Imagen">
                            <div class="card-body">
                                <h4 class="card-title">Alkes Corp</h4>
                                <a href="http://alkes-corp.com/index.php/es/" target="_blank" class="btn btn-primary">Ir a ...</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="assets/image/Logos/Fruttech.png" alt="Mi Imagen">
                            <div class="card-body">
                                <h4 class="card-title">Fruttech</h4>
                                <a href="http://www.fruttech.com/index.php/es/" target="_blank" class="btn btn-primary">Ir a ...</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="assets/image/Logos/INDUSTRIAS%20EL%20CAIMAN-01.png" alt="Mi Imagen">
                            <div class="card-body">
                                <h4 class="card-title">Industrias el Caiman</h4>
                                <a href="http://www.industriaselcaiman.com.ve/index.php/es/" target="_blank" class="btn btn-primary">Ir a ...</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" target="_blank" src="assets/image/Logos/VENFRUCA-01.png" alt="Mi Imagen">
                            <div class="card-body">
                                <h4 class="card-title">Venezolana de Frutas</h4>
                                <a href="http://venfruca.com/index.php/es/" target="_blank" class="btn btn-primary">Ir a ...</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--INICIO CAPSULA INFORMATIVA-->
            <div id="capuslaInformativa" class="container-fluid capuslaInformativa">

                <div class="row">
                    <div class="col col-lg-12">
                        <h1 class="tituloCapsulaInformativa">Capsula Informativa</h1>
                    </div>
                </div>

                <div class="row">
                    <a v-for="item in list" class="n" :href="'detalleNoticiaAVIF.php?n=' + item.publicacion_id">
                       <div class="contenedorNoticiaCapsulaInformativa">
                            <div class="tituloNoticiaCapsulaInformativa">'
                                <h5 class="tituloAvanceInformativo">{{ item.titulo }}</h5>
                            </div>
                            <div class="imagenAvanceInformativo">
                                <img id="imagenAvanceInformativo2" :src="item.imagen" alt="Avance informativo">
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <script type="text/javascript">
                //
                const publicacionesUrl = 'php/index/consultaPublicacionesInfo.php';
                const capuslaInformativa = new Vue({
                    el: '#capuslaInformativa',
                    created: function () {
                        this.getPublicaciones();
                    },
                    data: {
                        list: []
                    },
                    methods: {
                        getPublicaciones: function () {
                            this.$http.get(publicacionesUrl).then((responsed) => {
                                this.list = [];
                                this.list = responsed.body;
                            });
                        }
                    }
                });

            </script>
            <!--FIN CAPSULA INFORMATIVA-->



            <!--INICIO VIDEO-->
            <div id="video" class="container-fluid video">

                <div class="row">
                    <div class="col col-lg-6">
                        <video src="assets/video/POLITICA-20181212-173623.webm" type="video/webm" width="880" height="594" autoplay controls></video>
                    </div>
                    <div class="col col-lg-6">

                        <!--INICIO DIV EFECTO SLIDER-->
                        <div class="slider">
                            <ul>
                                <li>
                                    <img class="img-fluid image-slider" src="assets/image/banner/BANNERS%20IEC-01.jpg" alt="" />
                                </li>
                                <li>
                                    <img class="img-fluid image-slider" src="assets/image/banner/BANNERS%20IEC-08.jpg" alt="" />
                                </li>
                                <li>
                                    <img class="img-fluid image-slider" src="assets/image/banner/BANNERS%20IEC-01.jpg" alt="" />
                                </li>
                                <li>
                                    <img class="img-fluid image-slider" src="assets/image/banner/BANNERS%20IEC-08.jpg" alt="" />
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

            <script>
                //
                const video = new Vue({
                    el: '#video',
                    created: function () {
                        this.getPublicaciones();
                    },
                    data: {
                        list: []
                    },
                    methods: {
                        getPublicaciones: function () {

                        }
                    }
                });

            </script>
            <!--FIN VIDEO-->



            <!--INICIO INVITACION-->
            <div id="invitacion" class="container-fluid capuslaInformativa2">

                <div class="row">
                    <div class="col col-lg-12">
                        <h1 class="tituloCapsulaInformativa">Invitaciones</h1>
                    </div>
                </div>

                <div class="row">
                    <a v-for="item in list" class="n" :href="'detalleNoticiaAVIF.php?n=' + item.publicacion_id">
                       <div class="contenedorNoticiaCapsulaInformativa">
                            <div class="tituloNoticiaCapsulaInformativa">'
                                <h5 class="tituloAvanceInformativo">{{ item.titulo }}</h5>
                            </div>
                            <div class="imagenAvanceInformativo">
                                <img id="imagenAvanceInformativo2" :src="item.imagen" alt="Avance informativo">
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <script type="text/javascript">
                //
                const invitacionUrl = 'php/index/consultaPublicacionesInvitaciones.php';
                const invitacion = new Vue({
                    el: '#invitacion',
                    created: function () {
                        this.getPublicaciones();
                    },
                    data: {
                        list: []
                    },
                    methods: {
                        getPublicaciones: function () {
                            this.$http.get(invitacionUrl).then((responsed) => {
                                this.list = [];
                                this.list = responsed.body;
                            });
                        }
                    }
                });

            </script>
            <!--FIN CAPSULA INVITACION-->


            <!--INICIO SALAS-->
            <div id="salas" class="container-fluid salas">

                <div class="row">

                    <div class="col col-lg-6">
                        <img src="assets/image/banner/likiliki.jpg" class="img-fluid" width="880" height="594" alt="Nuestras Marcas">
                    </div>

                    <div class="col col-lg-6">
                       <center>
                            <h1 class="tituloCapsulaInformativa2">Salas Reservadas Hoy</h1>
                       </center>
                        <table class="tablaSala" border="0">
                            <tr class="colorFondo">
                                <td>Dia</td>
                                <td>Mes</td>
                                <td>Año</td>
                                <td>Sala</td>
                                <td>Inicio</td>
                                <td>Fin</td>
                                <td>Usuario</td>
                            </tr>
                            <tr class="colorDato" v-for="item in list">
                                <td>
                                    <h5>{{ item.dia }}</h5>
                                </td>
                                <td>
                                    <h5>{{ item.mes }}</h5>
                                </td>
                                <td>
                                    <h5>{{ item.ano }}</h5>
                                </td>
                                <td>
                                    <h5>{{ item.salas }}</h5>
                                </td>
                                <td>
                                    <h5>{{ item.hora_inicio }}</h5>
                                </td>
                                <td>
                                    <h5>{{ item.hora_final }}</h5>
                                </td>
                                <td>
                                    <h5>{{ item.usuario }}</h5>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>

            <script type="text/javascript">
                //
                const salasUrl = 'php/index/consultaSalas.php';
                const salas = new Vue({
                    el: '#salas',
                    created: function () {
                        this.getSalas();
                    },
                    data: {
                        list: []
                    },
                    methods: {
                        getSalas: function () {
                            this.$http.get(salasUrl).then((responsed) => {
                                this.list = [];
                                this.list = responsed.body;
                            });
                        }
                    }
                });

            </script>
            <!--FIN SALAS-->




            <!--INICIO CUMPLEAÑEROS DEL MES-->
            <div id="cumpleMes" class="container-fluid capuslaInformativa2">

                <div class="row">
                    <div class="col col-lg-12">
                        <h1 class="tituloCapsulaInformativa">Talento Humano</h1>
                    </div>
                </div>

                <div class="row">
                    <a v-for="item in list" class="n" :href="'detalleNoticiaAVIF.php?n=' + item.publicacion_id">
                       <div class="contenedorNoticiaCapsulaInformativa">
                            <div class="tituloNoticiaCapsulaInformativa">'
                                <h5 class="tituloAvanceInformativo">{{ item.titulo }}</h5>
                            </div>
                            <div class="imagenAvanceInformativo">
                                <img id="imagenAvanceInformativo2" :src="item.imagen" alt="Avance informativo">
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <script type="text/javascript">
                //
                const cumpleMesnUrl = 'php/index/consultaPublicacionesCumpleMes.php';
                const cumpleMes = new Vue({
                    el: '#cumpleMes',
                    created: function () {
                        this.getPublicaciones();
                    },
                    data: {
                        list: []
                    },
                    methods: {
                        getPublicaciones: function () {
                            this.$http.get(cumpleMesnUrl).then((responsed) => {
                                this.list = [];
                                this.list = responsed.body;
                            });
                        }
                    }
                });

            </script>
            <!--FIN CUMPLEAÑEROS DEL MES-->

            <!--INICIO CANVAS-->
            <div class="container-fluid resena">

                <div class="row">
                    <div class="col col-lg-12">
                        <h1 class="tituloCapsulaInformativa">Reseña Alkes</h1>
                    </div>
                </div>

            </div>

            <div class="canvas" >
               <canvas class="iFrameKey"></canvas>
            </div>

            <div id="simple-modal" class="modal">
                <div class="modal-content">
                    <img class="modal_img" id="close-btn" src="assets/image/index/resena.png" alt="Reseña Alkes">
                </div>
            </div>

            <script src="js/index/zepto.min.js"></script>
            <script src="js/index/stats.min.js"></script>
            <script src="js/index/camvas.js"></script>
            <!--FIN CANVAS-->




            <!--INICIO NUEVO INGRESO-->
            <div id="nuevoIngreso" class="container-fluid capuslaInformativa2">

                <div class="row">
                    <div class="col col-lg-12">
                        <h1 class="tituloCapsulaInformativa">Celebraciones</h1>
                    </div>
                </div>

                <div class="row">
                    <a v-for="item in list" class="n" :href="'detalleNoticiaAVIF.php?n=' + item.publicacion_id">
                       <div class="contenedorNoticiaCapsulaInformativa">
                            <div class="tituloNoticiaCapsulaInformativa">'
                                <h5 class="tituloAvanceInformativo">{{ item.titulo }}</h5>
                            </div>
                            <div class="imagenAvanceInformativo">
                                <img id="imagenAvanceInformativo2" :src="item.imagen" alt="Avance informativo">
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <script type="text/javascript">
                //
                const nuevoIngresoUrl = 'php/index/consultaPublicacionesNuevoIngreso.php';
                const nuevoIngreso = new Vue({
                    el: '#nuevoIngreso',
                    created: function () {
                        this.getPublicaciones();
                    },
                    data: {
                        list: []
                    },
                    methods: {
                        getPublicaciones: function () {
                            this.$http.get(nuevoIngresoUrl).then((responsed) => {
                                this.list = [];
                                this.list = responsed.body;
                            });
                        }
                    }
                });

            </script>

            <!--INICIO INFOGRAFIA-->
            <div class="container-fluid infografia">
                <div class="row">
                    <img src="assets/image/infografia/Que%20es%20una%20auditor%C3%ADa-02.png" class="img-fluid image-infografia" alt="Infografia" />
                </div>
            </div>
            <!--FIN INFOGRAFIA-->

        </main>

        <!--INICIO FOOTER-->
        <footer class="container-fluid footer">

            <div class="row">
                <div class="col col-lg-12 folletoInformativo">


                </div>
            </div>

            <div class="row">
                <div class="col-sm-10 copy">
                    <p id="derechoAutor">Copyright © 2018 Intranet Alkes. All Rights Reserved.</p>
                </div>
                <div class="col-sm-2 redes">
                    <img id="imagenFacebook" class="efectoRotarRedesSociales" src="assets/image/footer/instagram.png" width="60">
                </div>
            </div>

        </footer>
        <!--FIN FOOTER-->

    </body>

</html>
