<!DOCTYPE html>
<html>

<head>
    <title>Intranet Alkes Corp, S.A</title>
    <meta name="viewport" content="width=device-width,device-height initial-scale=1.5" />
    <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
    <meta charset="utf-8">

    <link rel="icon" type="image/png" href="favicon.png" />

    <link rel="stylesheet" href="css/lib/bootstrap.min.css" media="all" />

    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all" />

    <link rel="stylesheet" type="text/css" href="css/directorio/directorio.css" media="screen">

    <script type="text/javascript" src="js/lib/vue.js"></script>
    <script type="text/javascript" src="js/lib/vue-resource.min.js"></script>

    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/perfileslogin/selectPerfiles.js"></script>
</head>



<body>

    <?php include $_SERVER["DOCUMENT_ROOT"].'/intranet/top.php'; ?>


    <!--INICIO CONTENEDOR DE CONTENIDOS-->

    <main class="contenedorContenido">


        <!--INICIO DEL DISEÑO CONTENEDOR TABLA DIRECTORIO-->
        <div class="contenedor_tabla_directorio">

            <table border="1" id="tabla_directorio">

                <tr>
                    <td colspan="9">
                        <input type="text" name="txtBuscarDirectorio" id="txtBuscarDirectorio" v-on:keyup="searchDirectorio" placeholder="Buscar Usuario">
                        <button type="button" name="btnBuscarDirectorio" id="btnBuscarDirectorio" v-on:click="getDirectorio">Reset</button>
                    </td>

                </tr>

                <tr id="titulo_columnas">
                    <td width="50px">
                        <h5>Foto</h5>
                    </td>
                    <td>
                        <h5>Nombre Completo</h5>
                    </td>
                    <td>
                        <h5>Organizacion</h5>
                    </td>
                    <td>
                        <h5>Departamento</h5>
                    </td>
                    <td>
                        <h5>Cargo</h5>
                    </td>
                    <td>
                        <h5>Telefono</h5>
                    </td>
                    <td>
                        <h5>Correo</h5>
                    </td>
                    <td>
                        <h5>Direccion</h5>
                    </td>
                </tr>


                <tr id="color_datos" v-for="item in list">
                    <td>
                        <h5>
                            <img id="imagenDirectorio" :src="item.foto">
                        </h5>
                    </td>
                    <td>
                        <h5>{{ item.nc }}</h5>
                    </td>
                    <td>
                        <h5>{{ item.org }}</h5>
                    </td>
                    <td>
                        <h5>{{ item.departamento }}</h5>
                    </td>
                    <td>
                        <h5>{{ item.cargo }}</h5>
                    </td>
                    <td>
                        <h5>{{ item.telefono }}</h5>
                    </td>
                    <td>
                        <h5>{{ item.correo }}</h5>
                    </td>
                    <td>
                        <h5>{{ item.direccion }}</h5>
                    </td>
                </tr>
            </table>

            <script type="text/javascript">
                const dir = new Vue({
                    el: '#tabla_directorio',
                    created: function() {
                        this.getDirectorio();
                    },
                    data: {
                        list: []
                    },
                    methods: {

                        getDirectorio: function() {
                            const dirUrl = 'php/directorio/GetDirectorio.php';
                            this.$http.get(dirUrl).then((responsed) => {
                                this.list = responsed.body;
                            });
                        },

                        searchDirectorio: function() {
                            const search = $('#txtBuscarDirectorio').val();
                            const dirUrl = 'php/directorio/SearchDirectorio.php';
                            this.$http.get(dirUrl, {
                                params: {
                                    search: search
                                }
                            }).then((responsed) => {
                                this.list = [];
                                this.list = responsed.body;
                            });
                        }
                    }
                });

            </script>
        </div>
        <!--FIN DEL DISEÑO CONTENEDOR TABLA DIRECTORIO-->

    </main>
    <!--FIN CONTENEDOR DE CONTENIDOS-->


</body>



</html>
