<!--INICIO CONTENEDOR CABECERA-->
<div id="contenedorCabecera">

    <!--INICIO CONTENEDOR LOGO ALKES-->

    <div id="contenedorLogo">
        <a href="index.php">
            <img class="logo" src="assets/image/top/logoAlkes.png" width="500" height="100">
        </a>
    </div>

    <!--FIN CONTENEDOR LOGO ALKES-->


    <!--INICIO CONTENEDOR BANDEJA DE ENTRADA -->

    <div id="bandeja">

        <a href="#" id="abrirBandeja">Bandeja De Entrada
            <img id="imagenBandeja" src="assets/image/top/bandeja.png">
            <div id='nNotificacion'>
                <h5 id='rNumero'>{{ num }}</h5>
            </div>
        </a>

        <div id="contenidoBandeja">

            <div v-for="item in list" id="contenedorNotificaciones">
                <a id="enlaceNotificaciones" :href="'#' + item.publicacion_id">{{ item.mensaje }}</a>
            </div>

        </div>

    </div>

    <!--FIN CONTENEDOR BANDEJA DE ENTRADA-->



    <!--INICIO CONTENEDOR NOMBRE USUARIO-->

    <div id="contenedorNombreUsuario">

        <!--INICIO DE TABLA CONTENEDORA DE DATOS INICIO DE SESION-->

        <table border="0" id="tabla_datos_inicio_de_sesion">
            <tr>
                <td>
                    <!--INICIO ICONO DE USUARIO-->
                    <img id="iconoUsuario" src="assets/image/top/u.png" title="Nombre De Usuario">
                    <!--FIN ICONO DE USUARIO-->
                </td>

                <td>
                    <span id="nombreUsuario">
                        {{ user.correo }}
                    </span>
                </td>

                <td rowspan="3">
                    <form id="formularioCerrarSesion" method="POST" action="php/cerrarSesion.php">
                        <a href="php/cerrarSesion.php">
                            <img id="iconoSalir" src="assets/image/top/salir.png" width="60" height="60" title="Cerrar Session">
                        </a>
                    </form>
                </td>
            </tr>

            <tr>
                <td>
                    <!--INICIO ICONO DE USUARIO-->
                    <img id="iconoRol" src="assets/image/top/r.png" title="Nombre Del Rol">
                    <!--FIN ICONO DE USUARIO-->
                </td>

                <td>
                    <span id="nombreRol">
                        {{ user.cargo }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <!--INICIO ICONO DE USUARIO-->
                    <img id="iconoOrganizacion" src="assets/image/top/o.png" title="Nombre De La Organizacion">
                    <!--FIN ICONO DE USUARIO-->
                </td>

                <td>
                    <span id="nombreOrganizacion">
                        {{ user.org }}
                    </span>
                </td>
            </tr>

        </table>
        <!--FIN DE TABLA CONTENEDORA DE DATOS INICIO DE SESION-->

    </div>
    <!--FIN CONTENEDOR NOMBRE USUARIO-->

</div>

<!--FIN DEL CONTENEDOR CABECERA-->

<script type="text/javascript">
    const contenidoBandeja = new Vue({
        el: '#contenedorCabecera',
        created: function() {
            this.getPublicaciones();
            this.getUsuarioActual();
            this.getNumeroNotificaciones();
        },
        data: {
            list: [],
            user: '',
            num: 0
        },
        methods: {
            getPublicaciones: function() {
                const contenidoBandejaUrl = 'php/notificaciones/GetNotificaciones.php';

                this.$http.get(contenidoBandejaUrl).then((responsed) => {
                    this.list = responsed.body;
                });
            },
            getUsuarioActual: function() {
                const usuarioActualUrl = 'php/notificaciones/GetUsuarioActual.php';

                this.$http.get(usuarioActualUrl).then((responsed) => {
                    this.user = responsed.body[0];
                });
            },
            getNumeroNotificaciones: function() {
                const numeroUrl = 'php/notificaciones/GetNumeroNotificaciones.php';

                this.$http.get(numeroUrl).then((responsed) => {
                    this.num = responsed.body.n;
                });
            }
        }
    });

</script>
