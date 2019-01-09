<link rel="stylesheet" type="text/css" href="promocionEscolar.css">

<script>

    function textCounter(field, countfield, maxlimit) {
        if (field.value.length > maxlimit)
            field.value = field.value.substring(0, maxlimit);

        else
            countfield.value = maxlimit - field.value.length;
    }

</script>



<!--<a href="#formulario">abrir formulario</a>-->

<!--INICIO DIV CONTENEDOR FORMULARIO-->
<div id="formularioPromocionEscolar" class="contenedorFormulario">

    <div id="formularioPromocionEscolar">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionPromocionEscolar.php">

            <input id="txtCodigoSubCategoriaPromocionEscolar" type="text" name="txtCodigoSubCategoriaPromocionEscolar" value="" maxlength="4">

            <input id="txtNombreCompletoPromocionEscolar" type="text" name="txtNombreCompletoPromocionEscolar" value="" maxlength="100" placeholder="Nombre Completo" required>

            <textarea id="txtContenidoPromocionEscolar" name="txtContenidoPromocionEscolar" onKeyDown="textCounter(this.form.txtContenidoPromocionEscolar, this.form.remLen, 500);" onKeyUp="textCounter(this.form.txtContenidoPromocionEscolar, this.form.remLen, 500);" placeholder="Descripcion" required></textarea>

            <input id="ncaracteresPromocionEscolar" readonly type=text name=remLen size=3 maxlength=3 value="500">

            <label id="tituloCaracteresPromocionEscolar">Caracteres Restantes</label>

            <input id="btnImagenPromocionEscolar" type="file" name="btnImagenPromocionEscolar" required>

            <input id="btnRegistrarPromocionEscolar" type="submit" name="btnRegistrarPromocionEscolar" value="Registrar">

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
