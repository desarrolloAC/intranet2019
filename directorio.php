
<?php
 

 
  error_reporting(0);
 

 
  include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';
 

 
  $conexion = conectar();
 

 
  if(isset($_POST["btnBuscarDirectorio"]))
 
  {
 

 
    $nombre  =  $_POST["txtBuscarDirectorio"];
 
    $where   =  " where nc like '%".$nombre."%' AND us.Estatus = 'A'";
 

 
    $consultaDepartamento = mysql_query("SELECT  us.foto,
 
                  CONCAT(us.PNombre,' ',us.SNombre,' ',us.PApellido,' ',us.SApellido) AS nc,
 
                  us.Correo,
 
                  us.Telefono,
 
                  us.Sexo,
 
                  us.Direccion,
 
                  car.Nombre,
 
                  dpto.Nombre,
 
                  org.Nombre
 
                FROM usuario us
 
                RIGHT JOIN cargo car ON car.ID_Cargo = us.ID_Cargo
 
                RIGHT JOIN departamento dpto ON dpto.ID_Departamento = car.ID_Departamento
 
                RIGHT JOIN organizacion org ON org.ID_Organizacion = dpto.ID_Organizacion
 
                                $where ORDER BY us.Cedula ", $conexion);
 
       if(mysql_num_rows($consultaDepartamento)==0)
 
    {
 
      $mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
 
    }
 
    }else{
 
         $consultaDepartamento = mysql_query("SELECT us.foto AS foto,
 
                        CONCAT(us.PNombre,' ',us.SNombre,' ',us.PApellido,' ',us.SApellido) AS nc,
 
                        us.Correo,
 
                        us.Telefono,
 
                        us.Sexo,
 
+
                        us.Direccion,
 
                        car.Nombre AS cargo,
 
                        dpto.Nombre AS departamento,
 
                        org.Nombre AS organizacion
 
                      FROM usuario us
 
                      RIGHT JOIN cargo car ON car.ID_Cargo = us.ID_Cargo
 
                      RIGHT JOIN departamento dpto ON dpto.ID_Departamento = car.ID_Departamento
 
                      RIGHT JOIN organizacion org ON org.ID_Organizacion = dpto.ID_Organizacion
 
                      WHERE us.Estatus = 'A'
 
                    ORDER BY us.Cedula", $conexion);
 
    }
 

 
?>
 
<!DOCTYPE html>
 

 
<html>
 

 
<head>
 
  <title>Intranet Alkes Corp, S.A</title>
 

 
  <meta name="viewport" content="width=device-width,device-height initial-scale=1.5"/>
 
  <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
 
  <meta charset="utf-8">
 

 
    <link rel="stylesheet" type="text/css" href="css/directorio/directorio.css" media="screen">
 

 
    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all"/>
 
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all"/>
 
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all"/>
 

 

 
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
 
                    <form method="POST" action="">
 
                        <input type="text" name="txtBuscarDirectorio" id="txtBuscarDirectorio" placeholder="Buscar Usuario">
 
                        <button type="submit" name="btnBuscarDirectorio" id="btnBuscarDirectorio">Buscar</button>
 
                    </form>
 
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
 
                    <h5>Sexo</h5>
 
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
 
            <?php
 
            while($mostrarDirectorio = mysql_fetch_array($consultaDepartamento))
 
            {
 
            ?>
 
            <tr id="color_datos">
 
                <td>
 
                    <h5>
 
                        <img id="imagenDirectorio" src="<?php echo $mostrarDirectorio[foto];?>">
 
                    </h5>
 
                </td>
 
                <td>
 
                    <h5><?php echo $mostrarDirectorio['nc']; ?></h5>
 
                </td>
 
                <td>
 
                    <h5><?php echo $mostrarDirectorio['Sexo']; ?></h5>
 
                </td>
 
                <td>
 
                    <h5><?php echo $mostrarDirectorio['organizacion']; ?></h5>
 
                </td>
 
                <td>
 
                    <h5><?php echo $mostrarDirectorio['departamento']; ?></h5>
 
                </td>
 
                <td>
 
                    <h5><?php echo $mostrarDirectorio['cargo']; ?></h5>
 
                </td>
 
                <td>
 
                    <h5><?php echo $mostrarDirectorio['Telefono']; ?></h5>
 
                </td>
 
                <td>
 
                    <h5><?php echo $mostrarDirectorio['Correo']; ?></h5>
 
                </td>
 
                <td>
 
                    <h5><?php echo $mostrarDirectorio['Direccion']; ?></h5>
 
                </td>
 
            </tr>
 
            <?php
 
             }
 
             ?>
 
        </table>
 

 
    </div>
 
    <!--FIN DEL DISEÑO CONTENEDOR TABLA DIRECTORIO-->
 

 
</main>
 
<!--FIN CONTENEDOR DE CONTENIDOS-->
 

 
</body>
 

 
</html>
 
 
