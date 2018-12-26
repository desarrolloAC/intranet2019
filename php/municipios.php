 
<?php
  require_once('../conexion/conexion.php');
  if (!empty($_GET['elegido'])) {
		 
	$link=conectar();

	$query=" SELECT ID_MUNICIPIO,MUNICIPIO 
	         FROM estados as e inner join municipios as m using(ID_ESTADO) 
	         WHERE e.ID_ESTADO='$_GET[elegido]'";
		 
			$rs=mysql_query($query,$link);

			echo " <option value=''>Municipio</option>";
			 while ($row=mysql_fetch_array($rs)){
		    
			   echo "<option value='$row[0]'> $row[1] </option>";
			}
		 
			mysql_free_result($rs);
	}
?>										