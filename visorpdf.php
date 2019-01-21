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
    <a href="index.html">
        <img class="logoAlkes" src="assets/image/top/logoAlkes.png">
    </a>

    <div class="paren">

        <?php

            $id=$_GET['id'];

            switch ($id) {

                case 'iso0':
                    echo '<iframe class="frame" src="http://192.168.0.130/SITE/PROCESOS/documentos/DNAI-1.pdf" type="application/pdf" />';
                     break;

                case 'iso1':
                    echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/normas-version-4-2012.pdf" type="application/pdf" />';
                     break;

                case 'iso2':
                    echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/ISO19011-2011.pdf" type="application/pdf" />';
                     break;

                case 'iso3':
                    echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/UNIT-ISO%209001%202015%20DESBLOQUEADO.pdf" type="application/pdf" />';
                     break;

                case 'iso4':
                    echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/ISO_9001_2008.pdf" type="application/pdf" />';
                     break;

                case 'iso5':
                    echo '<iframe class="frame" src="http://192.168.0.130/site/procesos/Documentos/NTC-ISO%209004.pdf" type="application/pdf" />';
                     break;

                default:
                    echo '<iframe class="frame" src="http://localhost/intranet/index.php" type="application/pdf" />';
            }
     ?>

    </div>

</body>

</html>
