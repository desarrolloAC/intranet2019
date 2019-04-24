<?php

/*
 * Talento humano opcion ascensos.
 * <a id="botones" href="#formularioNuevoAscenso">Ascenso</a>
  include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/nuevoAscenso.php';
 *
 *
 *
 *
 *
 *


<script type = "text/javascript">
const Publicacion = new Vue({
el: '#contenido2',
 created: function () {
this.getPublicaciones();
},
 data: {
list: []
},
 methods: {
getPublicaciones: function () {
const contenidoBandejaUrl = 'php/notificaciones/GetNotificaciones.php';

this.$http.get(contenidoBandejaUrl).then((responsed) => {
this.list = responsed.body;
});
},
 }
})
})


                                                                        $sql = "SELECT foto as imagen1 from publicacion_cumpleañomes where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        $rs = mysqli_query($conexion, $sql);
                                                                        $results = array()();

                                                                        while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                            $results = $row;
                                                                            $i = 0;
                                                                        };
                                                                        foreach ($results as $result) {
                                                                            $i++;
                                                                            ?>   <img src='<?php echo $result['imagen' . $i]; ?>' id='imagen' width='100' height='100'> <?php
                                                                        };
 
 
 
 
 
 
  switch ($error4) {
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
                    
                    case 4:
                        echo "No se subió fichero 4";
                    break;                     
                }  //FIN DEL SWITCH CASE 4 
 


                <div class="col col-lg-6">
                    <video class="video" src="assets/video/VIDEO%20INTRANET.webm" type="video/webm" width="880" height="594" autoplay controls></video>
                </div>


                 <div class="row">
            
            <div class="col col-lg-6">
            <video class="video" src="assets/video/VIDEO%20INTRANET.webm" type="video/webm" width="880" height="594" autoplay controls></video>
        </div>
        <div class="col col-lg-6">
 
 


          $inst->setPublicacionId($row["n"]);
    $inst->setOrganization($row["org"]);
    $inst->setTitulo($row["titulo"]);
    $inst->setFoto($row['Foto']);
    $inst->setColaborador($row['colaborador']);
    $inst->setDeparatmento($row['departamento']);
    $inst->setDate($row['fecha']);
    $inst->setImage($row['image']);


    <img class="image" :src="item.image" alt="Imagen">
                <img class="logo" :src="item.logo" alt="Logo">
                <h5 class="fecha">{{ item.date }}</h5>
                <div class="colaborador" v-html="item.colaborated"> </div>
                <h5 class="departamento">{{ item.department }}</h5>

                                                                       
                
                
                
                  if (mysqli_num_rows($rs)<=0) {
                                                                            echo $errorB;
                                                                            }else{
                                                                                while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                                echo "<div style='margin: 0%; padding: 0%; border:0%' >";
                                                                                    if(($mostrarPublicacion['ID_Subcategoria']=='COMU') || ($mostrarPublicacion['ID_Subcategoria']=='COND')|| ($mostrarPublicacion['ID_Subcategoria']=='GENE') || ($mostrarPublicacion['ID_Subcategoria']=='POST')){
                                                                                    echo $errorC;
                                                                                        }else{
                                                                                            for ($i=1; $i<=$c ; $i++) { 
                                                                                            echo"<div>";
                                                                                                ?> <img class="imgEditar"src="<?php echo $row['imagen'.$i];?>" id="<?php echo"imagen".$i;?>"><?php
                                                                                                ?> <input class="btnImageEditar" type="file" name="<?php echo "archivo".$i;?>" id="<?php echo "btnImage".$i;?>"><?php  
                                                                                            echo"</div>"; 
                                                                                            }
                                                                            }
                                                                        echo "</div>"// fin de DIV;

                                                                    };//FIn de While 
                                                                };
                                                                
                                                                    $con2=false;
                                                                switch ($mostrarPublicacion['ID_Subcategoria']) {
                                                                    case 'GENE':
                                                                        $sqlContenido2="SELECT contenido1 as contenido2 from publicacion_invitaciongeneral where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                    $con2=true;
                                                                        break;
                                                                    case 'POST':
                                                                        $sqlContenido2="SELECT Posiciones as contenido2 from publicacion_postulate where ID_publicacion='$mostrarPublicacion[ID_Publicacion]'";
                                                                        $con2=true;    
                                                                        break;
                                                                    default:
                                                                        $con2=false;
                                                                        break;
                                                                }    
                                                                
                                                                if (!$con2){
                                                                    echo"";
                                                                }else{
                                                                    $rs = mysqli_query($conexion, $sqlContenido2);
                                                                    if (mysqli_num_rows($rs)<=0) {
                                                                        echo $errorA;
                                                                        }else{
                                                                            while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                                                                echo "<h5 id='label_cajas_texto'>Segundo Contenido</h5>";  
                                                                                ?><textarea name="contenido2" id="contenido2" rows="10" cols="100" ><?php $row['contenido2']?></textarea><?php
                                                                            };
                                                                        };
                                                                    };
                                                                
                                                                
                                                                $Con=false;
                                                                                switch ($$mostrarPublicacion['ID_Subcategoria']) {
                                                                                   case 'AVIF':
                                                                                       $Con=true;
                                                                                       break;
                                                                                   case 'BOIF':
                                                                                        $Con=true;
                                                                                       break;
                                                                                    case 'COMU':
                                                                                        $Con=true;
                                                                                        break;
                                                                                    case 'COND':
                                                                                        $Con=true;
                                                                                        break;
                                                                                    case 'NUIN':
                                                                                        $Con=true;                                                                                      
                                                                                          break;
                                                                                    case 'NUAS':
                                                                                        $Con="Y";
                                                                                        break;
                                                                                    case 'LOEX':
                                                                                        $Con=true;
                                                                                        break;
                                                                                    case 'POES':
                                                                                        $Con=true;
                                                                                        break;
                                                                                   default:
                                                                                        $Con=false;
                                                                                       break;
                                                                               }
                                                                
                                                                
                                                                    */
                                                                     

                                                                