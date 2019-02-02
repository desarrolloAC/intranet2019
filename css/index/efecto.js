$(document).ready(function () {

    //para abrir el cuadro del menu.
    $("#menu-wrapper").click(function (event) {
        event.stopPropagation();
        $("#menu-container .menu-list").toggleClass("active");
        $("#menu-container .menu-list").animate({
            left: $("#menu-container .menu-list").hasClass("active") ? "0%" : "-100%"
        }, 400);
    });

    //Para el primer nivel
    $(".menu-list").find(".accordion-toggle").click(function () {

        //Abrir el menu
        $(this).next().toggleClass("open").slideToggle("fast");
        $(this).toggleClass("active-tab").find(".menu-link").toggleClass("active");

        //Cerrar todo los demas menus
        $(".menu-list .accordion-content").not($(this).next()).slideUp("fast").removeClass("open");
        $(".menu-list .accordion-toggle").not(jQuery(this)).removeClass("active-tab").find(".menu-link").removeClass("active");
    });

    //Para el segundo nivel
    $(".menu-list").find(".accordion-toggle2").click(function () {

        //Abrir el menu
        $(this).next().toggleClass("open").slideToggle("fast");
        $(this).toggleClass("active-tab").find(".menu-link").toggleClass("active");

        //Cerrar todo los demas menus
        $(".menu-list .accordion-content2").not($(this).next()).slideUp("fast").removeClass("open");
        $(".menu-list .accordion-toggle2").not(jQuery(this)).removeClass("active-tab").find(".menu-link").removeClass("active");
    });

    //Para el tercer nivel
    $(".menu-list").find(".accordion-toggle3").click(function () {

        //Abrir el menu
        $(this).next().toggleClass("open").slideToggle("fast");
        $(this).toggleClass("active-tab").find(".menu-link").toggleClass("active");

        //Cerrar todo los demas menus
        $(".menu-list .accordion-content3").not($(this).next()).slideUp("fast").removeClass("open");
        $(".menu-list .accordion-toggle3").not(jQuery(this)).removeClass("active-tab").find(".menu-link").removeClass("active");
    });

}); // jQuery load
