<?php
	require_once('../conexion/conexion.php');
	if (!empty($_GET['elegido'])) { 

	$link=conectar();

	$query=" SELECT id_estado,estado 
	         FROM paises as p inner join estados e using(ID_PAIS) 
	         WHERE p.ID_PAIS='$_GET[elegido]'";
			 
		$rs=mysql_query($query,$link);
		 
		echo " <option value=''>Estado</option>";
		while ($row=mysql_fetch_array($rs)){	     
			echo "<option value='$row[0]'>".$row[1]."</option>";
		}
		 
		mysql_free_result($rs);
	}
?>										