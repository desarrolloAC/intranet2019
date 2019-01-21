<link rel="stylesheet" type="text/css" href="../css/categoriasParaPublicar.css">

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<!--INICIO DE LA TABLA CATEGORIAS PARA PUBLICAR-->
<table border="0" width="100%">
    <tr>
        <td>
            <div id="flip">Capsula Informativa</div>
            <div id="panel">
                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                <a id="botones" href="#formularioAvanceInformativo">Avance Informativo</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/avanceInformativo.php'; ?>
                <a id="botones" href="#formularioBoletinInformativo">Boletin Informativo</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/boletinInformativo.php'; ?>
                <a id="botones" href="#formularioComunicado">Comunicado</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/comunicado.php'; ?>
            </div>
        </td>
        <td>
            <div id="flip1">Invitaciones</div>
            <div id="panel1">
                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                <a id="botones" href="#formularioInvitacionGeneral">Generales</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/invitacionGeneral.php'; ?>
                <a id="botones" href="#">Flayers</a>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div id="flip2">Talento Humano</div>
            <div id="panel2">
                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                <a id="botones" href="#formularioNuevoIngresoAscenso">Nuevo Ingreso</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/nuevoIngresoAscenso.php'; ?>
                <a id="botones" href="#formularioNuevoAscenso">Ascenso</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/nuevoAscenso.php'; ?>
                <a id="botones" href="#formularioLogro">Logro Extracurricular</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/logro.php'; ?>
                <a id="botones" href="#formularioPostulate">Postulate</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/postulate.php'; ?>
            </div>
        </td>
        <td>
            <div id="flip3">Celebraciones</div>
            <div id="panel3">
                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                <a id="botones" href="#formularioCumpleMes">Cumpleañero Del Mes</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/cumpleMes.php'; ?>
                <a id="botones" href="#formularioNacimiento">Nacimiento</a>
                <?php include $_SERVER['DOCUMENT_ROOT'].'/intranet/formularioPublicaciones/nacimiento.php'; ?>
                <a id="botones" href="#formularioPromocionEscolar">Promocion Escolar</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/promocionEscolar.php'; ?>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div id="flip4">Infografia</div>
            <div id="panel4">
                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                <a id="botones" href="">Tips</a>
                <a id="botones" href="">Recomendaciones</a>
            </div>
        </td>
        <td>
            <div id="flip5">Folleto Informativo</div>
            <div id="panel5">
                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                <a id="botones" href="">Subir Folleto</a>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div id="flip6">Condolencias</div>
            <div id="panel6">
                <h4 id="titulo_panel">¿Que Puedes Publicar?</h4>
                <a id="botones" href="#formularioCondolencia">Condolencia</a>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/intranet/formularioPublicaciones/condolencia.php'; ?>
            </div>
        </td>
    </tr>
</table>
<!--FIN DE LA TABLA CATEGORIAS PARA PUBLICAR-->
