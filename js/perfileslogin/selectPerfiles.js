$(document).ready(() => {

    /*Para Categorìas ySubcategorías. cuando registras*/
    $("#txtOrg").change(() => {
        alert($("#txtOrg").val());
        $("#txtPerfil").load('php/login/selectRoles.php?elegido=' + $("#txtOrg").val());

    });

});
