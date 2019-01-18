$(document).ready(() => {
    
    $("a[id='opcionPub']").on("click", () => {

       	$("#c").toggle(300);
			$("div[id='contenedor_tabla_publicacion']").show(); //muestro mediante id



    });
    
});

