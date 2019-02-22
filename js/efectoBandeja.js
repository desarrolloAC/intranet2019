/* Con esto se esta diciendo "una vez que se cargue el sitio",
			cuando eso se cumpla se sigue con lo demas */
$(function () {

    $('#contenidoBandeja').hide(); /*CUANDO SE CAGAR LA PAGINA LA CAJA SALA OCULTA POR DEFECTO*/

    /* Usamos la funcion toggle, que sirve para hacer cierta acción con el primer click
				y otra con el segundo. Los clicks se deben hacer sobre #login que es el
				identificador de "login" en nuestro menu */
    $('#abrirBandeja').toggle(function () {

        /* Con el primer click, hacemos que el formulario se despliegue hacia abajo */
        $('#contenidoBandeja').slideDown();


    }, function () {
        //y con el segundo click...
        $('#contenidoBandeja').slideUp();
        // hacemos que el formuario se "guarde" hacia arriba


    }); //cerramos la funcion que realiza toggle

});
/* Cerramos las funciones, no lo hicimos 2 veces,
recuerden que esto va abajo de la funcion anterior y antes del cierre */
