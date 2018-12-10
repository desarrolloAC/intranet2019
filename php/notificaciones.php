<?php

    @session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/intranet/conexion/conexion.php';
    include $_SERVER["DOCUMENT_ROOT"].'/intranet/php/estadoPublicacion.php';
    include $_SERVER["DOCUMENT_ROOT"].'/intranet/php/estadosLogin.php';
    
	$conexion=conectar();

	$sql=" SELECT * FROM notificacion WHERE leido=0 ORDER BY ID_Notificacion DESC ";
								 
	$rs=mysql_query($sql,$conexion);

	while ($row=mysql_fetch_array($rs)) {

		 switch ($_SESSION['ID_Rol']) {
            case TypeUsuario::ADMINISTRADOR:
                 /*INGRESAR EL USUARIO COMO ADMINISTRADOR*/ 
	                switch ($row['Estado_Public']) {
				     	case EstadoPublicacion::RECHAZADO_A:
				     	      echo "<div id='contenedorNotificaciones'> 
				     	      			<a id='enlaceNotificaciones' href='#$row[ID_Publicacion]' onclick=''> $row[Mensaje]</a>
				     	      		</div>";
				     	    break;
				     	case EstadoPublicacion::RECHAZADO_E:
				     	      echo "<div id='contenedorNotificaciones'> 
				     	      			<a id='enlaceNotificaciones' href='#$row[ID_Publicacion]'> $row[Mensaje]</a>
				     	      		</div>";
				     		 break;
				     	case EstadoPublicacion::REVISION_E:
				     	     echo "<div id='contenedorNotificaciones'> 
				     	      			<a id='enlaceNotificaciones' href='#$row[ID_Publicacion]'> $row[Mensaje]</a>
				     	      		</div>";									     	    
				     	     break;
				     	case EstadoPublicacion::REVISION_A:
				     	      echo "<div id='contenedorNotificaciones'> 
				     	      			<a id='enlaceNotificaciones' href='#$row[ID_Publicacion]'> $row[Mensaje]</a>
				     	      		</div>";
				     		break;
				     	case EstadoPublicacion::PUBLICADA:
				     		  echo "<div id='contenedorNotificaciones'> 
				     	      			<a id='enlaceNotificaciones' href='#$row[ID_Publicacion]'> $row[Mensaje]</a>
				     	      		</div>";	
				     		break;
				     	default:// EstadoPublicacion::BORR:;  
				     	      
				     		break;
				    } //FIN SWITCH        
                break;
            case TypeUsuario::AUTORIZADOR:
		              /*INGRESAR EL USUARIO COMO AUTORIZADOR*/  
	                switch ($row['Estado_Public']) {
				     	case EstadoPublicacion::RECHAZADO_A:
				     	   	
				     		break;
				     	case EstadoPublicacion::RECHAZADO_E:
				     		 
				     		 break;
				     	case EstadoPublicacion::REVISION_E:
					            
				     		 break;
				     	case EstadoPublicacion::REVISION_A:
				              echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
					         break;
				     	case EstadoPublicacion::PUBLICADA:
				     	      echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
							 break;
				     	default:
				     		   	
				     		break;
				    } //FIN SWITCH       	
                break;
            case TypeUsuario::EDITOR:
                  /*INGRESAR EL USUARIO COMO EDITOR*/                       
            		switch ($row['Estado_Public']) {
				     	case EstadoPublicacion::RECHAZADO_A:
				     		  echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
				     		break;
				     	case EstadoPublicacion::RECHAZADO_E:					     	     
				     	 
				     		 break;
				     	case EstadoPublicacion::REVISION_E:
					          echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
					         break;
				     	case EstadoPublicacion::REVISION_A:
				     		 
				     		break;
				     	case EstadoPublicacion::PUBLICADA:
				     	      echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
				     		break;
				     	default:
				     		   
				     		break;
				    } //FIN SWITCH  EDITOR      	
                break; 
            case TypeUsuario::PUBLICADOR:
                /*INGRESAR EL USUARIO COMO EDITOR*/  
               		switch ($row['Estado_Public']) {
				     	case EstadoPublicacion::RECHAZADO_A:
				     		 
				     		break;
				     	case EstadoPublicacion::RECHAZADO_E:  
				     	      echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
				     		 break;
				     	case EstadoPublicacion::REVISION_E:
				     		 break;
				     	case EstadoPublicacion::REVISION_A:
				     		break;
				     	case EstadoPublicacion::PUBLICADA:
				     		   echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
				     		break;
				     	default:
					          
				     		break;
				    } //FIN SWITCH PUBLICADOR        
                break;                   
            default: //PUBLICADOR
                  					                           
                break;
        }//FIN DE SWITCH PRINCIPAL ROL
		 
	}
	mysql_free_result($rs);
?>
