<?php
	
	include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';

	$conexion = conectar();

	include $_SERVER["DOCUMENT_ROOT"].'/intranet/mostrarNoticiasEnIndex/capsulaInformativa.php';

?>

<!DOCTYPE html>

<html>

<head>

	<title>Intranet Alkes Corp, S.A</title>

	<meta name="viewport" content="width=device-width,device-height initial-scale=1.5">

	<link rel="stylesheet" type="text/css" href="estructura/css/index.css" media="all">
	<link rel="stylesheet" type="text/css" href="estructura/css/media.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/indexNoticiaCapsulaInformativa.css" media="all">
	
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

		<!--INICIO CAPSULA INFORMATIVA-->
		<div id="capuslaInformativa">

			<h1 id="tituloCapsulaInformativa">Capsula Informativa</h1>

			<?php

			while ($mostrarAVIF = mysql_fetch_array($verAVIF)) 
			{				
				echo '<a id="n" href="detalleNoticiaAVIF.php?n='.$mostrarAVIF["n"].'">
						<div id="contenedorNoticiaCapsulaInformativa">

							<div id="tituloNoticiaCapsulaInformativa">'
							.'<h5 id="tituloAvanceInformativo">'.$mostrarAVIF['Titulo'].'</h5>'.'
							</div>

							<div id="imagenAvanceInformativo">
							</div>

					  	</div>
					</a>
				';
			}

			while ($mostrarBOIF = mysql_fetch_array($verBOIF)) 
			{
				echo '<a id="n" href="detalleNoticiaBOIF.php?n='.$mostrarBOIF["n"].'">
						<div id="contenedorNoticiaCapsulaInformativa">

							<div id="tituloNoticiaCapsulaInformativa">'
							.'<h5 id="tituloAvanceInformativo">'.$mostrarBOIF['Titulo'].'</h5>'.'
							</div>

							<div id="imagenBoletinInformativo">
							</div>

						  </div>
					  </a>
				';
			}

			while ($mostrarCOMU = mysql_fetch_array($verCOMU)) 
			{
				echo '<a id="n" href="detalleNoticiaCOMU.php?n='.$mostrarCOMU["n"].'">
						<div id="contenedorNoticiaCapsulaInformativa">

							<div id="tituloNoticiaCapsulaInformativa">'
							.'<h5 id="tituloAvanceInformativo">'.$mostrarCOMU['Titulo'].'</h5>'.'
							</div>

							<div id="imagenComunicado">
							</div>

						</div>
					  </a>
				';
			}
                        while ($mostrarINGE = mysql_fetch_array($verINGE)) 
			{
				echo '<a id="n" href="detalleNoticiaINGE.php?n='.$mostrarINGE["n"].'">
						<div id="contenedorNoticiaCapsulaInformativa">

							<div id="tituloNoticiaCapsulaInformativa">'
							.'<h5 id="tituloAvanceInformativo">'.$mostrarINGE['Titulo'].'</h5>'.'
							</div>

							<div id="imagenGeneral">
							</div>

						  </div>
					  </a>
				';
			}
			
			?>

		</div>
		<!--FIN CAPSULA INFORMATIVA-->

		<!--INICIO SALAS-->
		<div id="salas">
		
			<h1 id="tituloSalas">Salas</h1>

			<?php
				
				$conexion = conectar();

				$consultaSala = "SELECT t1.days  	AS Dia,
										t1.moth  	AS Mes,
										t1.yeart 	AS A,
										t1.space 	AS Sala,
										t2.cince 	AS Hora_Inicio,
										t2.until 	AS Hora_Final,
										t2.user  	AS Usuario,
										t2.isreserved 	AS Reservado
									FROM availability t1 INNER JOIN reservation t2 ON t1.availability_id = t2.availability_id
									WHERE t2.isreserved = 'Y'";

				$resultado = mysql_query($consultaSala,$conexion);
				
			?>

			<table id="tablaSala" border="0">				
				<tr id="colorFondo">
					<td>Dia</td>
					<td>Mes</td>
					<td>Año</td>
					<td>Sala</td>
					<td>Inicio</td>
					<td>Fin</td>
					<td>Usuario</td>
					<td>Estado</td>
				</tr>
				<?php
					while ($mostrarSala=mysql_fetch_array($resultado))
					{
				?>
				
				<tr id="colorDato">
					<!--<marquee scrolldelay="100" scrollamount="5" direction="up" loop="infinite">-->
					<td>
						<h5><?php echo $mostrarSala["Dia"]; ?></h5>	
					</td>
					<td>
						<h5><?php echo $mostrarSala["Mes"]; ?></h5>	
					</td>
					<td>
						<h5><?php echo $mostrarSala["A"]; ?></h5>	
					</td>
					<td>
						<h5><?php echo $mostrarSala["Sala"]; ?></h5>	
					</td>
					<td>
						<h5><?php echo $mostrarSala["Hora_Inicio"]; ?></h5>	
					</td>
					<td>
						<h5><?php echo $mostrarSala["Hora_Final"]; ?></h5>	
					</td>
					<td>
						<h5><?php echo $mostrarSala["Usuario"]; ?></h5>	
					</td>
					<td>
						<h5><?php echo $mostrarSala["Reservado"]; ?></h5>	
					</td>
					<!--</marquee>-->
				</tr>				
				<?php
					}
				?>				
			</table>
		
		</div>
		<!--FIN SALAS-->

		<!--INICIO VIDEO-->
		<div id="video">
					
		</div>
		<!--FIN VIDEO-->

		<!--INICIO INVITACION-->
		<div id="invitacion">
			
			<h1 id="tituloInvitaciones">Invitaciones</h1>

		</div>
		<!--FIN INVITACION-->			

		<!--INICIO BANNER-->
		<div id="banner">
			
		</div>
		<!--FIN BANNER-->

		<!--INICIO CUMPLEAÑEROS DEL MES-->
		<div id="cumpleMes">
			
			<h1 id="tituloCumpleMes">Cumpleañeros Del Mes</h1>

		</div>
		<!--FIN CUMPLEAÑEROS DEL MES-->

		<!--INICIO NUEVO INGRESO-->
		<div id="nuevoIngreso">
			
			<h1 id="tituloNuevoIngreso">Nuevo Ingreso hhhhhhh</h1>

		</div>
		<!--FIN NUEVO INGRESO-->

		<!--INICIO INFOGRAFIA-->
		<div id="infografia">
			
		</div>
		<!--FIN INFOGRAFIA-->

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