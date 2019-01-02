<?php

require_once('../conexion/conexion.php');
if (!empty($_GET['elegido'])) {

    $link = conectar();

    $sql = " SELECT ID_MUNICIPIO,MUNICIPIO
	         FROM estados as e inner join municipios as m using(ID_ESTADO)
	         WHERE e.ID_ESTADO='$_GET[elegido]'";

    $rs = mysqli_query($link, $sql);

    echo " <option value=''>Municipio</option>";
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

        echo "<option value='$row[0]'> $row[1] </option>";
    }
}
?>
