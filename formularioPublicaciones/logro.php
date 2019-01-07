<link rel="stylesheet" type="text/css" href="logro.css">


<script>
    function textCounter(field, countfield, maxlimit) {
        if (field.value.length > maxlimit)
            field.value = field.value.substring(0, maxlimit);

        else
            countfield.value = maxlimit - field.value.length;
    }

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#txtDpto").change(function() {
            $("#txtCargo").load('../php/selectCargos.php?elegido=' + $(this).val());
        });
    });

</script>



<!--<a href="#formularioAvanceInformativo">abrir formulario</a>-->

<!--INICIO DIV CONTENEDOR FORMULARIO-->
<div id="formularioLogro" class="contenedorFormulario">

    <div id="formularioLogro">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="">

            <input id="txtCodigoSubCategoriaLogro" type="text" name="txtCodigoSubCategoriaLogro" value="" maxlength="4">

            <input id="txtTituloLogro" type="text" name="txtTituloLogro" value="" maxlength="100" placeholder="Tipo De Logro" required>

            <textarea id="txtContenidoLogro" name="txtContenidoLogro" onKeyDown="textCounter(this.form.txtContenidoLogro,this.form.remLen,500);" onKeyUp="textCounter(this.form.txtContenidoLogro,this.form.remLen,500);" placeholder="Descripcion" required></textarea>

            <input id="ncaracteresLogro" readonly type=text name=remLen size=3 maxlength=3 value="500">
            <label id="tituloCaracteresLogro">Caracteres Restantes</label>

            <input id="txtNombreCompletoLogro" type="text" name="txtNombreCompletoLogro" placeholder="Nombre Completo" required>

            <?php

					echo "
						<select name='txtDpto' class='combos_formulario_usuario' id='txtDpto1' required >
						<option value=''> Departamento </option>";

						$sql=" SELECT d.ID_Departamento,d.Nombre FROM departamento d WHERE d.Estatus='A'";
						$rs=mysqli_query($conexion,$sql);
						if($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
							do{
							   echo "<option value='$row[ID_Departamento]'> $row[Nombre] </option>";
							}while ($row=mysqli_fetch_array($rs,MYSQLI_ASSOC));
						}
						echo "</select>";
			 	?>

            <select name='txtCargo' class='combos_formulario_usuario' id='txtCargo1' required>
                <option value=""> Cargo </option>
            </select>

            <input id="btnImagenLogro" type="file" name="btnImagenLogro" required>
            <input id="btnImagenLogro1" type="file" name="btnImagenLogro1" required>

            <input id="btnRegistrarLogro" type="submit" name="btnRegistrarLogro" value="Registrar">

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
