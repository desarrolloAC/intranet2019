$(document).ready(function() {
     setInterval(
        function(){
          $('#contenidoBandeja').load('php/notificaciones.php');
        },20000
      );
});