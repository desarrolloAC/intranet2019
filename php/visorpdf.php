

   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    <style>
        body {
            padding: 0px;
            margin: 0px;
              background-image: url(imagenes/mediatelecom_pdf_jb230618.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .paren {
            display: flex;
            flex-direction: row;
          
            justify-content: center;
            
          
        }
        
        .frame {
            width: 60%;
            height: 99vh;
        }
    </style>
</head>     
       
         
           
           <body>
    

    
<div class="paren">
    
<?php   
    
$id=$_GET['id']; 
    
switch ($id) {
        
    case 'iso0':  
        echo '<iframe class="frame" src="http://192.168.0.130/SITE/PROCESOS/documentos/DNAI-1.pdf" type="application/pdf" />';
         break;
        
    case 'iso1':  
        echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/normas-version-4-2012.pdf" type="application/pdf" />';
         break;   
    case 'iso2':  
        echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/ISO19011-2011.pdf" type="application/pdf" />';
         break;   
    case 'iso3':  
        echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/UNIT-ISO%209001%202015%20DESBLOQUEADO.pdf" type="application/pdf" />';
         break; 
    case 'iso4':  
        echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/ISO_9001_2008.pdf" type="application/pdf" />';
         break;
    case 'iso5':  
        echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/NTC-ISO%209004.pdf" type="application/pdf" />';
         break;    
         
         
   default: 
        echo '<iframe class="frame" src="http://localhost/intranet/index.php" type="application/pdf" />';
}
 ?>           
</div>







</body>
</html>  
               
                 

