<?php

    @session_start();

    require_once('../conexion/conexion.php');
    require_once('estadosLogin.php');    
	$conexion =  conectar();

	$id_publicacion		= $_GET['codigo'];
    $usuario            = $_GET['usuario'];
	 
	if (isset($_GET['estatus'])) {
	       $estatus = $_GET['estatus'];                
	         
	            $updEstado = " UPDATE  subcategoria 
	                              SET  Estatus         ='$estatus',
	                                   UpdatedBy       ='$usuario',
	                                   Updated         = now() 
	                            WHERE  ID_Subcategoria    ='$id_publicacion'"; 
	}	
      
      mysql_query($updEstado,$conexion);

    switch ($_SESSION['ID_Rol']) {
        case TypeUsuario::ADMINISTRADOR:
                                    
            echo'<script language="javascript">        
                 alert("Registro Actualizado Con Exito");
                 location.href="../menuAdministrador.php";
                 </script>';
            break;
         case TypeUsuario::AUTORIZADOR:
                                 
            echo'<script language="javascript">        
                 alert("Registro Actualizado Con Exito");
                 location.href="../menuAutorizador.php";
                 </script>';
            break;
         case TypeUsuario::EDITOR:
                                 
            echo'<script language="javascript">        
                 alert("Registro Actualizado Con Exito");
                 location.href="../menuEditor.php";
                 </script>';
            break;
         case TypeUsuario::PUBLICADOR:
             
            echo'<script language="javascript">        
                 alert("Registro Actualizado Con Exito");
                 location.href="../menuPublicador.php";
            </script>';
            break;                    
        default: //LECTOR
                
            break;
    } 
?>