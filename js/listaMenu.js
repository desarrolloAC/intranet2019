$(document).ready(function(){
		$("a[id='opcionPub']").on("click", function() {

			$("#c").toggle(300);
			$("div[id='contenedor_tabla_publicacion']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
			$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_categorias']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='pcategorias']").on("click", function() {
            $("div[id='contenedor_tabla_pcategorias']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
			$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='categoria']").on("click", function() {

			$("div[id='contenedor_categorias']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
			$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='subcategoria']").on("click", function() {

			$("div[id='contenedor_tabla_subcategoria']").show(); //muestro mediante id

			$("div[id='contenedor_categorias']").hide();
			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
			$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='opcionCategoria']").on("click", function() {

			$("div[id='contenedor_tabla_categoria']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
	 		$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_categorias']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='opcionRol']").on("click", function() {

			$("div[id='contenedor_tabla_rol']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_categorias']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='opcionDirectorio']").on("click", function() {

			$("div[id='contenedor_tabla_directorio']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_categorias']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='opcionUsuario']").on("click", function() {

			$("div[id='contenedor_tabla_usuario']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
			$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_categorias']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='opcionOrg']").on("click", function() {

			$("div[id='contenedor_tabla_organizacion']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
			$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_categorias']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='opcionDpto']").on("click", function() {

			$("div[id='contenedor_tabla_departamento']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
			$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_categorias']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_cargo']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});

$(document).ready(function(){
		$("a[id='opcionCag']").on("click", function() {

			$("div[id='contenedor_tabla_cargo']").show(); //muestro mediante id

			$("div[id='contenedor_tabla_publicacion']").hide();
			$("div[id='contenedor_tabla_categoria']").hide();
			$("div[id='contenedor_tabla_rol']").hide();
			$("div[id='contenedor_tabla_directorio']").hide();
			$("div[id='contenedor_categorias']").hide();
			$("div[id='contenedor_tabla_usuario']").hide();
			$("div[id='contenedor_tabla_departamento']").hide();
			$("div[id='contenedor_tabla_organizacion']").hide();
			$("div[id='contenedor_tabla_subcategoria']").hide();
			$("div[id='contenedor_tabla_bandeja']").hide();
			$("div[id='contenedor_tabla_pcategorias']").hide();
		 });
});
