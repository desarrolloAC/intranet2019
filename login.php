<!DOCTYPE html>

<html>

<head>
    <title>Intranet Alkes Corp, S.A</title>

    <meta name="viewport" content="width=device-width,device-height initial-scale=1.5"/>
    <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="css/login/login.css">

    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous"/>
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

                    <h1 class="titulo_iniciarSesion">Iniciar Sesion</h1>

                    <form method="POST" action="php/login.php">

                        <div class="form-group">
                            <label for="correo">Direccion de Correo</label>
                            <input type="email" class="form-control2" id="correo" aria-describedby="emailHelp" name="txtCorreo" placeholder="Correo">
                        </div>

                        <div class="form-group">
                            <label for="pass">Contraseña</label>
                            <input type="password" class="form-control2" id="pass"  aria-describedby="paswordHelp" name="txtPass" placeholder="Contraseña">
                        </div>

                        <div class="form-check">
                            <a class="olvido_contrasena" href="recuperarPassLogin.php">¿Olvidó Su Contraseña?</a>
                        </div>
                        <br>
                        <button type="submit" class="btn Ingresar">Ingresar</button>


                    </form>

                </div>
                <!--FIN DEL DISEÑO FORMULARIO LOGIN-->

           </div>
           <div class="col col-lg-4">

            </div>
       </div>
   </div>


</main>
<!--FIN CONTENEDOR DE CONTENIDOS-->



</body>

</html>
