<?php

	@session_start();
	require_once('../conexion/conexion.php');
	require_once('estadosLogin.php');
    $conexion = conectar();

	$codigo         = trim($_POST['txtCodigoSubCategoria']);
	$codigo_cate    = $_POST['txtCodigoCategoria'];
	$nombre         = $_POST['txtNombreSubCategoria'];
	$descripcion    = $_POST['txtDesc'];

	//REALIZO LA CONSULTA COMPARANDO LA VARIABLE ENVIADA PARA VER SI YA EXISTE EN EL SISTEMA
	$sql = mysql_query("SELECT * FROM subcategoria WHERE ID_Subcategoria ='$codigo'");
	$vcodigo = mysql_num_rows($sql);

	if(!empty($vcodigo))
	{

		switch ($_SESSION['ID_Rol']) {
	        case TypeUsuario::ADMINISTRADOR:

	            echo'<script language="javascript">
	                    alert("El Código: '.$codigo.' Ya Existe. Ingrese uno Diferente. ");
	                    location.href="../menuAdministrador.php";
	                 </script>';
	            break;
	         case TypeUsuario::AUTORIZADOR:

	            echo'<script language="javascript">
	                alert("El Código: '.$codigo.' Ya Existe. Ingrese uno Diferente. ");
	                 location.href="../menuAutorizador.php";
	                 </script>';
	            break;
	         case TypeUsuario::EDITOR:

	            echo'<script language="javascript">
	                 alert("El Código: '.$codigo.' Ya Existe. Ingrese uno Diferente. ");
	                 location.href="../menuEditor.php";
	                 </script>';
	            break;
	         case TypeUsuario::PUBLICADOR:

	            echo'<script language="javascript">
	                 alert("El Código: '.$codigo.' Ya Existe. Ingrese uno Diferente. ");
	                 location.href="../menuPublicador.php";
	            </script>';
	            break;
	        default: //LECTOR

	            break;
	    }

	}
	else{

	   $sql = " INSERT INTO subcategoria
	              VALUES      ('$codigo','$codigo_cate','$nombre',DEFAULT,NOW(),'$_SESSION[Cedula]',NOW(),'$_SESSION[Cedula]','$descripcion')";

	   $agregarCategoria = mysql_query ($sql,$conexion);


	   switch ($_SESSION['ID_Rol']) {
	        case TypeUsuario::ADMINISTRADOR:

	            echo'<script language="javascript">
	                 alert("SubCategoría creada con exito");
	                 location.href="../menuAdministrador.php";
	                 </script>';
	            break;
	         case TypeUsuario::AUTORIZADOR:

	            echo'<script language="javascript">
	                 alert("SubCategoría creada con exito");
	                 location.href="../menuAutorizador.php";
	                 </script>';
	            break;
	         case TypeUsuario::EDITOR:

	            echo'<script language="javascript">
	                 alert("SubCategoría creada con exito");
	                 location.href="../menuEditor.php";
	                 </script>';
	            break;
	         case TypeUsuario::PUBLICADOR:

	            echo'<script language="javascript">
	                  alert("SubCategoría creada con exito");
	                 location.href="../menuPublicador.php";
	            </script>';
	            break;
	        default: //LECTOR

	            break;
	    }
	}

?>
