<?php
        //comprobamos que sea una petición ajax
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
        {
            //obtenemos el archivo a subir
            if (isset($_FILES['archivo']['name'])) 
                $file  = $_FILES['archivo']['name'];
            if (isset($_FILES['archivo1']['name']))            
                $file1 = $_FILES['archivo1']['name'];
            if (isset($_FILES['archivo2']['name'])) 
                $file2 = $_FILES['archivo2']['name'];
            if (isset($_FILES['archivo3']['name'])) 
                $file3 = $_FILES['archivo3']['name'];
            

            //comprobamos si existe un directorio para subir el archivo
            //si no es así, lo creamos
            if(!is_dir("../imagenes/fotoPublicaciones/")) 
                mkdir("../imagenes/fotoPublicaciones/", 0777);
             
            //comprobamos si el archivo ha subido
             if ($file  && move_uploaded_file($_FILES['archivo']['tmp_name'],"../imagenes/fotoPublicaciones/".$file))
                echo $file."&";   
             if ($file1 && move_uploaded_file($_FILES['archivo1']['tmp_name'],"../imagenes/fotoPublicaciones/".$file1))
                echo $file1."&"; 
             if ($file2 && move_uploaded_file($_FILES['archivo2']['tmp_name'],"../imagenes/fotoPublicaciones/".$file2))
                echo $file2."&";       
             if ($file3 && move_uploaded_file($_FILES['archivo3']['tmp_name'],"../imagenes/fotoPublicaciones/".$file3))
                echo $file3; //devolvemos el nombre del archivo para pintar la imagen 
        }else{
            throw new Exception("Error Processing Request", 1);   
        }

?>