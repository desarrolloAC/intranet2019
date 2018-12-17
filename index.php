<!DOCTYPE html>

<html>

<head>
	<title>Intranet Alkes Corp, S.A</title>

	<meta name="viewport" content="width=device-width,device-height initial-scale=1.5"/>

	<link rel="stylesheet" type="text/css" href="css/index/index.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="estructura/css/media.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="css/index/indexNoticiaCapsulaInformativa.css" media="all"/>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.js"></script>
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
                      
	   						<a  id="upa"   href="visorpdf.php" title="">Últimos proyectos y acuerdos</a>
	   	
	   					</li>
	   					<li>
	   						<a d="upa"   href="visorpdf.php" title="">Próximos eventos</a>
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
	   					<li>
	   						<a href="#" title="">Informacion de Documentos de SIG</a>
	   						   <ul>
	   						       <li>
	   						           <a href="#" title="">Norma ISO  </a>
	   						            <ul>
                                            <li> <a href="php/visorpdf.php?id=iso0" title="">Norma BASC 4:2012</a></li>
                                            <li> <a href="php/visorpdf.php?id=iso1" title="">Norma ISO 22000:2005 </a></li>
                                            <li> <a href="php/visorpdf.php?id=iso2" title="">Norma ISO 19011:2011</a></li>
                                            <li> <a href="php/visorpdf.php?id=iso3" title="">Norma ISO 9001:2015</a></li>
	   						                <li><a href="php/visorpdf.php?id=iso4" title="">Norma ISO 9001:2008 </a></li>
	   						                <li> <a href="php/visorpdf.php?id=iso5" title="">Norma ISO 9004:2010</a></li>
	   						            </ul>
	   						       </li>
	   						   </ul>
	   					</li>  					
	   				</ul>
	   				<!--FIN DEL SUBMENU INFORMACION PARA EL TRABAJO-->

			   	</li>
			   	<!--FIN DE LA OPCION INFORMACION PARA EL TRABAJO-->
			   
			   	<li>
			   		<a href="directorio.php" title="">Directorio</a>
			   	</li><?php
	
	include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';

	$conexion = conectar();

	include $_SERVER["DOCUMENT_ROOT"].'/intranet/mostrarNoticiasEnIndex/capsulaInformativa.php';

