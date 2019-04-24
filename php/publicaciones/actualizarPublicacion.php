<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/structura/erro.php';
$conexion = conectar();

$id_publicacion = $_POST["txtCodigoP"];
$id_departamento= $_POST["txtCodigoDept"];
$id_subcategoria = $_POST["txtCodigoSubC"];
$id_Cargo = $_POST["txtCodigoCarg"];

$logro = $_POST["txtTipoLogro"];
$fecha=$_POST['txtFecha'];
$correo=$_POST['txtCorreo'];

$contenido1 = $_POST["contenido1"];
$contenido2 = $_POST["contenido2"];
$contenido3 = $_POST["contenido3"];

$motivo =  trim($_POST["motivo"]," \r") ;
$titulo =  trim($_POST["Titulo"]," \r") ;

$updatedBy = $_SESSION['Cedula'];
$colaborador= trim($_POST['txtColaborador']," \r");

$foto1 = $_FILES['archivo1']['name'];
$foto2 = $_FILES['archivo2']['name'];
$foto3 = $_FILES['archivo3']['name'];
$foto4 = $_FILES['archivo4']['name'];

$error1 = $_FILES['archivo1']['error'];
$error2 = $_FILES['archivo2']['error'];
$error3 = $_FILES['archivo3']['error'];
$error4 = $_FILES['archivo4']['error'];

$origen1 = $_FILES['archivo1']['tmp_name'];
$origen2 = $_FILES['archivo2']['tmp_name'];
$origen3 = $_FILES['archivo3']['tmp_name'];
$origen4 = $_FILES['archivo4']['tmp_name'];

$date = date("Y-m-d H:i:s"); // desvielve fecha en mumero en el siguiente formato(Año-mes-dia hora:minutos:segundo)

$destino_temp1 = 'assets/image/fotoPublicaciones/' . "REV1" .$date . strstr($foto1, '.');
$destino1 = $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp1;
$destino_temp2 = 'assets/image/fotoPublicaciones/' . "REV2" .$date . strstr($foto2, '.');
$destino2 =  $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp2;
$destino_temp3 = 'assets/image/fotoPublicaciones/' . "REV3" .$date . strstr($foto3, '.');
$destino3 =  $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp3;
$destino_temp4 = 'assets/image/fotoPublicaciones/' . "REV4" .$date . strstr($foto4, '.');
$destino4 =  $_SERVER['DOCUMENT_ROOT'] . '/intranet/' . $destino_temp4;

    //RECORRE LAS IMAGENES
