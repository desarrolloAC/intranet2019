<?php @session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Intranet Alkes Corp, S.A</title>

    <meta name="viewport" content="width=device-width,device-height initial-scale=1.5"/>
    <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/lib/bootstrap.min.css" media="all"/>

    <link rel="stylesheet" type="text/css" href="estructura/css/estructura.css">
    <link rel="stylesheet" type="text/css" href="css/login/login.css">

    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all"/>

    <script src="js/lib/vue.js"></script>
    <script src="js/lib/vue-resource.min.js"></script>
</head>

<body>


<?php include $_SERVER["DOCUMENT_ROOT"].'/intranet/top.php'; ?>


<!--INICIO CONTENEDOR DE CONTENIDOS-->
<main class="parent">

   <div class="container-fluid">

        <div class="row">
           <div class="col col-lg-4">

            </div>
           <div class="col col-lg-4">

                <!--INICIO DEL DISEÑO FORMULARIO LOGIN-->
                <div class="contenedor_login">

                    <h1 class="titulo_iniciarSesion">Seleccionar Rol</h1>

                    <form method="POST" action="php/inicioSesion.php">

                        <div class="form-group">
                            <label for="txtOrg">Organización</label>
                            <select class="form-control2" id="txtOrg" name='txtOrg'>
                                <option>Organizacion</option>
                                <option v-for="item in list" :value='item.key'>{{ item.name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="txtPerfil">Perfil</label>
                            <select class="form-control2" id="txtPerfil" name="txtPerfil">
                                 <option>Perfil Usuario</option>
                            </select>
                        </div>

                        <br>
                        <button type="submit" class="btn Ingresar">Seleccionar</button>

                    </form>

                    <script type="text/javascript">

                        const getOrgUrl = 'http://localhost/intranet/php/login/GetOrganization.php';
                        const getOrg = new Vue({
                            el: '#txtOrg',
                            created: function() {
                                this.getPublicaciones();
                            },
                            data: {
                                list: []
                            },
                            methods: {
                                getPublicaciones: function() {
                                    this.$http.get(getOrgUrl).then((responsed) => {
                                        this.list = responsed.body;
                                    });
                                }
                            }
                        });

                    </script>

                </div>
                <!--FIN DEL DISEÑO FORMULARIO LOGIN-->

           </div>
           <div class="col col-lg-4">

            </div>
       </div>
   </div>


</main>
<!--FIN CONTENEDOR DE CONTENIDOS-->

    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/perfileslogin/selectPerfiles.js"></script>
</body>

</html>

