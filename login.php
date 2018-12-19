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
                    <a id="upa" href="visorpdf.php" title="">Últimos proyectos y acuerdos</a>
                </li>
                <li>
                    <a id="upa"   href="visorpdf.php" title="">Próximos eventos</a>
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
                                    <li><a href="php/visorpdf.php?id=iso0" title="">Norma BASC 4:2012</a></li>
                                    <li><a href="php/visorpdf.php?id=iso1" title="">Norma ISO 22000:2005 </a></li>
                                    <li><a href="php/visorpdf.php?id=iso2" title="">Norma ISO 19011:2011</a></li>
                                    <li><a href="php/visorpdf.php?id=iso3" title="">Norma ISO 9001:2015</a></li>
                                    <li><a href="php/visorpdf.php?id=iso4" title="">Norma ISO 9001:2008 </a></li>
                                    <li><a href="php/visorpdf.php?id=iso5" title="">Norma ISO 9004:2010</a></li>
                                </ul>
                           </li>
                       </ul>
                </li>  					
            </ul>
            <!--FIN DEL SUBMENU INFORMACION PARA EL TRABAJO-->

        </li>
        <!--FIN DE LA OPCION INFORMACION PARA EL TRABAJO-->

        <li>
            <a href="directorio.php" title="">Directorio</a>
        </li>


        <li>
            <a href="#" title="">Descargas</a>

            <ul>
                <li>
                    <a href="#" title="">Gestión Humana</a>

                    <ul>

                       <li>
                        <a href="php/Descargas.php?id=1" title="">Formato Unico</a>
                       </li>

                     </ul>
                    <a href="#" title="">Mercadeo</a>
                    <a href="#" title="">Cuentas por Pagar</a>

                </li>

            </ul>

        </li>

        <li>
            <a href="../alkes/index.html" title="">Reservar Sala De Reunion</a>
        </li>

    </ul>

</header>
<!--FIN CONTENEDOR TOP-->

	

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
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Acepto los terminos y condiciones</label>
                        </div>
                        <br>
                        <button type="submit" class="btn Ingresar">Ingresar</button>
                        <a class="olvido_contrasena" href="php/recuperarPassLogin.php">¿Olvidó Su Contraseña?</a>
                        
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