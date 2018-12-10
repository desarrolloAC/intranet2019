<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="postulate.css">

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

	<!--<a href="#formularioPostulate">abrir formulario</a>-->

	<!--INICIO DIV CONTENEDOR FORMULARIO-->
	<div id="formularioPostulate" class="contenedorFormulario">
				
		<div id="formularioPostulate">

			<a href="#" class="cerrar">X</a>

			<form method="POST" action="">
				
				<input id="txtCodigoSubCategoriaPostulate" type="text" name="txtCodigoSubCategoriaPostulate" value="" maxlength="4">

				<input id="txtCodigoOrganizacionPostulate" type="text" name="txtCodigoOrganizacionPostulate" value="" maxlength="4">

				<textarea id="txtContenidoPostulate" name="txtContenidoPostulate" onKeyDown="textCounter(this.form.txtContenidoPostulate,this.form.remLen,500);" onKeyUp="textCounter(this.form.txtContenidoPostulate,this.form.remLen,500);" placeholder="Requisitos" required></textarea>

				<input id="ncaracteresPostulate" readonly type=text name=remLen size=3 maxlength=3 value="500">
				<label id="tituloCaracteresPostulate">Caracteres Restantes</label>

				<textarea id="txtPosicionesPostulate" onKeyDown="textCounter(this.form.txtPosicionesPostulate,this.form.remLen1,500);" onKeyUp="textCounter(this.form.txtPosicionesPostulate,this.form.remLen1,500);" placeholder="Posiciones" required></textarea>

				<input id="ncaracteresPostulate2" readonly type=text name=remLen1 size=3 maxlength=3 value="500">

				<label id="tituloCaracteresPostulate2">Caracteres Restantes</label>

				<textarea id="txtResponsabilidadesPostulate" onKeyDown="textCounter(this.form.txtResponsabilidadesPostulate,this.form.remLen2,500);" onKeyUp="textCounter(this.form.txtResponsabilidadesPostulate,this.form.remLen2,500);" placeholder="Responsabilidades" required></textarea>

				<input id="ncaracteresPostulate1" readonly type=text name=remLen2 size=3 maxlength=3 value="500">
				<label id="tituloCaracteresPostulate1">Caracteres Restantes</label>
				
				<input id="btnRegistrarPostulate" type="submit" name="btnRegistrarPostulate" value="Registrar">

			</form>

		</div>

	</div>
	<!--FIN DIV CONTENEDOR FORMULARIO-->

</body>

</html>