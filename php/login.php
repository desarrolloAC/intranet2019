<?php

  session_start();
  require_once '../conexion/conexion.php';
  require_once 'estadosLogin.php';
  $conexion =conectar();

  //DECLARO LAS VARIABLES QUE AGARRA LOS VALORES DE LOS INPUT
  $Correo     = $_POST['txtCorreo'];
  $pass       = $_POST['txtPass'];
  
  $consulta="  SELECT     u.Cedula,u.Correo
               FROM       seguridad s
               RIGHT JOIN usuario u ON (s.CORREO=u.Correo)
               WHERE s.CORREO='$Correo' 
                 AND s.CLAVE=SHA1($pass) AND s.ESTATUS='A' ";

  // se comprueba si se obtuvieron resultados 
  // obtenemos los resultados con mysql_fetch_array
  // si no hay resultados devolverá NULL que al convertir a boleano para ser evaluado en el if será FALSE
  $rs = mysql_query($consulta,$conexion);

   if($row = mysql_fetch_array($rs))
   {
      @session_start();

      $_SESSION['Correo'] = $row["Correo"];
      $_SESSION['Cedula'] = $row["Cedula"];               
                    
      echo'<script language="javascript"> 
            location.href="../perfilesLogin.php";
          </script>';         
                                                 
    }else{        
    // Usuario incorrecto o no existe
      echo'<script language="javascript">        
             alert("Error: Usuario o contraseña incorrectos");
             location.href="../login.php";
           </script>';
    } //FIN DEL ELSE
    
    //LIBERAR EL BUFFER DE LA MEMORIA  
    mysql_free_result($rs); 
 ?>