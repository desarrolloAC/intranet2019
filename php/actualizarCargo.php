<?php
    @session_start();
    include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';
    require_once('estadosLogin.php');
	$conexion =  conectar();

	$codigo         = trim($_POST["txtCodigo"]);
	$dpto           = $_POST["txtDep"];
	$nombre			= $_POST["txtNombre"];
	$descripcion    = $_POST["txtDesc"];
	$updatedBy 		= $_SESSION['Cedula'];

	$editar = " UPDATE cargo
	            Set    Nombre	        ='$nombre',
	                   ID_Departamento  ='$dpto',
	                   Descripcion      ='$descripcion',
					   updated 	 	    = now(),
					   updatedBy        ='$updatedBy'
	            WHERE  ID_Cargo   	    ='$codigo'";

	mysqli_query($conexion,$editar);

    switch ($_SESSION['ID_Rol']) {
        case TypeUsuario::ADMINISTRADOR:

            echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuAdministrador.php";
                 </script>';
            break;
         case TypeUsuario::AUTORIZADOR:

            echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuAutorizador.php";
                 </script>';
            break;
         case TypeUsuario::EDITOR:

            echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuEditor.php";
                 </script>';
            break;
         case TypeUsuario::PUBLICADOR:

            echo'<script language="javascript">
                  alert("Registro Actualizado Con Exito");
                 location.href="../menuPublicador.php";
            </script>';
            break;
        default: //LECTOR

            break;
    }
?>
