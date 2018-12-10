<?php

	error_reporting(0);

	include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';

	$conexion = conectar();

	if(isset($_POST["btnBuscarDirectorio"]))
	{

		$nombre  =	$_POST["txtBuscarDirectorio"];
		$where   =  " where nc like '%".$nombre."%' AND us.Estatus = 'A'";			
	
		$consultaDepartamento = mysql_query("SELECT	us.foto, 
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

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estructura/css/index.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/directorio.css" media="screen">
	<link rel="stylesheet" type="text/css" href="estructura/css/media.css" media="screen">

</head>

<body>

	<!--INICIO CONTENEDOR DE CONTENIDOS-->
	<div id="contenedorContenido">

		<!--INICIO CONTENEDOR TOP-->
		<div id="contenedorTop">

			<a href="index.php">
				<img id="logoAlkes" src="imagenes/top/logoAlkes.png">
			</a>

			<a href="login.php">
				<img id="logoUsuario" src="imagenes/top/usuario.png">
			</a>

			<ul class="menu">							
	   			<!--OPCION ACTUALIDAD-->
	   			<li>
	   				<a href="#" title="">Actualidad</a>

	   				<!--SUBMENU DE ACTUALIDAD-->
	   				<ul>
	   					<li>
	   						<a href="#" title="">Últimos proyectos y acuerdos</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Próximos eventos</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Boletín de noticias</a>
	   					</li>
	   				</ul>
	   				<!--FIN DEL SUBMENU ACTUALIDAD-->

	   			</li>
	   			<!--FIN DE LA OPCION ACTUALIDAD-->

	   			<!--OPCION INFORMACION-->
			   	<li>
			   		<a href="#" title="">Informacion</a>

			   		<!--SUBMENU DE INFORMACION-->
	   				<ul>
	   					<li>
	   						<a href="#" title="">Mensajes de la CEO</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Misión y Visión Corporativa</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Directorio de la organización</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Políticas y procedimientos</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Resultados generales</a>
	   					</li>
	   				</ul>
	   				<!--FIN DEL SUBMENU INFORMACION-->

			   	</li>
			   	<!--FIN DE LA OPCION INFORMACION-->

			   	<!--OPCION INFORMACION PARA EL TRABAJO-->
			   	<li>
			   		<a href="#" title="">Informacion para el trabajo</a>

			   		<!--SUBMENU DE INFORMACION PARA EL TRABAJO-->
	   				<ul>
	   					<li>
	   						<a href="#" title="">Acceso a documentos, estudios, informes</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Manuales y procedimientos de trabajo</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Directorio de la organización</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Políticas y procedimientos</a>
	   					</li>   					
	   				</ul>
	   				<!--FIN DEL SUBMENU INFORMACION PARA EL TRABAJO-->

			   	</li>
			   	<!--FIN DE LA OPCION INFORMACION PARA EL TRABAJO-->
			   
			   	<li>
			   		<a href="directorio.php" title="">Directorio</a>
			   	</li>

			   	<li>
			   		<a href="#" title="">Descargas</a>
			   	</li>

			   	<li>
			   		<a href="../Alkes/index.html" title="">Reservar Sala De Reunion</a>
			   	</li>

			</ul>

		</div>
		<!--FIN CONTENEDOR TOP-->

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

		<!--INICIO FOLLETO INFORMATIVO-->
		<div id="folletoInformativo">
			
			<h1 id="tituloFolletoInformativo">Folleto Informativo</h1>

		</div>
		<!--FIN FOLLETO INFORMATIVO-->

		<!--INICIO NUESTRAS PAGINAS-->
		<div id="nuestrasPaginas">
			
			<h1 id="tituloNuestrasPaginas">Nuestras Paginas</h1>

			<!--INICIO DIV EFECTO SLIDER-->
			<div class="slider">
				<ul>
					<li>
				  		<a id="enlaceAlkes" href="#">				  			
				  			<div id="alkes">
				  				
				  				<h1 id="tituloAlkes">Alkes Corp, S.A</h1>

				  				<img id="imagenAlkes" src="imagenes/footer/logo_alkes.png" alt="">
																								
				  			</div>
				  		</a>
				 	</li>		
					<li>
						<a id="enlaceIEC" href="#">				  			
				  			<div id="caiman">
				  				
				  				<h1 id="tituloCaiman">Industrias El Caiman</h1>

				  				<img id="imagenCaiman" src="imagenes/footer/logo_iec.png" alt="">
																								
				  			</div>
				  		</a>
					</li>
					<li>
						<a id="enlaceVenfruca" href="#">				  			
				  			<div id="venfruca">
				  				
				  				<h1 id="tituloVenfruca">Venezolana De Frutas</h1>

				  				<img id="imagenVenfruca" src="imagenes/footer/logo_venfruca.png" alt="">
																								
				  			</div>
				  		</a>
					</li>
					<li>
						<a id="enlaceFruttech" href="#">				  			
				  			<div id="fruttech">
				  				
				  				<h1 id="tituloFruttech">Fruttech</h1>

				  				<img id="imagenFruttech" src="imagenes/footer/logo_fruttech.png" alt="">
																								
				  			</div>
				  		</a>
					</li>					
				</ul>
			</div>
			<!--FIN DIV EFECTO SLIDER-->
		</div>
		<!--INICIO NUESTRAS PAGINAS-->

		<!--INICIO NUESTRAS REDES-->
		<div id="nuestrasRedes">
			
			<h1 id="tituloNuestrasRedes">Nuestras Redes Sociales</h1>

			<img id="imagenFacebook" class="efectoRotarRedesSociales" src="imagenes/footer/f.png" width="65">

			<img id="imagenFacebook" class="efectoRotarRedesSociales" src="imagenes/footer/instagram.png" width="65">
			
			<img id="imagenFacebook" class="efectoRotarRedesSociales" src="imagenes/footer/twitter.png" width="65">

		</div>
		<!--INICIO NUESTRAS REDES-->

		<!--INICIO COPYRING-->
		<div id="copy">
			<h3 id="derechoAutor">Copyright © 2018 Intranet Corporativa Rights Reserved. </h3>
		</div>
		<!--FIN COPYRING-->
		
	</div>
	<!--FIN CONTENEDOR DE CONTENIDOS-->

</body>

</html>