<?php
  @session_start();
  /*include $_SERVER['DOCUMENT_ROOT'].'/intranet/conexion/conexion.php';*/
?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>	
<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<!--<script type="text/javascript" src="js/validarCkeditor.js"></script>-->
<script type="text/javascript" src="js/validar.js"></script>

<table id="tabla_cargo" border="1">
	<thead>
		 <tr id="titulo_columnas">
				<td width="50" height="50" colspan="2">
					<a href="#formulario_modal_cargo" id="btnRegistrarUsuario" title="Registar Cargo">
						<img src="imagenes/menu/botonesTablas/btnNuevo.png">
					</a>

					<!--INICIO DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
				   <div id="formulario_modal_cargo" class="contenedor_formulario">

					    <div id="formulario">

							<a href="#" class="cerrar">X</a>

							<!--INICIO DEL DISEÑO FORMULARIO CREAR USUARIO-->
						  <div class="contenedor_formulario_cargo">

								<form method="POST" action="php/registrarCargo.php" name="form" id="form">
									<table id="tabla_formulario_categoria" border="0" cellpadding="7">
										<tr id="titulo_columna_formulario">
											<td colspan="2">
												<h1 id="titulo_registro_categoria">Registrar Cargo</h1>
											</td>
										</tr>
										<tr>
											<td>
												<h5 id="label_cajas_texto">Código Cargo</h5>
												<input type="text" id="caja_formulario_usuario" name="txtCodigoCargo" maxlength="4" required>
											</td>
										</tr>
										<tr>
											<td>
												<h5 id="label_cajas_texto">Nombre Cargo</h5>
												<input type="text" id="caja_formulario_usuario" name="txtNombreCargo" maxlength="60" required>
											</td>
										</tr>
										<tr>
											<td>
												<?php
										            $conexion = conectar();										            
										            $sqldpto = mysql_query(" SELECT ID_Departamento,Nombre FROM departamento WHERE estatus = 'A' ", $conexion);		            
									        	?>
												    <h5 id="label_cajas_texto">Departamento</h5>
												    <select id="combos_formulario_usuario" name="txtDep" required >
													    <option value=""></option>
												<?php
											        		while($mostdpto = mysql_fetch_array($sqldpto))
											        		{
											        			echo'<option value='.$mostdpto['ID_Departamento'].'>'.$mostdpto['Nombre'].'</option>';
											        		}//FIN DEL WHILE
											    ?>
												    </select>
											</td>
										</tr>			
										<tr>
											<td>
												<h5 id="label_cajas_texto">Descripcion Cargo</h5>
												<input type="text" id="caja_formulario_usuario" id="caja_formulario_usuario" name="txtDesc"  required>

											</td>
										</tr>													
										<tr>
											<td colspan="2">
												<input type="submit" name="btnRegistrar" id="btnRegistrar" value="Registrar">
											</td> 
										</tr>
									</table>
								</form>											
						  </div>
							<!--FIN DEL DISEÑO FORMULARIO CREAR USUARIO-->
						</div>
						<!--FIN DIV FORMULARIO-->
					</div>
					<!--FIN DEL CONTENEDOR FORMULARIO USUARIO MODAL-->	
				</td>						
				<td colspan="12">					
					<form method="POST">
						<input type="text" name="txtBuscarCargo" id="txtBuscarCargo" placeholder="Buscar Por Nombre" maxlength="40">

						<button type="submit" name="btnBuscarCargo" id="btnBuscarCargo" title="Buscar un cargo">Buscar</button>
					</form>
				</td>
		 </tr>
		 <tr id="titulo_columnas">
				<td width="800px">
					<h5>Código</h5>
				</td>
				<td width="800px">
					<h5>Nombre</h5>
				</td>			
				<td width="800px">
					<h5>Estatus</h5>
				</td>
				<td width="800px">
					<h5>Descripción</h5>
				</td>		
				<td width="800px">
					<h5>Creada Por</h5>
				</td>
				<td width="800px">
					<h5>Fecha Creación</h5>
				</td>
				<td width="800px">
					<h5>Actualizada Por</h5>
				</td>
				<td width="800px">
					<h5>Fecha Actualización</h5>
				</td>
				<td width="0px">
					<h5></h5>
				</td>
				<td width="0px">
					<h5></h5>
				</td>
				<td width="0px">
					<h5></h5>
				</td>
				<td width="0px">
					<h5></h5>
				</td>
				<td width="800px">
					<h5>Edición</h5>
				</td>			
				<td width="400px">
					<h5>Acción</h5>
				</td>
		 </tr>
	</thead>
	<tbody>
					<?php
			            $conexion = conectar();			
						/*FIN DE LAS VARIABLES DE CONSULTA*/

						if(isset($_POST["txtBuscarCargo"]))
						{

							$nombre  =	$_POST["txtBuscarCargo"];
							$where   =  " where nombre like '%".$nombre."%'";			
						
							$consultaCargo = mysql_query(" SELECT DISTINCT(car.ID_Cargo) as codigo,
							                                          car.nombre as nombre, 
							                                          car.estatus as estatus,
							                                          car.Created,
						                                              car.CreatedBy,
						                                              car.Updated,
						                                              car.UpdatedBy,
						                                              car.Descripcion
						                                         FROM cargo car                                              
				                                                 $where 
				                                                 ORDER BY car.ID_Cargo ", $conexion);
				           if(mysql_num_rows($consultaCargo)==0)
							{
								$mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
							}
			            }else{
			                 $consultaCargo = mysql_query(" SELECT DISTINCT(car.ID_Cargo) as codigo,
							                                          car.nombre as nombre, 
							                                          car.estatus as estatus,
							                                          car.Created,
						                                              car.CreatedBy,
						                                              car.Updated,
						                                              car.UpdatedBy,
						                                              car.Descripcion
						                                         FROM cargo car                                              
				                                              
				                                               ORDER BY car.ID_Cargo ", $conexion);
			            }
			            while($mostrarCargo = mysql_fetch_array($consultaCargo))
			            {
			        ?>
		 <tr id="datos_usuario">
				<td>
					<h5><?php echo $mostrarCargo['codigo'];?></h5>
				</td>

				<td>
					<h5><?php echo $mostrarCargo['nombre'];?></h5>
				</td>

				<td>
					<h5><?php 
	                        switch ($mostrarCargo['estatus']) {
	                        	case 'A':
	                        		echo "ACTIVA";
	                        		break;                        	
	                        	default:
	                        		echo "INACTIVA";
	                        		break;
	                         }

					       ?>				       
					</h5>
				</td>

				<td>
					<h5><?php echo $mostrarCargo['Descripcion'];?></h5>
				</td>

				<td>
					<h5>
		            	<?php				                                      						 
								$query=" SELECT CONCAT(PNombre,' ', PApellido) as Nombre
								         FROM   usuario 
								         WHERE  Cedula='$mostrarCargo[CreatedBy]' ";
								$rs=mysql_query($query,$conexion);
								$row = mysql_fetch_array($rs);
								echo  $row['Nombre'] ;						 									
								mysql_free_result($rs);					
						?>
				    </h5>
				</td>

				<td>
					<h5><?php echo $mostrarCargo['Created'];?></h5>
				</td>

				<td>
					<h5>
		            	<?php				                                      						 
								$query=" SELECT CONCAT(PNombre,' ', PApellido) as Nombre
								         FROM   usuario 
								         WHERE  Cedula='$mostrarCargo[UpdatedBy]' ";
								$rs=mysql_query($query,$conexion);
								$row = mysql_fetch_array($rs);
								echo  $row['Nombre'] ;						 									
								mysql_free_result($rs);					
						?>
				    </h5>
				</td>

				<td>
					<h5><?php echo $mostrarCargo['Updated'];?></h5>
				</td>

				<td>
					<h5></h5>
				</td>

	            <td>
					<h5></h5>
				</td>

				<td>
					<h5></h5>
				</td>

				<td>
					<h5></h5>
				</td>

				<td>					
					<a href='#<?php echo $mostrarCargo['codigo'];?>' id="btnEditar">
						<img src='imagenes/menu/botonesTablas/btnEditar.png'>
					</a>

					<div id='<?php echo $mostrarCargo['codigo']; ?>' class='contenedor_formulario'>

						 <div id='formulario'>

							<a href='#' class='cerrar'>X</a>

							<div class='contenedor_formulario_categoria'>

								<form method='POST' action='php/actualizarCargo.php'>

									<table id='tabla_formulario_categoria' border='0' cellpadding='7'>
										<tr id='titulo_columna_formulario'>
											<td colspan='2'>
												<h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
											</td>
										</tr>
										<tr>
											<td>
												<h5 id='label_cajas_texto'>Código</h5>
												<input type='text' id='caja_formulario_usuario' required name='txtCodigo' maxlength='4' readonly value='<?php echo $mostrarCargo['codigo'] ?>'>
											</td>
                                        </tr>									
										<tr>
											<td>
												<h5 id='label_cajas_texto'>Nombre Del Cargo</h5>
												<input type='text' id='caja_formulario_usuario' required name='txtNombre' maxlength='100' value='<?php echo $mostrarCargo['nombre'] ?>'>
											</td>
										</tr>
										<tr>
											<td>
												<?php
										            $conexion = conectar();										            
										            $sqldpto = mysql_query(" SELECT ID_Departamento,Nombre FROM departamento WHERE estatus = 'A' ", $conexion);		            
									        	?>
												    <h5 id="label_cajas_texto">Departamento</h5>
												    <select id="combos_formulario_usuario" name="txtDep" required >
													    <option value=""></option>
												<?php
											        		while($mostdpto = mysql_fetch_array($sqldpto))
											        		{
											        			echo'<option value='.$mostdpto['ID_Departamento'].'>'.$mostdpto['Nombre'].'</option>';
											        		}//FIN DEL WHILE
											    ?>
												    </select>
											</td>
										</tr>					
										<tr>
											<td>
												<h5 id='label_cajas_texto'>Descripción</h5>
												<input type='text' id='caja_formulario_usuario' required name='txtDesc' value='<?php echo $mostrarCargo['Descripcion']; ?>'>
											</td>
										</tr>									
										<tr>
											<td colspan='2'>
												<input type='submit' name='btnActualizar' id='btnRegistrar' value='Actualizar'>
											</td>
										</tr>
									</table>
								</form>
							 </div>
						 </div>
					</div>														
				</td>

				<td width="70px;">
					<?php
						if($mostrarCargo['estatus'] == 'A')
						{
							echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoCargo.php?codigo=$mostrarCargo[codigo]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar' style='display: none;'>
								<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
							echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoCargo.php?codigo=$mostrarCargo[codigo]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar'>
								<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
						}
						else
						{
							echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoCargo.php?codigo=$mostrarCargo[codigo]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar'>
								<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
							echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoCargo.php?codigo=$mostrarCargo[codigo]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar' style='display: none;'>
								<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
						}
					?>
				</td>
		 </tr>
	 <?php } ?><!--FIN DEL WHILE-->
	</tbody>    
</table>	
 <?php
    if (isset($mensajeError)) {
    	 echo $mensajeError;
    }       
 ?>		