if(($id_subcategoria=='AVIF') || ($id_subcategoria=='BOIF')){
       
       
        //Foto 1
    if (!empty($foto1)) {
        
                    if (!copy($origen1,$destino1)) {
                        throw new Exception(" Imagen  ".$foto1."No pudo ser copiada al servidor");
                    }
            $A='A';
            $updatePhoto1= "CALL sp_ActualizarPublicacionPhoto(?,?,?,?)";    
            $stmtphoto1 = mysqli_prepare($conexion, $updatePhoto1);
            $stmtphoto1->bind_param("ssss",$id_publicacion,
                                        $A,
                                        $id_subcategoria,
                                        $destino_temp1);
            $stmtphoto1->execute() or die(mysqli_error($conexion));
        
    } 
    
        //foto 2 
    if (!empty($foto2)) {
                if (!copy($origen2,$destino2)) {
                    throw new Exception(" Imagen  ".$foto2."No pudo ser copiada al servidor");
                }
            $B='B';
            $updatePhoto2= "CALL sp_ActualizarPublicacionPhoto(?,?,?,?)";    
            $stmtphoto2 = mysqli_prepare($conexion, $updatePhoto2);
            $stmtphoto2->bind_param("ssss",$id_publicacion,
                                        $B,
                                        $id_subcategoria,
                                        $destino_temp2);
            $stmtphoto2->execute() or die(mysqli_error($conexion));
        
    }
       //foto 3 txtTipoLogro
    if (!empty($fototxtTipoLogro3)) {
    
                if (!copy($origen3,$destino3)) {
                    throw new Exception(" Imagen  ".$foto3."No pudo ser copiada al servidor");
                }
            $C='C';
            $updatePhoto3= "CALL sp_ActualizarPublicacionPhoto(?,?,?,?)";    
            $stmtphoto3 = mysqli_prepare($conexion, $updatePhoto3);
            $stmtphoto3->bind_param("ssss",$id_publicacion,
                                        $C,
                                        $id_subcategoria,
                                        $destino_temp3);
            $stmtphoto3->execute() or die(mysqli_error($conexion));
        
    }
          //foto 4
    if (!empty($foto4)) {
                if (!copy($origen4,$destino4)) {
                    throw new Exception(" Imagen  ".$foto4."No pudo ser copiada al servidor");
                }
            $D='D';
            $updatePhoto4= "CALL sp_ActualizarPublicacionPhoto(?,?,?,?)";    
            $stmtphoto4 = mysqli_prepare($conexion, $updatePhoto4);
            $stmtphoto4->bind_param("ssss",$id_publicacion,
                                        $D,
                                        $id_subcategoria,
                                        $destino_temp4);
            $stmtphoto4->execute() or die(mysqli_error($conexion));
     
}

        $update= "CALL sp_ActualizarPublicacionAvaceYBoletin(?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conexion, $update);
        $stmt->bind_param("sssssss",$id_publicacion,   
                                        $contenido1,
                                        $id_subcategoria,
                                        $motivo,
                                        $titulo,
                                        $date,
                                        $updatedBy);
        $stmt->execute() or die(mysqli_error($conexion));


    }elseif (($id_subcategoria=='CUPL') || ($id_subcategoria=='LOEX') || ($id_subcategoria=='NACI') || ($id_subcategoria=='NUAS') || ($id_subcategoria=='NUIN') || ($id_subcategoria=='POES') || ($id_subcategoria=='FLAY')) {
                $updatePhoto= "CALL sp_ActualizarPublicacionPhoto(?,?,?,?)";    
                $stmtphoto = mysqli_prepare($conexion,$updatePhoto);
                $A='A';
                if (!empty($foto1)) {
                   if (!copy($origen1,$destino1)) {
                                throw new Exception(" Imagen  ".$foto1."No pudo ser copiada al servidor");
                            }
                      
                        $stmtphoto->bind_param("ssss",$id_publicacion,
                                                    $A,
                                                    $id_subcategoria,
                                                    $destino_temp1);
                        $stmtphoto->execute() or die(mysqli_error($conexion));
                            
                }
                switch ($id_subcategoria) {
                    case 'NUIN':
                        $update= "CALL sp_ActualizarPublicacioNUevoIngreso(?,?,?,?,?,?,?,?)";
                        $stmt = mysqli_prepare($conexion, $update);
                        $stmt->bind_param("ssssssss",$id_publicacion,
                                                   $contenido1,
                                                   $motivo,
                                                   $colaborador,
                                                   $id_departamento,
                                                   $id_Cargo,
                                                   $date,
                                                   $updatedBy);
                        $stmt->execute() or die(mysqli_error($conexion));
                        break;
                    case 'LOEX':
                        $update= "CALL sp_ActualizarPublicacionLogro(?,?,?,?,?,?,?,?,?)";
                        $stmt = mysqli_prepare($conexion, $update);
                        $stmt->bind_param("sssssssss",$id_publicacion,
                                                   $contenido1,
                                                   $motivo,
                                                   $colaborador,
                                                   $id_departamento,
                                                   $id_Cargo,
                                                   $logro,
                                                   $date,
                                                   $updatedBy);
                        $stmt->execute() or die(mysqli_error($conexion));
                        break;
                    case 'FLAY':
                    $update= "CALL sp_ActualizarPublicacionFlayers(?,?,?,?)";
                    $stmt = mysqli_prepare($conexion, $update);
                    $stmt->bind_param("ssss",$id_publicacion,
                                               $motivo,
                                               $date,
                                               $updatedBy);
                    $stmt->execute() or die(mysqli_error($conexion));
                        break;
                    case 'CUPL':
                    $update= "CALL sp_ActualizarPublicacionCumpleMes(?,?,?,?,?,?,?)";
                    $stmt = mysqli_prepare($conexion, $update);
                    $stmt->bind_param("sssssss",$id_publicacion,
                                               $motivo,
                                               $fecha,
                                               $colaborador,
                                               $id_departamento,
                                               $date,
                                               $updatedBy);
                    $stmt->execute() or die(mysqli_error($conexion));
                        break; 
                    case 'NACI':
                    $update= "CALL sp_ActualizarPublicacioNacimiento(?,?,?,?,?,?)";
                    $stmt = mysqli_prepare($conexion, $update);
                    $stmt->bind_param("ssssss",$id_publicacion,
                                               $motivo,
                                               $contenido1,
                                               $colaborador,
                                               $date,
                                               $updatedBy);
                    $stmt->execute() or die(mysqli_error($conexion));
                        break;
                    case 'POES':
                    $update= "CALL sp_ActualizarPublicacioPromoEscolar(?,?,?,?,?,?)";
                    $stmt = mysqli_prepare($conexion, $update);
                    $stmt->bind_param("ssssss",$id_publicacion,
                                               $motivo,
                                               $contenido1,
                                               $colaborador,
                                               $date,
                                               $updatedBy);
                    $stmt->execute() or die(mysqli_error($conexion));
                        break;
            
          }
    
    }else{
        $update="";
        switch ($id_subcategoria) {
            case 'COMU':
            $update= " CALL sp_ActualizarPublicacioComunicado(?,?,?,?,?,?)";
            $stmt = mysqli_prepare($conexion, $update);
            $stmt->bind_param("ssssss",$id_publicacion,
                                            $contenido1,
                                            $motivo,
                                            $titulo,
                                            $date,
                                            $updatedBy);
            $stmt->execute() or die(mysqli_error($conexion));    
                break;
            case 'COND':
            $update= " CALL sp_ActualizarPublicacioCondolencia(?,?,?,?,?,?)";
            $stmt = mysqli_prepare($conexion, $update);
            $stmt->bind_param("ssssss",$id_publicacion,
                                            $contenido1,
                                            $motivo,
                                            $titulo,
                                            $date,
                                            $updatedBy);
            $stmt->execute() or die(mysqli_error($conexion));    
                break;
            case 'POST':
            $update= " CALL sp_ActualizarPublicacionPostulate(?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($conexion, $update);
            $stmt->bind_param("sssssssss",$id_publicacion,
                                            $contenido1,
                                            $contenido2,
                                            $contenido3,
                                            $motivo,
                                            $fecha,
                                            $correo,
                                            $date,
                                            $updatedBy);
            $stmt->execute() or die(mysqli_error($conexion));

                    break;
        }
            
        }
echo'<script language="javascript">
        alert("Registro Actualizado Con Exito");
        location.href="../../publicacion.php";
    </script>';


?>


