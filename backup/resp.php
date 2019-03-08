<?php

/*
 * Talento humano opcion ascensos.
 * <a id="botones" href="#formularioNuevoAscenso">Ascenso</a>
  include $_SERVER['DOCUMENT_ROOT'] . '/intranet/php/categoriaparapublicar/nuevoAscenso.php';
 *
 *
 *
 *
 *
 *
 */

<script type = "text/javascript">
const Publicacion = new Vue({
el: '#contenido2',
 created: function () {
this.getPublicaciones();
},
 data: {
list: []
},
 methods: {
getPublicaciones: function () {
const contenidoBandejaUrl = 'php/notificaciones/GetNotificaciones.php';

this.$http.get(contenidoBandejaUrl).then((responsed) => {
this.list = responsed.body;
});
},
 }
})
})
?>
