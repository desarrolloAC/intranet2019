<?php
		@session_start();
		require_once('../conexion/conexion.php');
		require_once('estadosLogin.php');

		$conexion       = conectar();
			//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA
             $cedula            = $_POST['txtCedula'];
             $createdBy 	    = $_SESSION['Cedula'];
             $error             = $_FILES['btnImagen']['error'];
			 $foto              = $_FILES['btnImagen']['name'];
			 $type              = $_FILES['btnImagen']['type'];
			 $date              = date("Y-m-d_His");// date('Y-m-d i:m:s');
			 $ruta              = $_FILES['btnImagen']['tmp_name'];			
			 $destino_temp      = '/intranet/imagenes/fotoPublicaciones/'.$date.strstr($foto,'.');
			 $destino           = $_SERVER['DOCUMENT_ROOT'].$destino_temp;
			 $organizacion      = $_SESSION['ID_Organizacion'];
			 
			 $consulta = mysql_query(" SELECT * FROM usuario WHERE cedula ='$cedula'",$conexion);
			 $codigo  = mysql_num_rows($consulta);
					 

		if(!empty($codigo)){ 
		    
			switch ($_SESSION['ID_Rol']) {
		        case TypeUsuario::ADMINISTRADOR:
		                                    
		            echo'<script language="javascript">  
		                    alert("La Cédula N°:  '.$cedula.' Ya Existe. Ingrese una Diferente. ");      
		                    location.href="../menuAdministrador.php";
		                 </script>';
		            break;
		         case TypeUsuario::AUTORIZADOR:
		                               
		            echo'<script language="javascript">        
		                alert("La Cédula N°:  '.$cedula.' Ya Existe. Ingrese una Diferente. "); 
		                 location.href="../menuAutorizador.php";
		                 </script>';
		            break;
		         case TypeUsuario::EDITOR:
		                                  
		            echo'<script language="javascript">        
		                 alert("La Cédula N°:  '.$cedula.' Ya Existe. Ingrese una Diferente. "); 
		                 location.href="../menuEditor.php";
		                 </script>';
		            break;
		         case TypeUsuario::PUBLICADOR:
		              
		            echo'<script language="javascript">        
		                 alert("La Cédula N°:  '.$cedula.' Ya Existe. Ingrese una Diferente. "); 
		                 location.href="../menuPublicador.php";
		            </script>';
		            break;                    
		        default: //LECTOR
		               
		            break;
		    } 

		}
		else{                     
                 
                   if($error){
					switch($error)
					{
						case 1: // UPLOAD_ERR_INI_SIZE
						echo "El tamaño del archivo supera el límite permitido
						por el servidor (argumento upload_max_filesize del archivo
						php.ini).";
						break;
						case 2: // UPLOAD_ERR_FORM_SIZE
						echo " El tamaño del archivo supera el límite permitido
						por el formulario (argumento post_max_size del archivo php.ini).";
						break;
						case 3: // UPLOAD_ERR_PARTIAL
						echo "El envío del archivo se ha interrumpido durante
						la transferencia.";
						break;
						case 4: // UPLOAD_ERR_NO_FILE
						echo "El tamaño del archivo que ha enviado es nulo.";
						break;
					}//FIN DEL SWITCH CASE if($error)
				}//FIN DEL IF if($error)
				else{
					//si no hay error entonces $_FILES[’nombre del_archivo’][’error’] es 0
					if ((isset($foto) && ($error == UPLOAD_ERR_OK))) 
					{				    
						copy($ruta,$destino); 
						
				    }//FIN DEL If de UPLOAD_ERR_OK
				    else
				    {
					   echo "El archivo no se ha podido copiar en el directorio.";     
				    }//FIN DEL If de UPLOAD_ERR_OK
			    }//FIN DEL ELSE ($error)
		            if(array_key_exists("btnRegistrar",$_POST)){
                    foreach ($_POST as $key => $value) 						 	 
					 ${$key}=$value;

			    	 	


		    	 	 	 $sql1 =" INSERT INTO seguridad VALUES (NULL,'$txtCorreo',DEFAULT, SHA1('$clave1'),'$pre', '$res'); ";
	                     mysql_query($sql1,$conexion)or die(mysql_error());
                         mysql_query("COMMIT");
                          
						 $sql2=" INSERT INTO usuario (Cedula, ID_Cargo, ID_Pais, ID_Estado, ID_Municipio, ID_Parroquia,
						                     ID_Ciudad, PNombre, SNombre, PApellido, SApellido, Correo,Telefono, Sexo, Direccion,
						                     Estatus, Foto, Created, CreatedBy, Updated, UpdatedBy) 
						              VALUES ('$txtCedula', '$txtCargo', '$pai', '$edo', '$mun', '$par', '$ciu', 
						              '$txtpNombre', '$txtsNombre', '$txtpApellido', '$txtsApellido', '$txtCorreo',
						               '$txttelefono','$cbSexo', '$dir', DEFAULT, '$destino_temp', CURRENT_TIMESTAMP, '$createdBy', 
						              CURRENT_TIMESTAMP, '$createdBy'); ";

						 mysql_query($sql2,$conexion)or die(mysql_error());
						 $q2=mysql_affected_rows();
						 	 mysql_query("COMMIT");
						 
					  if ($q2>0) {	
                        $sql3=" INSERT INTO org_usuario_rol (ID_Organizacion, ID_Rol, Cedula, Estatus, Created, CreatedBy, Updated, UpdatedBy) 
						         VALUES ('$organizacion', '$rol', '$txtCedula', DEFAULT, CURRENT_TIMESTAMP, '$createdBy', CURRENT_TIMESTAMP, '$createdBy');";
                     
                        mysql_query($sql3,$conexion) or die(mysql_error());
 						$q3=mysql_affected_rows();
 					   }
					 if ($q3>0) {	
							switch ($_SESSION['ID_Rol']) {
					         case TypeUsuario::ADMINISTRADOR:
					                                 
					            echo'<script language="javascript">        
					                 alert("Usuario Creado con Éxito.");
					                 location.href="../menuAdministrador.php";
					                 </script>';
					            break;
					         case TypeUsuario::AUTORIZADOR:
					                                  
					            echo'<script language="javascript">        
					                 alert("Usuario Creado con Éxito."); 
					                 location.href="../menuAutorizador.php";
					                 </script>';
					            break;
					         case TypeUsuario::EDITOR:
					                                   
					            echo'<script language="javascript">        
					                 alert("Usuario Creado con Éxito."); 
					                 location.href="../menuEditor.php";
					                 </script>';
					            break;
					         case TypeUsuario::PUBLICADOR:
					              
					            echo'<script language="javascript">        
					                  alert("Usuario Creado con Éxito.");
					                 location.href="../menuPublicador.php";
					                </script>';
					            break;                    
					         default: //LECTOR
					              
					            break;
					       } // fin del switch switch ($_SESSION
					   }                        
						
			       }

			}  
       
   ?>
 