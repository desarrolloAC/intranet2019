
<?php
		@session_start();
		require_once('../conexion/conexion.php');
		$conexion = conectar();			 
?>

<table id="tabla_directorio" border="1">
	<thead>
		<tr id="titulo_columnas">
			<td width="50" height="50" colspan="2">
				<a href="#formulario_modal_directorio" id="btnRegistrarUsuario" title="Registar un usuario">
					<img src="imagenes/menu/botonesTablas/btnNuevo.png">
				</a>

				<!--INICIO DEL CONTENEDOR FORMULARIO USUARIO MODAL-->
				<div id="formulario_modal_directorio" class="contenedor_formulario">

					<div id="formulario">

						<a href="#" class="cerrar">X</a>

						<!--INICIO DEL DISEÑO FORMULARIO CREAR USUARIO-->
						<div class="contenedor_formulario_directorio">

							<form method="POST" enctype="multipart/form-data" action="opcionDirectorio/registrarDirectorio.php">

								<table id="tabla_formulario_directorio" border="0" cellpadding="7">
									<tr id="titulo_columna_formulario">
										<td colspan="2">
											<h1 id="titulo_registro_directorio">Registro Al Directorio</h1>
										</td>
									</tr>
									<tr>
										<td>
											<h5 id="label_cajas_texto">Cédula</h5>
											<input type="text" id="caja_formulario_usuario" name="txtCedula" maxlength="8" required>
										</td>

										<td>
											<h5 id="label_cajas_texto" >Sexo</h5>
											<select id="combos_formulario_usuario" name="cbSexo" required>
												<option value="">Seleccione</option>
												<option value="Femenino">Femenino</option>
												<option value="Masculino">Masculino</option>
											</select>	
										</td>
									</tr>
									<tr>
										<td>
											<h5 id="label_cajas_texto" >Primer Nombre</h5>
											<input type="text" id="caja_formulario_usuario" name="txtpNombre" maxlength="40" required>
										</td>

										<td>
											<h5 id="label_cajas_texto" >Primer Apellido</h5>	
											<input type="text" id="caja_formulario_usuario" name="txtpApellido" maxlength="40" required>
										</td>				
									</tr>
									<tr>
										<td>
											<h5 id="label_cajas_texto" >Segundo Nombre</h5>
											<input type="text" id="caja_formulario_usuario" maxlength="40" name="txtsNombre">		
										</td>

										<td>
											<h5 id="label_cajas_texto" >Segundo Apellido</h5>
											<input type="text" id="caja_formulario_usuario" maxlength="40" name="txtsApellido">	
										</td>
									</tr>
									<tr>
										<td>
											<?php									            								            
									            $sqlOrganizacion = mysql_query("SELECT *FROM organizacion", $conexion);		            
								        	?>
											<h5 id="label_cajas_texto" >Organización</h5>
											<select id="combos_formulario_usuario" name="cbOrganizacion" required>
												<option value="">Seleccione</option>
												<?php
									        		while($mostrarOrganizacion = mysql_fetch_array($sqlOrganizacion))
									        		{
									        			echo'<option value='.$mostrarOrganizacion['codigoOrganizacion'].'>'.$mostrarOrganizacion['nombreOrganizacion'].'</option>';
									        		}//FIN DEL WHILE
									        	?>
											</select>
										</td>

										<td>
											<?php                                             								            
									            $sqlDepartamento = mysql_query("SELECT *FROM departamento", $conexion);		            
								        	?>
											<h5 id="label_cajas_texto">Departamento</h5>
											<select id="combos_formulario_usuario" name="cbDepartamento" required>
												<option value="">Seleccione</option>
												<?php
									        		while($mostrarDepartamento = mysql_fetch_array($sqlDepartamento))
									        		{
									        			echo'<option value='.$mostrarDepartamento['codigoDepartamento'].'>'.$mostrarDepartamento['nombreDepartamento'].'</option>';
									        		}//FIN DEL WHILE
									        	?>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<?php

									            error_reporting(0);

									            $conexion = mysql_connect('localhost','root','') or die(mysql_error());

									            mysql_select_db('intranet',$conexion);
									            
									            $sqlCargo = mysql_query("SELECT *FROM cargo", $conexion);		            
								        	?>
											<h5 id="label_cajas_texto">Cargo</h5>
											<select id="combos_formulario_usuario" name="cbCargo" required>
												<option value="">Seleccione</option>
												<?php
									        		while($mostrarCargo = mysql_fetch_array($sqlCargo))
									        		{
									        			echo'<option value='.$mostrarCargo['codigoCargo'].'>'.$mostrarCargo['nombreCargo'].'</option>';
									        		}//FIN DEL WHILE
									        	?>
											</select>
										</td>
										<td>
											<h5 id="label_cajas_texto" >Correo</h5>
											<input type="text" id="caja_formulario_usuario" maxlength="200" name="txtCorreo" required>
										</td>
									</tr>
									<tr>
										<td>
											<h5 id="label_cajas_texto">Telefono</h5>						
											<input type="text" id="caja_formulario_usuario" name="txtTelefono" maxlength="11" required>
										</td>											
								         <td id="color_fondo_cajas">
								         	<h5 id="label_cajas_texto">Subir Imagen</h5>
									        <input type="file" name="btnImagen" id="btnImage">
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
			<td colspan="12">					
				<form method="POST">
					<input type="text" name="txtBuscarDirectorio" id="txtBuscarUsuario" placeholder="Buscar Nombre" maxlength="40">

					<button type="submit" name="btnBuscarUsuario" id="btnBuscarUsuario" title="Buscar un usuario">Buscar</button>
				</form>
			</td>				
		</tr>
		<tr id="titulo_columnas">
			<td width="10px">
				<h5>Cédula</h5>
			</td>

			<td width="800px">
				<h5>Primer Nombre</h5>
			</td>

			<td width="800px">
				<h5>Primer Apellido</h5>
			</td>

			<td width="800px">
				<h5>Segundo Nombre</h5>
			</td>

			<td width="800px">
				<h5>Segundo Apellido</h5>
			</td>

			<td width="200px">
				<h5>Sexo</h5>
			</td>

			<td width="100px">
				<h5>Organización</h5>
			</td>

			<td width="700px">
				<h5>Departamento</h5>
			</td>

			<td width="100px">
				<h5>Cargo</h5>
			</td>

			<td width="100px">
				<h5>Correo</h5>
			</td>

			<td width="100px">
				<h5>Telefono</h5>
			</td>

			<td width="100px">
				<h5>Foto</h5>
			</td>

			<td width="100px" colspan="2">
				<h5>Acción</h5>
			</td>
		</tr>
	</thead>
	<tbody>
		<?php

           	error_reporting(0);

            $conexion = mysql_connect('localhost','root','') or die(mysql_error());

            mysql_select_db('intranet',$conexion);

             /*VARIABLES DE CONSULTAS*/
			$where 			=	"";
			$nombre 		=	$_POST["txtBuscarDirectorio"];
			/*FIN DE LAS VARIABLES DE CONSULTA*/

			if(isset($_POST["txtBuscarDirectorio"]))
			{
				$where = "where pNombre like '".$nombre."%'";
			}
			
			$consultaDirectorio = mysql_query("SELECT *FROM directorio $where", $conexion);

            mysql_query($consultaDirectorio);

			if(mysql_num_rows($consultaDirectorio)==0)
			{
				$mensajeError = "<h1 id='mensaje_error'style='color: rgb(69,69,69); text-aling: center;'>No existen registros que coincidan con su criterio de busqueda.</h1>";
			}
            
            while($mostrarDirectorio = mysql_fetch_array($consultaDirectorio))
            {
        ?>
		<tr id="datos_usuario">
			<td>
				<h5><?php echo $mostrarDirectorio['cedula'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['pNombre'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['pApellido'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['sNombre'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['sApellido'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['sexo'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['organizacion'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['departamento'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['cargo'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['correo'];?></h5>
			</td>

			<td>
				<h5><?php echo $mostrarDirectorio['telefono'];?></h5>
			</td >

			<td>
				<h5><img src="<?php echo $mostrarDirectorio[foto];?>" id="imagen" width='30' height='30'></h5>
			</td>

			<td>					
			<?php echo"
			<a href='#$mostrarDirectorio[cedula]' id='btnEditar'>
				<img src='imagenes/menu/botonesTablas/btnEditar.png'>
			</a>

			<div id='$mostrarDirectorio[cedula]' class='contenedor_formulario'>

				<div id='formulario'>

					<a href='#' class='cerrar'>X</a>

					<div class='contenedor_formulario_directorio'>

						<form method='POST' action='opcionDirectorio/actualizarDirectorio.php'>

							<table id='tabla_formulario_directorio' border='0' cellpadding='7'>
								<tr id='titulo_columna_formulario'>
									<td colspan='2'>
										<h1 id='titulo_registro_usuario'>Actualizar Datos</h1>
									</td>
								</tr>
								<tr>
									<td>
										<h5 id='label_cajas_texto'>Cédula</h5>
										<input type='text' id='caja_formulario_usuario' name='txtCedula' maxlength='8' value='$mostrarDirectorio[cedula]'>
									</td>

									<td>
										<h5 id='label_cajas_texto'>Sexo</h5>
										<select id='combos_formulario_usuario' name='cbSexo'>
											<option value='$mostrarDirectorio[sexo]'>$mostrarDirectorio[sexo]</option>	
											<option value='Femenino'>Femenino</option>
											<option value='Masculino'>Masculino</option>
										</select>	
									</td>
								</tr>
								<tr>
									<td>						
										<h5 id='label_cajas_texto'>Primer Nombre</h5>
										<input type='text' id='caja_formulario_usuario' name='txtpNombre' maxlength='40' value='$mostrarDirectorio[pNombre]'>
									</td>

									<td>
										<h5 id='label_cajas_texto'>Primer Apellido</h5>	
										<input type='text' id='caja_formulario_usuario' name='txtpApellido' maxlength='40' value='$mostrarDirectorio[pApellido]'>
									</td>
								</tr>
								<tr>
									<td>
										<h5 id='label_cajas_texto'>Segundo Nombre</h5>
										<input type='text' id='caja_formulario_usuario' maxlength='40' name='txtsNombre' value='$mostrarDirectorio[sNombre]'>		
									</td>

									<td>
										<h5 id='label_cajas_texto'>Segundo Apellido</h5>
										<input type='text' id='caja_formulario_usuario' maxlength='40' name='txtsApellido' value='$mostrarDirectorio[sApellido]'>	
									</td>
								</tr>
								<td>
									<h5 id='label_cajas_texto'>Organización</h5>
									<select id='combos_formulario_usuario' name='cbOrganizacion'>
										<option value='$mostrarDirectorio[organizacion]'>$mostrarDirectorio[organizacion]</option>
										<option value='Industrias El Caiman'>Industrias El Caiman</option>
										<option value='Alkes Corp'>Alkes Corp</option>
									</select>
								</td>

								<td>
									<h5 id='label_cajas_texto'>Departamento</h5>
									<select id='combos_formulario_usuario' name='cbDepartamento'>
										<option value='$mostrarDirectorio[departamento]'>$mostrarDirectorio[departamento]</option>
										<option value='Gestion Humana'>Gestion Humana</option>
										<option value='Tesoreria'>Tesoreria</option>
										<option value='Tecnologia De La Informacion'>Tecnologia De La Informacion</option>
									</select>
								</td>
								<tr>
									<td>
										<h5 id='label_cajas_texto'>Cargo</h5>
										<select id='combos_formulario_usuario' name='cbCargo'>
											<option value='$mostrarDirectorio[cargo]'>$mostrarDirectorio[cargo]</option>
											<option value='Asistente'>Asistente</option>
											<option value='Gerente'>Gerente</option>
										</select>
									</td>
									<td>
										<h5 id='label_cajas_texto'>Correo</h5>
										<input type='text' id='caja_formulario_usuario' maxlength='200' name='txtCorreo' value='$mostrarDirectorio[correo]'>
									</td>
								</tr>
								<tr>
									<td>
										<h5 id='label_cajas_texto'>Telefono</h5>						
										<input type='text' id='caja_formulario_usuario' name='txtTelefono' maxlength='11' value='$mostrarDirectorio[telefono]'>
									</td>
									 <td id='color_fondo_cajas'>
									 	<h5 id='label_cajas_texto'>Subir Imagen</h5>
									    <input type='file' id='btnImagen'>
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
			";
			?>									
			</td>
			<td width="70px;">
				<?php 

					if($mostrarDirectorio[estatus] == 'A')
					{
						echo"<a id='btnActivo' name='btnActivo' href='opcionDirectorio/actualizarEstadoDirectorio.php?cedula=$mostrarDirectorio[cedula]&estatus=A' title='Activar' style='display: none;'>
							<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
						</a>";

						echo"<a id='btnDesactivado' name='btnDesactivado' href='opcionDirectorio/actualizarEstadoDirectorio.php?cedula=$mostrarDirectorio[cedula]&estatus=D' title='Desactivar'>
							<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
						</a>";
					}
					else
					{
						echo"<a id='btnActivo' name='btnActivo' href='opcionDirectorio/actualizarEstadoDirectorio.php?cedula=$mostrarDirectorio[cedula]&estatus=A' title='Activar'>
							<img src='imagenes/menu/botonesTablas/btnOffOn.png' id='imgDesactivar'>
						</a>";

						echo"<a id='btnDesactivado' name='btnDesactivado' href='opcionDirectorio/actualizarEstadoDirectorio.php?cedula=$mostrarDirectorio[cedula]&estatus=D' title='Desactivar' style='display: none;'>
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
	echo $mensajeError;		
?>				