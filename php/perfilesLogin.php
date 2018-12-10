<?php
    @session_start();
    
    require_once '../conexion/conexion.php';
    require_once 'estadosLogin.php';

$conexion =conectar();
 
?>
<!DOCTYPE html>
<html>

<head>
    
    <title>Intranet Alkes Corp</title>

    <link rel="stylesheet" type="text/css" href="../estructura/css/estructura.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">

    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../js/selectPerfiles.js"></script>

</head>

<body>

  <!--INICIO CONTENEDOR CABECERA-->
  <div id="contenedorCabecera">

    <!--INICIO CONTENEDOR LOGO ALKES-->
    <div id="contenedorLogo">
      <a href="../home.php">
        <img class="logo" src="..\imagenes\top\logoAlkes.png" width="500" height="100">
      </a>
    </div>
    <!--FIN CONTENEDOR LOGO ALKES-->

    <!--INICIO CONTENEDOR NOMBRE USUARIO-->
    <div id="contenedorNombreUsuario">
      
      <!--INICIO ICONO DE USUARIO-->
      <img id="iconoUsuario" src="..\imagenes/top/usuario.png" width="60" height="60" title="Nombre De Usuario">
      <!--FIN ICONO DE USUARIO-->   
      
    </div>
    <!--FIN CONTENEDOR NOMBRE USUARIO-->

  </div>
  <!--FIN DEL CONTENEDOR CABECERA-->

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

  <!--INICIO CONTENEDOR PIE DE PAGINA-->
  <div id="contenedorPiePagina">
      
      <!--DISEÑO DEL FOLLETO INFORMATIVO-->
      <div id="contenedorFolletoInformativo">
        <h1 id="tituloFolletoInformativo">Folleto Informativo</h1>
      </div>
      <!--FIN DEL DIV FOLLETO INFORMATIVO-->

      <!--DISEÑO DEL FOLLETO INFORMATIVO-->
      <div id="contenedorLogoEmpresas">
        <h1 id="tituloNuestrasPaginas">Nuestras Paginas</h1>

        <div class="slider">
          <ul>
            <li>
                <a href="#">
                  <img src="../imagenes/footer/logo_alkes.png" alt="">
                </a>
            </li>   
            <li>
              <a href="">
                  <img src="../imagenes/footer/logo_fruttech.png"  alt="">
                </a>
            </li>
            <li>
              <a href="">
                  <img src="../imagenes/footer/logo_iec.png"  alt="">
                </a>
            </li>
            <li>
              <a href="">
                  <img src="../imagenes/footer/logo_Tkr.png"  alt="">
                </a>
            </li>
            <li>
              <a href="">
                  <img src="../imagenes/footer/logo_venfruca.png"  alt="">
                </a>
            </li>
          </ul>
        </div>

      </div>
      <!--FIN DEL DIV FOLLETO INFORMATIVO-->

      <div id="contenedorRedesSociales">
        <p id="tituloNuestrasRedesSociales">Nuestras Redes Sociales</p>

        <div id="contenedorLogoFacebook">
          <center>
            <img id="imagenFacebook" class="efectoRotarRedesSociales" src="../imagenes/footer/f.png" width="65">
          </center>
        </div>

        <div id="contenedorLogoInstagram">
          <center>
            <img id="imagenFacebook" class="efectoRotarRedesSociales" src="../imagenes/footer/instagram.png" width="65">
          </center>
        </div>

        <div id="contenedorLogoTwitter">
          <center>
            <img id="imagenFacebook" class="efectoRotarRedesSociales" src="../imagenes/footer/twitter.png" width="65">
          </center>
        </div>

      </div>
        
      <div id="contenedorDerechoAutor">
        <h3 id="derechoAutor">Copyright © 2018 Intranet Corporativa Rights Reserved. </h3>
      </div>

  </div>
  <!--FIN CONTENEDOR PIE DE PAGINA-->

</body>

</html>
          
         