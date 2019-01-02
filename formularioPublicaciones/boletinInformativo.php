<?php

	@session_start();

	$sql = "SELECT ID_Subcategoria FROM subcategoria WHERE ID_Subcategoria='BOIF'";

	$subc = mysqli_query($conexion,$sql);

	$selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";

	$nombreOrg = mysqli_query($conexion,$selectOrg);

	$org=mysqli_fetch_array($nombreOrg,MYSQLI_ASSOC);

?>

<!DOCTYPE html>

<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="boletinInformativo.css">

    <script>

        function textCounter(field, countfield, maxlimit) {
        if (field.value.length > maxlimit)
        field.value = field.value.substring(0, maxlimit);

        else
        countfield.value = maxlimit - field.value.length;
        }

    </script>


</head>

<body>

    <!--<a href="#formularioBoletinInformativo">abrir formulario</a>-->

    <!--INICIO DIV CONTENEDOR FORMULARIO-->
    <div id="formularioBoletinInformativo" class="contenedorFormulario">

        <div id="formularioBoletinInformativo">

            <a href="#" class="cerrar">X</a>

            <form method="POST" action="php/registrarBoletinInformativo.php" enctype="multipart/form-data">

                <input id="txtCodigoSubCategoriaBoletinInformativo" type="text" name="txtCodigoSubCategoriaBoletinInformativo" value="<?php while($ver = mysqli_fetch_array($subc,MYSQLI_ASSOC))
					{
						echo $ver['ID_Subcategoria'];
					}	?>" maxlength="4" readonly>

                <input id="txtCodigoOrganizacionBoletinInformativo" type="text" name="txtCodigoOrganizacionBoletinInformativo" value="<?php echo $org['Nombre']; ?>" maxlength="4">

                <input id="txtTituloBoletinInformativo" type="text" name="txtTituloBoletinInformativo" value="" maxlength="100" placeholder="Titulo De La Publicacion" required>

                <textarea id="txtContenidoBoletinInformativo" name="txtContenidoBoletinInformativo" onKeyDown="textCounter(this.form.txtContenidoBoletinInformativo,this.form.remLen,500);" onKeyUp="textCounter(this.form.txtContenidoBoletinInformativo,this.form.remLen,500);" placeholder="Contenido De La Publicacion" required></textarea>

                <input id="ncaracteresBoletinInformativo" readonly type=text name=remLen size=3 maxlength=3 value="500">
                <label id="tituloCaracteresBoletinInformativo">Caracteres Restantes</label>

                <input id="btnImagenBoletinInformativo" type="file" name="archivo" required>
                <input id="btnImagenBoletinInformativo1" type="file" name="archivo1">
                <input id="btnImagenBoletinInformativo2" type="file" name="archivo2">
                <input id="btnImagenBoletinInformativo3" type="file" name="archivo3">

                <input id="btnRegistrarBoletinInformativo" type="submit" name="btnRegistrarBoletinInformativo" value="Registrar">

            </form>

        </div>

    </div>
    <!--FIN DIV CONTENEDOR FORMULARIO-->

</body>

</html>
