$(document).ready(() => {

    /*Para Categorìas ySubcategorías. cuando registras*/
    $("#txtOrg").change(() => {

        $("#txtPerfil").load('php/login/selectRoles.php?elegido=' + $("#txtOrg").val());

    });

});
