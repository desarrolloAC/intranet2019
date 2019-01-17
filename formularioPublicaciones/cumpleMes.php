<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';
?>

<link rel="stylesheet" type="text/css" href="cumpleMes.css">

<script>

    function textCounter(field, countfield, maxlimit) {

        if (field.value.length > maxlimit) {
            field.value = field.value.substring(0, maxlimit);

        } else {
            countfield.value = maxlimit - field.value.length;

        }
    }

</script>

<!--INICIO DIV CONTENEDOR FORMULARIO-->
<div id="formularioCumpleMes" class="contenedorFormulario">

    <div id="formularioCumpleMes">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionCumpleaneroMes.php">

            <input id="txtCodigoSubCategoriaCumpleMes" type="text" name="txtCodigoSubCategoriaCumpleMes" value="CUPL" maxlength="4">

            <input id="txtNombreCompletoCumpleMes" type="text" name="txtNombreCompletoCumpleMes" value="" maxlength="100" placeholder="Nombre Completo" required>

            <input id="txtFechaCumpleMes" type="date" name="txtFechaCumpleMes" required>

            <?php
            echo "
                <select name='txtDpto2' class='combos_formulario_usuario' id='txtDpto2' required >
                <option value=''> Departamento </option>";

            $sql = " SELECT d.ID_Departamento,d.Nombre FROM departamento d WHERE d.Estatus='A'";
            $rs = mysqli_query($conexion, $sql);
            if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                do {
                    echo "<option value='$row[ID_Departamento]'> $row[Nombre] </option>";
                } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
            }

            echo "</select>";
            ?>
            <input id="btnImagenCumpleMes" type="file" name="btnImagenCumpleMes" required>
            <?php
            $sql = " SELECT * FROM organizacion o WHERE o.Estatus = 'A' AND o.ID_Organizacion = '" . $_SESSION['ID_Organizacion'] . "';";
            $rs = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
            $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
            echo '<img src="' . $row[foto] . '" type="image/png" width="100" height="100"></img>';
            ?>
            <input id="btnRegistrarCumpleMes" type="submit" name="btnRegistrarCumpleMes" value="Registrar">

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
