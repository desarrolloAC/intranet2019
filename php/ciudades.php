<?php

require_once('../conexion/conexion.php');

if (!empty($_GET['elegido'])) {

    $link = conectar();

    $sql = " SELECT ID_CIUDAD,CIUDAD
	         FROM estados as e inner join ciudades as c using(ID_ESTADO)
	         WHERE e.ID_ESTADO='$_GET[elegido]'";

    $rs = mysqli_query($link, $sql);

    echo " <option value=''>Ciudad</option>";
    while ($row = mysqli_fetch_array($rs, MYSQLI_NUM)) {
        echo "<option value='$row[0]'> $row[1] </option>";
    }
}
?>
