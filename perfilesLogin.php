<?php
    @session_start();
    
    include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';
    include $_SERVER["DOCUMENT_ROOT"].'/intranet/php/estadosLogin.php';

    $conexion =conectar();
 
   $query="  SELECT  DISTINCT(o.ID_Organizacion),o.Nombre
                          FROM        org_usuario_rol oru
                          RIGHT  JOIN usuario      u  ON (oru.Cedula          =  u.Cedula)
                          RIGHT  JOIN organizacion o  ON (oru.ID_Organizacion =  o.ID_Organizacion)
                          WHERE  u.Cedula ='$_SESSION[Cedula]'
                          AND  oru.Estatus='A'
                          AND    o.Estatus='A'
                          AND    u.Estatus='A' ";

    $rs=mysql_query($query,$conexion);

?>
<!DOCTYPE html>
<html>

<head>
	<title>Intranet Alkes Corp, S.A</title>
	
	<meta name="viewport" content="width=device-width,device-height initial-scale=1.5"/>
	<meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
	<meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="estructura/css/estructura.css">
    <link rel="stylesheet" type="text/css" href="css/login/login.css">
	
   
   
    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all"/>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous"/>
</head>

<body>

  <!--INICIO CONTENEDOR CABECERA-->
  <div id="contenedorCabecera">

    <!--INICIO CONTENEDOR LOGO ALKES-->
    <div id="contenedorLogo">
      <a href="index.html">
        <img class="logo" src="imagenes\top\logoAlkes.png" width="500" height="100">
      </a>
    </div>
    <!--FIN CONTENEDOR LOGO ALKES-->

    <!--INICIO CONTENEDOR NOMBRE USUARIO-->
    <div id="contenedorNombreUsuario">
      
      <!--INICIO ICONO DE USUARIO-->
      <img id="iconoUsuario" src="imagenes/top/usuario.png" width="60" height="60" title="Nombre De Usuario">
      <!--FIN ICONO DE USUARIO-->   
      
    </div>
    <!--FIN CONTENEDOR NOMBRE USUARIO-->

  </div>
  <!--FIN DEL CONTENEDOR CABECERA-->





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
                            <select class="form-control" id="txtOrg" name='txtOrg'>
                               <option>Organizacion</option>
                               <?php
                                    if ($row = mysql_fetch_array($rs)) {
                                        do {      
                                            echo "<option value='$row[ID_Organizacion]'> $row[Nombre] </option>";
                                        } while ($row=mysql_fetch_array($rs));
                                    }
                                    mysql_free_result($rs);
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="txtPerfil">Perfil</label>
                            <select class="form-control" id="txtPerfil" name="txtPerfil">
                                 <option>Perfil Usuario</option>
                            </select>
                        </div>
                        
                        <br>
                        <button type="submit" class="btn Ingresar">Seleccionar</button>
                        
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

    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/perfileslogin/selectPerfiles.js"></script>
</body>

</html>
          
         