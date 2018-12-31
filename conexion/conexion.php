<?php

//PARA NO MOSTRAR LOS ERRORES
//error_reporting(0);

function conectar() {

	//REALIZO LA CONEXION A MYSQL
	$link = mysqli_connect("localhost","root","12345678","intranet");

    //VERIFICANDO LA CONEXION.
    if (mysqli_connect_errno()) {
        echo "Error al conectar con MySQL: " . mysqli_connect_error();
        exit();
    }

	//SELECCIONO LA BASE DE DATOS QUE VOY A USAR
	if (!mysqli_select_db($link, "intranet")) {
		echo"Error seleccionando la Base de Datos.";
		exit();
	 }

	mysqli_query($link, "SET NAMES UTF8");
	return $link;

 }//FIN DE LA FUNCION CONECTAR


?>
