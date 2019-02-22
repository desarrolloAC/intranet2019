<?php

require_once('../conexion/conexion.php');

if (!empty($_GET['elegido'])) {
    $link = conectar();

    $sql = " SELECT s.ID_Subcategoria, s.Nombre
		         FROM categoria c
		         LEFT JOIN subcategoria s ON (c.ID_Categoria=s.ID_Categoria)
		         WHERE c.ID_Categoria='$_GET[elegido]'";

    $rs = mysqli_query($link, $sql);
    echo " <option value=''>Subcategoría</option>";
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

        echo "<option value='$row[ID_Subcategoria]'>" . $row['Nombre'] . "</option>";
    }
}
?>
