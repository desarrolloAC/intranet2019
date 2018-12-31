<?php

    require_once('../conexion/conexion.php');
    if (!empty($_GET['elegido'])) {

		$link=conectar();

		$sql=" SELECT ID_PARROQUIA,PARROQUIA
		         FROM municipios as m inner join parroquias as p using(ID_MUNICIPIO)
		         WHERE m.ID_MUNICIPIO='$_GET[elegido]'";

				$rs=mysql_query($sql,$link);

				echo " <option value=''>Parroquia</option>";
				while ($row=mysql_fetch_array($rs)){

				echo "<option value='$row[0]'> $row[1] </option>";
				}

				mysql_free_result($rs);
	}
?>
