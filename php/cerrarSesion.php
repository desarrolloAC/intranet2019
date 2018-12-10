<?php

 @session_start();

 //DESTRUYE LA SESION QUE HABIA INICIADO QUITAN LOS COOKIES TEMPORALES
 session_destroy();

 echo'<script language="javascript">        
         alert("Cerrando la sesion");
         location.href="../login.php";
  </script>';

?>