?>


			   	<li>
			   		<a href="#" title="">Descargas</a>
			   		
			   		<ul>
			   		    <li>
			   		        <a href="#" title="">Gestión Humana</a>
			   		        
			   		        <ul>
                              
                               <li>
			   		            <a href="php/Descargas.php?id=1" title="">Formato Unico</a>
			   		           </li>
			   		           
			   		         </ul>
			   		        <a href="#" title="">Mercadeo</a>
			   		        <a href="#" title="">Cuentas por Pagar</a>
			   		        
			   		    </li>
			   		    
			   		</ul>
			   		
			   	</li>

			   	<li>
			   		<a href="#" title="">Reservar Sala De Reunion</a>
			   	</li>

			</ul>

		</div>
		<!--FIN CONTENEDOR TOP-->

      

		<!--INICIO CAPSULA INFORMATIVA-->
		<div id="capuslaInformativa">

            <h1 id="tituloCapsulaInformativa">Capsula Informativa</h1>

            <div  v-for="item in list">
                <a id="n" :href="'detalleNoticiaAVIF.php?n=' + item.publicacion_id">
                    <div id="contenedorNoticiaCapsulaInformativa">
                        <div id="tituloNoticiaCapsulaInformativa">'
                            <h5 id="tituloAvanceInformativo">{{ item.titulo }}</h5>
                        </div>
                        <div id="imagenAvanceInformativo">
                            <img id="imagenAvanceInformativo2" :src="item.imagen" alt="Avance informativo">
                        </div>
                    </div>
                </a>
            </div>
		</div>
		
		<script type="text/javascript">
            
            const publicacionesUrl = 'http://192.168.30.25/intranet/php/index/consultaPublicaciones.php';
            const capuslaInformativa = new Vue({
                el: '#capuslaInformativa',
                created: function() {
                    this.getPublicaciones();
                },
                data: {
                    list: []
                },
                methods: {
                    getPublicaciones: function() {
                        this.$http.get(publicacionesUrl).then((responsed) => {
                            this.list = responsed.body;
                        });
                    }
                }
            });
            
        </script>
		<!--FIN CAPSULA INFORMATIVA-->



		<!--INICIO VIDEO-->
        <div class="container-fluid video">
		    <div class="row">
                <div class="col col-lg-2">
                   <!--vacio-->
                </div>
                <div class="col col-lg-8">
                    <video class="video-source" src="assets/video/POLITICA-20181212-173623.webm" type="video/webm"  autoplay controls > </video> 
                </div>
                <div class="col col-lg-2">
                   <!--vacio-->
                </div>
		    </div>
		</div>

       	<!--INICIO INVITACION-->
        <div id="invitacion" class="container-fluid invitacion">
		    <div class="row">
                <div class="col col-lg-12">
                    <h1 class="tituloInvitaciones">Invitaciones</h1>
                </div>  
		    </div>
		    <div class="row">
                 <div class="col col-lg-2">
                    <!--vacio-->
                 </div>
		         <div class="col col-lg-8 nuestrasPaginas">

                   <!--TITULO -->
                    <h1 id="tituloNuestrasPaginas">Nuestras Paginas</h1>

                    <!--INICIO DIV EFECTO SLIDER-->
                    <div class="slider">
                        <ul>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Alkes Corp, S.A</h1>
                                        <img  class="image-slider" src="imagenes/footer/logo_alkes.png" alt=""/>
                                    </div>
                                </a>
                            </li>		
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Industrias El Caiman</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_iec.png" alt=""/>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Venezolana De Frutas</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_venfruca.png" alt=""/>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Fruttech</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_fruttech.png" alt=""/>
                                    </div>
                                </a>
                            </li>					
                        </ul>
                    </div>                
                </div>
                <div class="col col-lg-2">
                   <!--vacio-->
               </div>
		    </div>
		</div>
		
        <script>
		  const invitacion = new Vue({
              el: '#invitacion',
              data: {
                  
              }
          });
		</script>
		
		<!--INICIO SALAS-->
        <div id="salas" class="container-fluid salas">
		    <div class="row">
                <div class="col col-lg-2">
                   <!--vacio-->
                </div>
                <div class="col col-lg-8">
                    <table class="tablaSala" border="0">
                        <tr class="colorFondo">
                            <td>Dia</td>
                            <td>Mes</td>
                            <td>Año</td>
                            <td>Sala</td>
                            <td>Inicio</td>
                            <td>Fin</td>
                            <td>Usuario</td>
                            <td>Estado</td>
                        </tr>
                        <tr class="colorDato" v-for="item in list">
                            <td>
                                <h5>{{ item.dia }}</h5>	
                            </td>
                            <td>
                                <h5>{{ item.mes }}</h5>	
                            </td>
                            <td>
                                <h5>{{ item.ano }}</h5>	
                            </td>
                            <td>
                                <h5>{{ item.salas }}</h5>	
                            </td>
                            <td>
                                <h5>{{ item.hora_inicio }}</h5>			
                            </td>
                            <td>
                                <h5>{{ item.hora_final }}</h5>	
                            </td>
                            <td>
                                <h5>{{ item.usuario }}</h5>	
                            </td>
                            <td>
                                <h5>{{ item.reservado }}</h5>	
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col col-lg-2">
                   <!--vacio-->
               </div>
		    </div>
		</div>
		
		<script type="text/javascript">
            
            const salasUrl = 'http://192.168.30.25/intranet/php/index/consultaSalas.php';
            const salas = new Vue({
                el: '#salas',
                created: function() {
                    this.getSalas();
                },
                data: {
                    list: []
                },
                methods: {
                    getSalas: function() {
                        this.$http.get(salasUrl).then((responsed) => {
                            this.list = responsed.body;
                        });
                    }
                }
            });
            
        </script>

		
		<!--INICIO CUMPLEAÑEROS DEL MES-->
        <div id="cumpleMes" class="container-fluid cumpleMes">
		    <div class="row">
                <div class="col col-lg-12">
                    <h1 class="tituloCumpleMes">Cumpleañeros Del Mes</h1>
                </div>  
		    </div>
		    <div class="row">
                 <div class="col col-lg-2">
                    <!--vacio-->
                 </div>
		         <div class="col col-lg-8 nuestrasPaginas">

                   <!--TITULO -->
                    <h1 id="tituloNuestrasPaginas">Nuestras Paginas</h1>

                    <!--INICIO DIV EFECTO SLIDER-->
                    <div class="slider">
                        <ul>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Alkes Corp, S.A</h1>
                                        <img  class="image-slider" src="imagenes/footer/logo_alkes.png" alt=""/>
                                    </div>
                                </a>
                            </li>		
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Industrias El Caiman</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_iec.png" alt=""/>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Venezolana De Frutas</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_venfruca.png" alt=""/>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Fruttech</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_fruttech.png" alt=""/>
                                    </div>
                                </a>
                            </li>					
                        </ul>
                    </div>                
                </div>
                <div class="col col-lg-2">
                   <!--vacio-->
               </div>
		    </div>
		</div>
		
		<script>
		  const cumpleMes = new Vue({
              el: '#cumpleMes',
              data: {
                  
              }
          });
		</script>
				
        <!--INICIO INFOGRAFIA-->
		<div class="container-fluid infografia">
		    <div class="row">
                <div class="col col-lg-12">
                    <img src="assets/image/gg.jpg" class="img-fluid image-infografia" alt="Infografia"/>
                </div>  
		    </div>
		</div>

		<!--INICIO NUEVO INGRESO-->
		<div id="nuevoIngreso" class="container-fluid nuevoIngreso">
		    <div class="row">
                <div class="col col-lg-12">
                    <h1 class="tituloNuevoIngreso">Nuevo Ingreso</h1>
                </div>  
		    </div>
		    <div class="row">
                 <div class="col col-lg-2">
                    <!--vacio-->
                 </div>
		         <div class="col col-lg-8 nuestrasPaginas">

                   <!--TITULO -->
                    <h1 id="tituloNuestrasPaginas">Nuestras Paginas</h1>

                    <!--INICIO DIV EFECTO SLIDER-->
                    <div class="slider">
                        <ul>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Alkes Corp, S.A</h1>
                                        <img  class="image-slider" src="imagenes/footer/logo_alkes.png" alt=""/>
                                    </div>
                                </a>
                            </li>		
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Industrias El Caiman</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_iec.png" alt=""/>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Venezolana De Frutas</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_venfruca.png" alt=""/>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Fruttech</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_fruttech.png" alt=""/>
                                    </div>
                                </a>
                            </li>					
                        </ul>
                    </div>                
                </div>
                <div class="col col-lg-2">
                   <!--vacio-->
               </div>
		    </div>
		</div>
		
		<script>
		  const nuevoIngreso = new Vue({
              el: '#nuevoIngreso',
              data: {
                  
              }
          });
		</script>

        <!--INICIO INFOGRAFIA-->
		<div class="container-fluid infografia">
		    <div class="row">
                <div class="col col-lg-12">
                
                </div>  
		    </div>
		</div>

		<!--INICIO FOOTER-->
        <div class="container-fluid">
           
            <!--FILA 1-->
            <div class="row">
               
                <!--INICIO FOLLETO INFORMATIVO-->
                <div class="col col-lg-3 folletoInformativo">
                    <h1 id="tituloFolletoInformativo">Folleto Informativo</h1>
                </div>

                <!--INICIO NUESTRAS REDES-->
                <div class="col col-lg-6 nuestrasPaginas">

                   <!--TITULO -->
                    <h1 id="tituloNuestrasPaginas">Nuestras Paginas</h1>

                    <!--INICIO DIV EFECTO SLIDER-->
                    <div class="slider">
                        <ul>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Alkes Corp, S.A</h1>
                                        <img  class="image-slider" src="imagenes/footer/logo_alkes.png" alt=""/>
                                    </div>
                                </a>
                            </li>		
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Industrias El Caiman</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_iec.png" alt=""/>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Venezolana De Frutas</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_venfruca.png" alt=""/>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-slider" href="#">				  			
                                    <div class="div-slider">
                                        <h1 class="title-slider ">Fruttech</h1>
                                        <img class="image-slider" src="imagenes/footer/logo_fruttech.png" alt=""/>
                                    </div>
                                </a>
                            </li>					
                        </ul>
                    </div>
                    
                </div>
                
                 <!--INICIO NUESTRAS REDES-->
                <div class="col col-lg-3 nuestrasRedes">
                    <h1 id="tituloNuestrasRedes">Nuestras Redes Sociales</h1>
                    <img id="imagenFacebook" class="efectoRotarRedesSociales" src="imagenes/footer/f.png" width="65">
                    <img id="imagenFacebook" class="efectoRotarRedesSociales" src="imagenes/footer/instagram.png" width="65">
                    <img id="imagenFacebook" class="efectoRotarRedesSociales" src="imagenes/footer/twitter.png" width="65">
                </div>
            </div>
            
            <!--FILA 2-->
            <div class="row">
                <!--INICIO COPYRING-->
                <div class="col-sm-12 copy">
                    <h3 id="derechoAutor">Copyright © 2018 Intranet Corporativa Rights Reserved. </h3>
                </div>
            </div>
            
        </div>
        <!--FIN FOOTER-->

        
	</div>
    

</body>

</html>