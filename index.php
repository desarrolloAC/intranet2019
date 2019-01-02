<!DOCTYPE html>

<html lang="es">

<head>
    <title>Intranet Alkes Corp, S.A</title>
    <meta name="viewport" content="width=device-width,device-height initial-scale=1.5" />
    <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
    <meta charset="utf-8">

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
            const publicacionesUrl = 'php/index/consultaPublicacionesInfo.php';
            const capuslaInformativa = new Vue({
                el: '#capuslaInformativa',
                created: function() {
                    this.getPublicaciones();
                },
                data: {
                    list: []
                },
                methods: {
                    getPublicaciones: function() {
                        this.$http.get(publicacionesUrl).then((responsed) => {
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
                <div class="col col-lg-3">
                    <!--vacio-->
                </div>
                <div class="col col-lg-6">
                    <video src="assets/video/POLITICA-20181212-173623.webm" type="video/webm" width="880" autoplay controls></video>
                </div>
                <div class="col col-lg-3">
                    <!--vacio-->
                </div>
            </div>
        </div>

        <script>
            const video = new Vue({
                el: '#video',
                created: function() {
                    this.getPublicaciones();
                },
                data: {
                    list: []
                },
                methods: {
                    getPublicaciones: function() {

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
            const invitacionUrl = 'php/index/consultaPublicacionesInvitaciones.php';
            const invitacion = new Vue({
                el: '#invitacion',
                created: function() {
                    this.getPublicaciones();
                },
                data: {
                    list: []
                },
                methods: {
                    getPublicaciones: function() {
                        this.$http.get(invitacionUrl).then((responsed) => {
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
                <div class="col col-lg-12">
                    <h1 class="tituloCapsulaInformativa2">Salas Reservadas Hoy</h1>
                </div>
            </div>

            <div class="row">
                <div class="col col-lg-3">
                    <!--vacio-->
                </div>
                <div class="col col-lg-6">
                    <table class="tablaSala" border="0">
                        <tr class="colorFondo">
                            <td>Dia</td>
                            <td>Mes</td>
                            <td>Año</td>
                            <td>Sala</td>
                            <td>Inicio</td>
                            <td>Fin</td>
                            <td>Usuario</td>
                            <td>Estado</td>
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
                            <td>
                                <h5>{{ item.reservado }}</h5>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col col-lg-3">
                    <!--vacio-->
                </div>
            </div>

        </div>

        <script type="text/javascript">
            const salasUrl = 'php/index/consultaSalas.php';
            const salas = new Vue({
                el: '#salas',
                created: function() {
                    this.getSalas();
                },
                data: {
                    list: []
                },
                methods: {
                    getSalas: function() {
                        this.$http.get(salasUrl).then((responsed) => {
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
                    <h1 class="tituloCapsulaInformativa">Cumpleañero del mes</h1>
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
            const cumpleMesnUrl = 'php/index/consultaPublicacionesCumpleMes.php';
            const cumpleMes = new Vue({
                el: '#cumpleMes',
                created: function() {
                    this.getPublicaciones();
                },
                data: {
                    list: []
                },
                methods: {
                    getPublicaciones: function() {
                        this.$http.get(cumpleMesnUrl).then((responsed) => {
                            this.list = responsed.body;
                        });
                    }
                }
            });

        </script>
        <!--FIN CUMPLEAÑEROS DEL MES-->





        <!--INICIO CANVAS-->
        <div class="canvas">
            <iframe class="iFrameKey" src="js/index/animate.html" scrolling="no" name="Costelacion" allowfullscreen="true" sandbox="allow-forms allow-modals allow-pointer-lock allow-popups allow-same-origin allow-scripts" allow="geolocation; microphone; camera; midi; vr; accelerometer; gyroscope; payment; ambient-light-sensor" allowtransparency="true" allowpaymentrequest="true">
            </iframe>
        </div>
        <!--FIN CANVAS-->




        <!--INICIO NUEVO INGRESO-->
        <div id="nuevoIngreso" class="container-fluid capuslaInformativa2">

            <div class="row">
                <div class="col col-lg-12">
                    <h1 class="tituloCapsulaInformativa">Nuevo ingreso</h1>
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
            const nuevoIngresoUrl = 'php/index/consultaPublicacionesCumpleMes.php';
            const nuevoIngreso = new Vue({
                el: '#nuevoIngreso',
                created: function() {
                    this.getPublicaciones();
                },
                data: {
                    list: []
                },
                methods: {
                    getPublicaciones: function() {
                        this.$http.get(nuevoIngresoUrl).then((responsed) => {
                            this.list = responsed.body;
                        });
                    }
                }
            });

        </script>

        <!--INICIO INFOGRAFIA-->
        <div class="container-fluid infografia">
            <div class="row">
                <img src="assets/image/infografia.jpg" class="img-fluid image-infografia" alt="Infografia" />
            </div>
        </div>
        <!--FIN INFOGRAFIA-->

    </main>

    <!--INICIO FOOTER-->
    <footer class="container-fluid footer">

        <!--FILA 1-->
        <div class="row">

            <!--INICIO FOLLETO INFORMATIVO-->
            <div class="col col-lg-3 folletoInformativo">
                <h1 id="tituloFolletoInformativo">Folleto Informativo</h1>
                <img src="assets/image/infografia.jpg" class="img-fluid image-infografia" alt="Infografia" />
            </div>

            <!--INICIO NUESTRAS REDES-->
            <div class="col col-lg-6 nuestrasPaginas">

                <!--TITULO -->
                <h1 id="tituloNuestrasPaginas">Nuestras Paginas</h1>

                <!--INICIO DIV EFECTO SLIDER-->
                <div class="slider">
                    <ul>
                        <li>
                            <a class="link-slider" href="http://alkes-corp.com/index.php/es/" target="_blank">
                                <div class="div-slider">
                                    <img class="image-slider" src="assets/image/footer/logo_alkes.png" alt="" />
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="link-slider" href="http://www.industriaselcaiman.com.ve/index.php/es/" target="_blank">
                                <div class="div-slider">
                                    <img class="image-slider" src="assets/image/footer/logo_iec.png" alt="" />
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="link-slider" href="http://venfruca.com/index.php/es/" target="_blank">
                                <div class="div-slider">
                                    <img class="image-slider" src="assets/image/footer/logo_venfruca.png" alt="" />
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="link-slider" href="http://www.fruttech.com/index.php/es/" target="_blank">
                                <div class="div-slider">
                                    <img class="image-slider" src="assets/image/footer/logo_fruttech.png" alt="" />
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <!--INICIO NUESTRAS REDES-->
            <div class="col col-lg-3 nuestrasRedes">
                <h1 id="tituloNuestrasRedes">Nuestras Redes Sociales</h1>
                <img id="imagenFacebook" class="efectoRotarRedesSociales" src="assets/image/footer/f.png" width="65">
                <img id="imagenFacebook" class="efectoRotarRedesSociales" src="assets/image/footer/instagram.png" width="65">
                <img id="imagenFacebook" class="efectoRotarRedesSociales" src="assets/image/footer/twitter.png" width="65">
            </div>
        </div>

        <!--FILA 2-->
        <div class="row">
            <!--INICIO COPYRING-->
            <div class="col-sm-12 copy">
                <h3 id="derechoAutor">Copyright © 2018 Intranet Corporativa Rights Reserved. </h3>
            </div>
        </div>

    </footer>
    <!--FIN FOOTER-->

</body>

</html>
