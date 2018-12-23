<?php
	require_once('../conexion/conexion.php');
	if (!empty($_GET['elegido'])) { 

	$link=conectar();

	$query="SELECT c.ID_Cargo,c.Nombre 
			FROM departamento d 
			RIGHT JOIN cargo c ON (d.ID_Departamento=c.ID_Departamento)
			where d.ID_Departamento= '$_GET[elegido]' AND c.Estatus='A'
			ORDER BY c.ID_Cargo ";
			 
		$rs=mysql_query($query,$link);
		 
		echo " <option value=''>Cargo</option>";
		while ($row=mysql_fetch_array($rs)){
	     
		echo "<option value='$row[0]'>".$row[1]."</option>";
		}
		 
		mysql_free_result($rs);
	}
?>										