<?php

//PARA NO MOSTRAR LOS ERRORES
//error_reporting(0);

function conectar()
{

	//REALIZO LA CONEXION A MYSQL
	if(!($link = mysql_connect("192.168.30.25","workbench","12345678")))
	{
	   	echo"Error conectando a la base de datos.";
	 	exit();
	}

	//SELECCIONO LA BASE DE DATOS QUE VOY A USAR
	if(!mysql_select_db("intranet", $link)){
		echo"Error seleccionando la Base de Datos.";
		exit();
	 }

	mysql_query('SET NAMES UTF8');
	return $link;

 }//FIN DE LA FUNCION CONECTAR

?>