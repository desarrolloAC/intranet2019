<?php
		@session_start();
		require_once('../conexion/conexion.php');
		require_once('estadosLogin.php');
		$conexion       = conectar();
		
		$codigo         = trim($_POST['txtCodigoCargo']);
		$nombre         = $_POST['txtNombreCargo'];
		$dpto           = $_POST['txtDep'];		
		$descripcion    = $_POST['txtDesc'];
 

		//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA
		$consulta = mysql_query("SELECT * FROM cargo WHERE ID_Cargo ='$codigo'");
		$vcodigo = mysql_num_rows($consulta);  

	    if(!empty($vcodigo)){ 
	    
		switch ($_SESSION['ID_Rol']) {
	        case TypeUsuario::ADMINISTRADOR:
	                                    
	            echo'<script language="javascript">  
	                    alert("El Código: '.$codigo.' Ya Existe. Ingrese uno Diferente. ");      
	                    location.href="../menuAdministrador.php";
	                 </script>';
	            break;
	         case TypeUsuario::AUTORIZADOR:
	                               
	            echo'<script language="javascript">        
	                alert("El Código: '.$codigo.' Ya Existe. Ingrese uno Diferente. "); 
	                 location.href="../menuAutorizador.php";
	                 </script>';
	            break;
	         case TypeUsuario::EDITOR:
	                                  
	            echo'<script language="javascript">        
	                 alert("El Código: '.$codigo.' Ya Existe. Ingrese uno Diferente. "); 
	                 location.href="../menuEditor.php";
	                 </script>';
	            break;
	         case TypeUsuario::PUBLICADOR:
	              
	            echo'<script language="javascript">        
	                 alert("El Código: '.$codigo.' Ya Existe. Ingrese uno Diferente. "); 
	                 location.href="../menuPublicador.php";
	            </script>';
	            break;                    
	        default: //LECTOR
	               
	            break;
	    } 
	  
		}
		else{
		  
		   $query = " INSERT INTO cargo 
		              VALUES      ('$codigo','$dpto','$nombre',DEFAULT,NOW(),'$_SESSION[Cedula]',NOW(),'$_SESSION[Cedula]','$descripcion')";

		   $agregarcargo = mysql_query ($query,$conexion);
		   

		   switch ($_SESSION['ID_Rol']) {
		        case TypeUsuario::ADMINISTRADOR:
		                                 
		            echo'<script language="javascript">        
		                 alert("Registro Creado con éxito");
		                 location.href="../menuAdministrador.php";
		                 </script>';
		            break;
		         case TypeUsuario::AUTORIZADOR:
		                                  
		            echo'<script language="javascript">        
		                 alert("Registro Creado con éxito"); 
		                 location.href="../menuAutorizador.php";
		                 </script>';
		            break;
		         case TypeUsuario::EDITOR:
		                                   
		            echo'<script language="javascript">        
		                 alert("Registro Creado con éxito"); 
		                 location.href="../menuEditor.php";
		                 </script>';
		            break;
		         case TypeUsuario::PUBLICADOR:
		              
		            echo'<script language="javascript">        
		                  alert("Registro Creado con éxito");
		                 location.href="../menuPublicador.php";
		            </script>';
		            break;                    
		        default: //LECTOR
		              
		            break;
		    }  
		}
  
?>