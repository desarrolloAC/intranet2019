<link rel="stylesheet" type="text/css" href="nuevoIngresoAscenso.css">


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



<!--<a href="#formularioNuevoIngresoAscenso">abrir formulario</a>-->

<!--INICIO DIV CONTENEDOR FORMULARIO-->
<div id="formularioNuevoIngresoAscenso" class="contenedorFormulario">

    <div id="formularioNuevoIngresoAscenso">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="">

            <input id="txtCodigoSubCategoriaNuevoAscenso" type="text" name="txtCodigoSubCategoriaNuevoAscenso" value="" maxlength="4">

            <input id="txtNombreCompletoNuevoAscenso" type="text" name="txtNombreCompletoNuevoAscenso" placeholder="Nombre Completo" required>

            <?php

					echo "
						<select name='txtDpto' class='combos_formulario_usuario' id='txtDpto' required >
						<option> Departamento </option>";

						$sql=" SELECT d.ID_Departamento,d.Nombre FROM departamento d WHERE d.Estatus='A'";
						$rs=mysqli_query($conexion,$sql);
						if($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
							do{
							   echo "<option value='$row[ID_Departamento]'> $row[Nombre] </option>";
							}while ($row=mysqli_fetch_array($rs,MYSQLI_ASSOC));
						}

                echo "</select>";
			 	?>

            <select name='txtCargo' class='combos_formulario_usuario' id='txtCargo' required>
                <option> Cargo </option>
            </select>

            <textarea id="txtContenidoNuevoAscenso" name="txtContenidoNuevoAscenso" onKeyDown="textCounter(this.form.txtContenidoNuevoAscenso,this.form.remLen,500);" onKeyUp="textCounter(this.form.txtContenidoNuevoAscenso,this.form.remLen,500);" placeholder="Descripcion" required></textarea>

            <input id="ncaracteresNuevoAscenso" readonly type=text name=remLen size=3 maxlength=3 value="500">

            <label id="tituloCaracteresNuevoAscenso">Caracteres Restantes</label>

            <input id="btnImagenNuevoAscenso" type="file" name="btnImagenNuevoAscenso" required>

            <input id="btnRegistrarNuevoAscenso" type="submit" name="btnRegistrarNuevoAscenso" value="Registrar">

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
