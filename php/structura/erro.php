<?php
/** *
 *  @version 1.0 
 *  @author Danny Garcia <danny.garcia@alkescorp.com> AlkesCorp C.A
 *  Return returns the type of error
 */

    //EVALUA ERRORES
    function ErrorFile($C , $z){
        switch ($C) {  
            case 0 :
                $Mesage="A";
                break;   
                //UPLOAD_ERR_OK 0      
            case 1 :
                $Mesage="B";
                break;
                //UPLOAD_ERR_INI_SIZE 1
            case 2 :
                $Mesage="C";
                break;
                //UPLOAD_ERR_FORM_SIZE  2
            case 3 :
                $Mesage="D";
                break;
                //UPLOAD_ERR_PARTIAL 3
            case 4 :
                $Mesage="E";
                break;
                 //UPLOAD_ERR_NO_FILE: 4
            default : 
                if ($z > 1000000000) {
                    $Mesage = "F";
                }
                break;
                //validar el tamano de la imagen Default 
            }
                return $Mesage;
    }

?>