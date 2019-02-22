<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';
?>


<link rel="stylesheet" type="text/css" href="nacimiento.css">

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
<div id="formularioNacimiento" class="contenedorFormulario">

    <div id="formularioNacimiento">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionNacimientos.php">

            <input id="txtCodigoSubCategoriaNacimiento" type="text" name="txtCodigoSubCategoriaNacimiento" value="NACI" maxlength="4">

            <input id="txtNombreCompletoNacimiento" type="text" name="txtNombreCompletoNacimiento" value="" maxlength="100" placeholder="Nombre Completo" required>

            <textarea id="txtContenidoNacimiento"
                      name="txtContenidoNacimiento"
                      onKeyDown="textCounter(this.form.txtContenidoPromocionEscolar, this.form.remLen, 500);"
                      onKeyUp="textCounter(this.form.txtContenidoPromocionEscolar, this.form.remLen, 500);"
                      placeholder="Descripcion"
                      required></textarea>

            <input id="ncaracteresNacimiento" readonly type=text name=remLen size=3 maxlength=3 value="500">

            <label id="tituloCaracteresNacimiento">Caracteres Restantes</label>

            <input id="btnImagenNacimiento" type="file" name="btnImagenNacimiento" required>

            <input id="btnRegistrarNacimiento" type="submit" name="btnRegistrarNacimiento" value="Registrar">


             <?php
            $sql = " SELECT * FROM organizacion o WHERE o.Estatus = 'A' AND o.ID_Organizacion = '" . $_SESSION['ID_Organizacion'] . "';";
            $rs = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
            $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
            echo '<img class="logoNacimiento" src="' . $row['foto'] . '" type="image/png" width="100" height="100"></img>';
            ?>
        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
