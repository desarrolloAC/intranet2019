<?php

	require_once('../conexion/conexion.php');
	
	if (!empty($_GET['elegido']))
	{
		$link = conectar();
		$query=" SELECT s.ID_Subcategoria, s.Nombre 
		         FROM categoria c
		         LEFT JOIN subcategoria s ON (c.ID_Categoria=s.ID_Categoria)
		         WHERE c.ID_Categoria='$_GET[elegido]'";
	
		    $rs=mysql_query($query,$link);			 
			echo " <option value=''>Subcategoría</option>";
			while ($row=mysql_fetch_array($rs)){
		     
			echo "<option value='$row[ID_Subcategoria]'>".$row['Nombre']."</option>";
			}
			 
			mysql_free_result($rs);
	}
	
?>	