<?php
  @session_start();
  /*require_once$_SERVER['DOCUMENT_ROOT'].'/intranet/conexion/conexion.php';*/
?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>	
<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<!--<script type="text/javascript" src="js/validarCkeditor.js"></script>-->
<script type="text/javascript" src="js/validar.js"></script>

<table id="tabla_categoria" border="1">
	<thead>
		 <tr id="titulo_columnas">
				<td width="50" height="50" colspan="2">
					<a href="#formulario_modal_categoria" id="btnRegistrarUsuario" title="Registar Categoría">
						<img src="imagenes/menu/botonesTablas/btnNuevo.png">
					</a>

					<!--INICIO DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
				   <div id="formulario_modal_categoria" class="contenedor_formulario">

					    <div id="formulario">

							<a href="#" class="cerrar">X</a>

							<!--INICIO DEL DISEÑO FORMULARIO CREAR USUARIO-->
						  <div class="contenedor_formulario_categoria">

								<form method="POST" action="php/registrarCategoria.php" name="form" id="form">
									<table id="tabla_formulario_categoria" border="0" cellpadding="7">
										<tr id="titulo_columna_formulario">
											<td colspan="2">
												<h1 id="titulo_registro_categoria">Registrar Categoría</h1>
											</td>
										</tr>
										<tr>
											<td>
												<h5 id="label_cajas_texto">Código Categoría</h5>
												<input type="text" id="caja_formulario_usuario" name="txtCodigoCategoria" maxlength="4" required>
											</td>
										</tr>
										<tr>
											<td>
												<h5 id="label_cajas_texto">Nombre Categoría</h5>
												<input type="text" id="caja_formulario_usuario" name="txtNombreCategoria" maxlength="60" required>
											</td>
										</tr>
										<tr>
											<td>
												<h5 id="label_cajas_texto">Descripcion Categoría</h5>
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
						<input type="text" name="txtBuscarCategoria" id="txtBuscarCategoria" placeholder="Buscar Por Nombre" maxlength="40">

						<button type="submit" name="btnBuscarCategoria" id="btnBuscarCategoria" title="Buscar una categoria">Buscar</button>
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
				<td width="100px">
					<h5>Acción</h5>
				</td>
		 </tr>
	</thead>
	<tbody>
					<?php
			            $conexion = conectar();			
						/*FIN DE LAS VARIABLES DE CONSULTA*/

						if(isset($_POST["txtBuscarCategoria"]))
						{

							$nombre  =	$_POST["txtBuscarCategoria"];
							$where   =  " where nombre like '%".$nombre."%'";			
						
							$consultaCategoria = mysql_query(" SELECT DISTINCT(cat.ID_Categoria) as codigo,
							                                          cat.nombre as nombre, 
							                                          cat.estatus as estatus,
							                                          cat.Created,
						                                              cat.CreatedBy,
						                                              cat.Updated,
						                                              cat.UpdatedBy,
						                                              cat.Descripcion
						                                         FROM categoria cat                                              
				                                                 $where 
				                                                 ORDER BY cat.ID_Categoria ", $conexion);
				           if(mysql_num_rows($consultaCategoria)==0)
							{
								$mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
							}
			            }else{
			                 $consultaCategoria = mysql_query(" SELECT DISTINCT(cat.ID_Categoria) as codigo,
							                                          cat.nombre as nombre, 
							                                          cat.estatus as estatus,
							                                          cat.Created,
						                                              cat.CreatedBy,
						                                              cat.Updated,
						                                              cat.UpdatedBy,
						                                              cat.Descripcion
						                                         FROM categoria cat                                              
				                                              
				                                               ORDER BY cat.ID_Categoria ", $conexion);
			            }
			            while($mostrarCategoria = mysql_fetch_array($consultaCategoria))
			            {
			        ?>
		 <tr id="datos_usuario">
				<td>
					<h5><?php echo $mostrarCategoria['codigo'];?></h5>
				</td>

				<td>
					<h5><?php echo $mostrarCategoria['nombre'];?></h5>
				</td>

				<td>
					<h5><?php 
	                        switch ($mostrarCategoria['estatus']) {
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
					<h5><?php echo $mostrarCategoria['Descripcion'];?></h5>
				</td>

				<td>
					<h5>
		            	<?php				                                      						 
								$query=" SELECT CONCAT(PNombre,' ', PApellido) as Nombre
								         FROM   usuario 
								         WHERE  Cedula='$mostrarCategoria[CreatedBy]' ";
								$rs=mysql_query($query,$conexion);
								$row = mysql_fetch_array($rs);
								echo  $row['Nombre'] ;						 									
								mysql_free_result($rs);					
						?>
				    </h5>
				</td>

				<td>
					<h5><?php echo $mostrarCategoria['Created'];?></h5>
				</td>

				<td>
					<h5>
		            	<?php				                                      						 
								$query=" SELECT CONCAT(PNombre,' ', PApellido) as Nombre
								         FROM   usuario 
								         WHERE  Cedula='$mostrarCategoria[UpdatedBy]' ";
								$rs=mysql_query($query,$conexion);
								$row = mysql_fetch_array($rs);
								echo  $row['Nombre'] ;						 									
								mysql_free_result($rs);					
						?>
				    </h5>
				</td>

				<td>
					<h5><?php echo $mostrarCategoria['Updated'];?></h5>
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
					<a href='#<?php echo $mostrarCategoria['codigo'];?>' id="btnEditar">
						<img src='imagenes/menu/botonesTablas/btnEditar.png'>
					</a>

					<div id='<?php echo $mostrarCategoria['codigo']; ?>' class='contenedor_formulario'>

						 <div id='formulario'>

							<a href='#' class='cerrar'>X</a>

							<div class='contenedor_formulario_categoria'>

								<form method='POST' action='php/actualizarCategoria.php'>

									<table id='tabla_formulario_categoria' border='0' cellpadding='7'>
										<tr id='titulo_columna_formulario'>
											<td colspan='2'>
												<h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
											</td>
										</tr>
										<tr>
											<td>
												<h5 id='label_cajas_texto'>Código</h5>
												<input type='text' id='caja_formulario_usuario' required name='txtCodigoCategoria' maxlength='4' readonly value='<?php echo $mostrarCategoria['codigo'] ?>'>
											</td>
                                        </tr>									
										<tr>
											<td>
												<h5 id='label_cajas_texto'>Categoria</h5>
												<input type='text' id='caja_formulario_usuario' required name='txtNombreCategoria' maxlength='20' value='<?php echo $mostrarCategoria['nombre'] ?>'>
											</td>
										</tr>
										<tr>
											<td>
												<h5 id='label_cajas_texto'>Descripción</h5>
												<input type='text' id='caja_formulario_usuario' required name='txtDesc' value='<?php echo $mostrarCategoria['Descripcion']; ?>'>
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
						if($mostrarCategoria['estatus'] == 'A')
						{
							echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoCategoria.php?codigo=$mostrarCategoria[codigo]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar' style='display: none;'>
								<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
							echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoCategoria.php?codigo=$mostrarCategoria[codigo]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar'>
								<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
						}
						else
						{
							echo"<a id='btnActivo'      name='btnActivo'      href='php/actualizarEstadoCategoria.php?codigo=$mostrarCategoria[codigo]&estatus=A&usuario=$_SESSION[Cedula]' title='Activar'>
								<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
							</a>";
							echo"<a id='btnDesactivado' name='btnDesactivado' href='php/actualizarEstadoCategoria.php?codigo=$mostrarCategoria[codigo]&estatus=D&usuario=$_SESSION[Cedula]' title='Desactivar' style='display: none;'>
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