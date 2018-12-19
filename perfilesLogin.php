<?php
    @session_start();
    
    include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';
    include $_SERVER["DOCUMENT_ROOT"].'/intranet/php/estadosLogin.php';

    $conexion =conectar();
 
?>
<!DOCTYPE html>
<html>

<head>
	<title>Intranet Alkes Corp, S.A</title>
	
	<meta name="viewport" content="width=device-width,device-height initial-scale=1.5"/>
	<meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
	<meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="estructura/css/estructura.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <link rel="stylesheet" type="text/css" href="css/login/login.css">
	
    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all"/>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous"/>
        
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/selectPerfiles.js"></script>

</head>

<body>

  <!--INICIO CONTENEDOR CABECERA-->
  <div id="contenedorCabecera">

    <!--INICIO CONTENEDOR LOGO ALKES-->
    <div id="contenedorLogo">
      <a href="../home.php">
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
                            <label for="exampleFormControlSelect1">Organización</label>
                            <select class="form-control" id="exampleFormControlSelect1" name='txtOrg'>
                               <?php
                                    $query="  SELECT  DISTINCT(o.ID_Organizacion),o.Nombre
                                              FROM        org_usuario_rol oru
                                              RIGHT  JOIN usuario      u  ON (oru.Cedula          =  u.Cedula)
                                              RIGHT  JOIN organizacion o  ON (oru.ID_Organizacion =  o.ID_Organizacion)
                                              WHERE  u.Cedula ='$_SESSION[Cedula]'
                                              AND  oru.Estatus='A'
                                              AND    o.Estatus='A'
                                              AND    u.Estatus='A' ";
                                    $rs=mysql_query($query,$conexion);
                                    if($row = mysql_fetch_array($rs)){
                                        do{ 
                                            echo "<option value='$row[ID_Organizacion]'> $row[Nombre] </option>";
                                          }while ($row=mysql_fetch_array($rs));
                                    }
                                    mysql_free_result($rs);
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="perfil">Perfil</label>
                            <select class="form-control" id="perfil" name="txtPerfil">
                             <option>Perfil</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
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




  <!--INICIO DEL DISEÑO FORMULARIO LOGIN-->
  <div class="contenedor_login">
    <form id="formulario" method="POST" action="inicioSesion.php">
          <table id="tabla_login" border="1" width="642" cellpadding="0">
            <thead>
              <tr>
                <th>
                  <h1 id="titulo_iniciarSesion">Seleccionar Rol</h1>
                </th>
              </tr>
            </thead>
            <tbody>         
              <tr>
                <td>
                  <center>
                          <select name='txtOrg' class='combos_formulario_usuario' id='txtOrg' required >
                            <option> Organización </option>
                            <?php
                                $query="  SELECT  DISTINCT(o.ID_Organizacion),o.Nombre
                                          FROM        org_usuario_rol oru
                                          RIGHT  JOIN usuario      u  ON (oru.Cedula          =  u.Cedula)
                                          RIGHT  JOIN organizacion o  ON (oru.ID_Organizacion =  o.ID_Organizacion)
                                          WHERE  u.Cedula ='$_SESSION[Cedula]'
                                          AND  oru.Estatus='A'
                                          AND    o.Estatus='A'
                                          AND    u.Estatus='A' ";
                                $rs=mysql_query($query,$conexion);
                                if($row = mysql_fetch_array($rs)){
                                    do{ 
                                        echo "<option value='$row[ID_Organizacion]'> $row[Nombre] </option>";
                                      }while ($row=mysql_fetch_array($rs));
                                }
                                mysql_free_result($rs);
                            ?>
                          </select>                        
                  </center>
                </td>
              </tr>

              <tr>
                <td>
                  <center>                      
                        <select name="txtPerfil" id="txtPerfil" class ="combos_formulario_usuario" required>
                          <option value="">Perfil</option>
                        </select>
                  </center>
                </td>
              </tr>         
              <tr>
                <td>
                  <center><input id="Ingresar" type="submit" name="btnIngresar" value="Seleccionar"></center>
                </td>
              </tr>              
            </tbody>
          </table>
        </form>
      </div>
      <!--FIN DEL DISEÑO FORMULARIO LOGIN-->

</body>

</html>
          
         