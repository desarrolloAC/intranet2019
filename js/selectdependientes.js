$(document).ready(function () {

    $("#pai").change(function () {
        $("#edo").load('php/estados.php?elegido=' + $(this).val());
    });

    $("#edo").change(function () {
        $("#mun").load('php/municipios.php?elegido=' + $(this).val());
    });

    $("#edo").change(function () {
        $("#ciu").load('php/ciudades.php?elegido=' + $(this).val());
    });

    $("#mun").change(function () {
        $("#par").load('php/parroquias.php?elegido=' + $(this).val());
    });

    $("#txtDpto").change(() => {
        alert($("#txtDpto").val());
        $("#txtCargo").load('php/selectCargos.php?elegido=' + $("#txtDpto").val());
    });

    $("#txtDpto1").change(() => {
        alert($("#txtDpto1").val());
        $("#txtCargo1").load('php/selectCargos.php?elegido=' + $("#txtDpto1").val());
    });


});
