<link rel="stylesheet" type="text/css" href="condolencia.css">

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
<div id="formularioCondolencia" class="contenedorFormulario">

    <div id="formularioCondolencia">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionFallecimiento.php">

            <input id="txtCodigoSubCategoriaCondolencia" type="text" name="txtCodigoSubCategoriaCondolencia" value="COND" maxlength="4">

            <textarea id="txtContenidoCondolencia"
                      name="txtContenidoCondolencia"
                      onKeyDown="textCounter(this.form.txtContenidoCondolencia, this.form.remLen, 500);"
                      onKeyUp="textCounter(this.form.txtContenidoCondolencia, this.form.remLen, 500);"
                      placeholder="Descripcion"
                      required></textarea>

            <input id="ncaracteresCondolencia" readonly type=text name=remLen size=3 maxlength=3 value="500">

            <label id="tituloCaracteresCondolencia">Caracteres Restantes</label>

            <input id="btnRegistrarCondolencia" type="submit" name="btnRegistrarCondolencia" value="Registrar">

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
