<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="condolencia.css">

	<SCRIPT LANGUAGE="JavaScript">
     
        function textCounter(field, countfield, maxlimit) {
        if (field.value.length > maxlimit) 
        field.value = field.value.substring(0, maxlimit);

        else 
        countfield.value = maxlimit - field.value.length;
        }
     
    </script>
        

</head>

<body>

	<!--<a href="#formularioAvanceInformativo">abrir formulario</a>-->

	<!--INICIO DIV CONTENEDOR FORMULARIO-->
	<div id="formularioCondolencia" class="contenedorFormulario">
				
		<div id="formularioCondolencia">

			<a href="#" class="cerrar">X</a>

			<form method="POST" action="">
				
				<input id="txtCodigoSubCategoriaCondolencia" type="text" name="txtCodigoSubCategoriaCondolencia" value="" maxlength="4">

				<textarea id="txtContenidoCondolencia" name="txtContenidoCondolencia" onKeyDown="textCounter(this.form.txtContenidoCondolencia,this.form.remLen,500);" onKeyUp="textCounter(this.form.txtContenidoCondolencia,this.form.remLen,500);" placeholder="Descripcion" required></textarea>

				<input id="ncaracteresCondolencia" readonly type=text name=remLen size=3 maxlength=3 value="500">
				<label id="tituloCaracteresCondolencia">Caracteres Restantes</label>
				
				<input id="btnRegistrarCondolencia" type="submit" name="btnRegistrarCondolencia" value="Registrar">

			</form>

		</div>

	</div>
	<!--FIN DIV CONTENEDOR FORMULARIO-->

</body>

</html>