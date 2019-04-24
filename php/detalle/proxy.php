<?php

$id = $_GET['id'];
$subcategoria = $_GET['subcategoria'];

switch ($subcategoria) {

    case 'AVIF':
        echo'<script language="javascript">
            location.href="../../detalleAvanceInformativo.php?id=' . $id . '";
        </script>';
        break;

    case 'BOIF':
        echo'<script language="javascript">
            location.href="../../detalleBoletinInformativo.php?id=' . $id . '";
        </script>';
        break;

    case 'COMU':
        echo'<script language="javascript">
            location.href="../../detalleComunicado.php?id=' . $id . '";
        </script>';
        break;

    case 'COND':
        echo'<script language="javascript">
            location.href="../../detalleCondolencia.php?id=' . $id . '";
        </script>';
        break;

    case 'GENE':
        echo'<script language="javascript">
            location.href="../../detalleInvitacionGeneral.php?id=' . $id . '";
        </script>';
        break;

    case 'LOEX':
        echo'<script language="javascript">
            location.href="../../detalleLogroExtraCurrricular.php?id=' . $id . '";
        </script>';
        break;

    case 'CUPL':
        echo'<script language="javascript">
            location.href="../../detalleCumpleMes.php?id=' . $id . '";
        </script>';
        break;

    case 'NACI':
        echo'<script language="javascript">
            location.href="../../detalleNacimientos.php?id=' . $id . '";
        </script>';
        break;

    case 'NUAS':
        echo'<script language="javascript">
            location.href="../../detalleNuevoAcenso.php?id=' . $id . '";
        </script>';
        break;

    case 'NUIN':
        echo'<script language="javascript">
            location.href="../../detalleNuevoIngreso.php?id=' . $id . '";
        </script>';
        break;

    case 'POST':
        echo'<script language="javascript">
            location.href="../../detallePostulate.php?id=' . $id . '";
        </script>';
        break;

    case 'POES':
        echo'<script language="javascript">
            location.href="../../detallePromocionEscolar.php?id=' . $id . '";
        </script>';
        break;
    
    case 'FLAY':
        echo'<script language="javascript">
            location.href="../../detalleFlayers.php?id=' . $id . '";
        </script>';
        break;

    default:
        echo'<script language="javascript">
            location.href="../../index.php";
        </script>';
        break;
}