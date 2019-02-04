<!DOCTYPE html>
<html lang="en">

<head>
    <title>Intranet Alkes Corp, S.A</title>
    <meta name="viewport" content="width=device-width,device-height initial-scale=1.5" />
    <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
    <meta charset="utf-8">

    <link rel="icon" type="image/png" href="favicon.png" />
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all" />

    <style>

        body {
            padding: 0px;
            margin: 0px;
            background-color: var(--naraja-color);
        }

        .paren {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .frame {
            width: 60%;
            height: 99vh;
        }

        .logoAlkes {
            position: absolute;
            left: -3cm;
            top: 0.2cm;
            width: 12cm;
            height: 2.5cm;
            cursor: pointer;
        }

    </style>

</head>

<body>
    <a href="index.php">
        <img class="logoAlkes" src="assets/image/top/logoAlkes.png">
    </a>

    <div class="paren">

        <?php

            $id=$_GET['id'];

            switch ($id) {

                case 'iso1':
                    echo '<iframe class="frame" src="assets/document/sistema-integrado/iso/UNIT-ISO%209001%202015%20DESBLOQUEADO.pdf" type="application/pdf" />';
                     break;

                case 'iso2':
                    echo '<iframe class="frame" src="assets/document/sistema-integrado/iso/UNIT-ISO%209000%202015%20DESBLOQUEADO.pdf" type="application/pdf" />';
                     break;

                case 'iso3':
                    echo '<iframe class="frame" src="assets/document/sistema-integrado/iso/NORMA%20ISO22000%20GESTION_DE_INOCUIDAD_ALIMENTOS.pdf" type="application/pdf" />';
                     break;

                case 'iso4':
                    echo '<iframe class="frame" src="assets/document/sistema-integrado/iso/ISO_22000_2018(es).PDF-2" type="application/pdf" />';
                     break;

                case 'iso5':
                    echo '<iframe class="frame" src="assets/document/sistema-integrado/iso/ISO-19011-2011%20Directrices%20para%20la%20auditor%C3%ADa%20de%20Sistemas%20de%20Gesti%C3%B3n.pdf" type="application/pdf" />';
                     break;

                case 'iso6':
                    echo '<iframe class="frame" src="assets/document/sistema-integrado/iso/ISO%2019011%202018%20Espa%C3%B1ol%20oficial" type="application/pdf" />';
                     break;

                default:

            }
     ?>

    </div>

</body>

</html>
