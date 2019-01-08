<?php
@session_start();

$sql = "SELECT ID_Subcategoria FROM subcategoria WHERE ID_Subcategoria='COMU'";
$subc = mysqli_query($conexion, $sql);

$selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";
$nombreOrg = mysqli_query($conexion, $selectOrg);
$org = mysqli_fetch_array($nombreOrg, MYSQLI_ASSOC);
//
?>



<link rel="stylesheet" type="text/css" href="comunicado.css">

<script>

    function textCounter(field, countfield, maxlimit) {

        if (field.value.length > maxlimit) {
            field.value = field.value.substring(0, maxlimit);

        } else {
            countfield.value = maxlimit - field.value.length;

        }
    }

</script>




<!--<a href="#formularioComunicado">abrir formulario</a>-->

<!--INICIO DIV CONTENEDOR FORMULARIO-->
<div id="formularioComunicado" class="contenedorFormulario">

    <div id="formularioComunicado">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionFallecimiento.php">

            <input id="txtCodigoSubCategoriaComunicado" type="text" name="txtCodigoSubCategoriaComunicado" value="<?php
            while ($ver = mysqli_fetch_array($subc, MYSQLI_ASSOC)) {
                echo $ver['ID_Subcategoria'];
            }
            ?>" maxlength="4">

            <input id="txtCodigoOrganizacionComunicado" type="text" name="txtCodigoOrganizacionComunicado" value="<?php echo $org['Nombre']; ?>" maxlength="4">

            <input id="txtTituloComunicado" type="text" name="txtTituloComunicado" value="" maxlength="100" placeholder="Titulo De La Publicacion" required>

            <textarea id="txtContenidoComunicado" name="txtContenidoComunicado" onKeyDown="textCounter(this.form.txtContenidoComunicado, this.form.remLen, 500);" onKeyUp="textCounter(this.form.txtContenidoComunicado, this.form.remLen, 500);" placeholder="Contenido De La Publicacion" required></textarea>

            <input id="ncaracteresComunicado" readonly type=text name=remLen size=3 maxlength=3 value="500">
            <label id="tituloCaracteresComunicado">Caracteres Restantes</label>

            <input id="btnRegistrarComunicado" type="submit" name="btnRegistrarComunicado" value="Registrar">

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
