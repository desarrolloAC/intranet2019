<!--INICIO CONTENEDOR CABECERA-->
<div id="contenedorCabecera">

    <!--INICIO CONTENEDOR LOGO ALKES-->
    <div id="contenedorLogo">
        <a href="index.html">
            <img class="logo" src="imagenes\top\logoAlkes.png" width="500" height="100">
        </a>

    </div>
    <!--FIN CONTENEDOR LOGO ALKES-->


    <!--INICIO CONTENEDOR BANDEJA DE ENTRADA -->
    <div id="bandeja">

        <a href="#" id="abrirBandeja">Bandeja De Entrada
            <img id="imagenBandeja" src="imagenes/top/bandeja.png">

            <?php
            $conexion = conectar();
            $numero = "SELECT COUNT(leido) AS n FROM notificacion where leido=0";
            $sql = mysqli_query($conexion, $numero);

            while ($ver = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                echo "<div id='nNotificacion'>" . "<h5 id='rNumero'>" . $ver["n"] . "</h5>" . "</div>";
            }
            ?>

        </a>



        <div id="contenidoBandeja">

            <?php
            $conexion = conectar();
            $sql = " SELECT * FROM notificacion WHERE leido=0 ORDER BY ID_Notificacion DESC ";
            $rs = mysqli_query($conexion, $sql);

            while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

                switch ($_SESSION['ID_Rol']) {

                    case TypeUsuario::ADMINISTRADOR:

                        /* INGRESAR EL USUARIO COMO ADMINISTRADOR */
                        switch ($row['Estado_Public']) {

                            case EstadoPublicacion::RECHAZADO_A:
                                echo "<div id='contenedorNotificaciones'>
                               <a id='enlaceNotificaciones' href='#$row[ID_Publicacion]'> $row[Mensaje]</a>
                             </div>";
                                break;

                            case EstadoPublicacion::RECHAZADO_E:
                                echo "<div id='contenedorNotificaciones'>
                               <a id='enlaceNotificaciones' href='#$row[ID_Publicacion]'> $row[Mensaje]</a>
                             </div>";
                                break;

                            case EstadoPublicacion::REVISION_E:
                                echo "<div id='contenedorNotificaciones'>
                               <a id='enlaceNotificaciones' href='#$row[ID_Publicacion]'> $row[Mensaje]</a>
                             </div>";
                                break;

                            case EstadoPublicacion::REVISION_A:
                                echo "<div id='contenedorNotificaciones'>
                               <a id='enlaceNotificaciones' href='#$row[ID_Publicacion]'> $row[Mensaje]</a>
                             </div>";
                                break;

                            case EstadoPublicacion::PUBLICADA:
                                echo "<div id='contenedorNotificaciones'>
                               <a id='enlaceNotificaciones' href='#$row[ID_Publicacion]'> $row[Mensaje]</a>
                             </div>";
                                break;

                            default:// EstadoPublicacion::BORR:;
                                break;
                        } //FIN SWITCH

                        break;

                    case TypeUsuario::AUTORIZADOR:

                        /* INGRESAR EL USUARIO COMO AUTORIZADOR */

                        switch ($row['Estado_Public']) {

                            case EstadoPublicacion::RECHAZADO_A:
                                break;

                            case EstadoPublicacion::RECHAZADO_E:
                                break;

                            case EstadoPublicacion::REVISION_E:
                                break;

                            case EstadoPublicacion::REVISION_A:
                                echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
                                break;

                            case EstadoPublicacion::PUBLICADA:
                                echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
                                break;

                            default:
                                break;
                        } //FIN SWITCH

                        break;

                    case TypeUsuario::EDITOR:

                        /* INGRESAR EL USUARIO COMO EDITOR */

                        switch ($row['Estado_Public']) {

                            case EstadoPublicacion::RECHAZADO_A:
                                echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
                                break;

                            case EstadoPublicacion::RECHAZADO_E:
                                break;

                            case EstadoPublicacion::REVISION_E:
                                echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
                                break;

                            case EstadoPublicacion::REVISION_A:
                                break;

                            case EstadoPublicacion::PUBLICADA:
                                echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
                                break;

                            default:
                                break;
                        } //FIN SWITCH  EDITOR

                        break;

                    case TypeUsuario::PUBLICADOR:

                        /* INGRESAR EL USUARIO COMO EDITOR */

                        switch ($row['Estado_Public']) {

                            case EstadoPublicacion::RECHAZADO_A:
                                break;

                            case EstadoPublicacion::RECHAZADO_E:
                                echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
                                break;

                            case EstadoPublicacion::REVISION_E:
                                break;

                            case EstadoPublicacion::REVISION_A:
                                break;

                            case EstadoPublicacion::PUBLICADA:
                                echo "<li> <a href='#$row[ID_Publicacion]'> $row[Mensaje] </a> </li>";
                                break;

                            default:

                                break;
                        } //FIN SWITCH PUBLICADOR

                        break;

                    default: //PUBLICADOR
                        break;
                }//FIN DE SWITCH PRINCIPAL ROL
            }
            ?>
        </div>
    </div>

    <!--FIN CONTENEDOR BANDEJA DE ENTRADA-->



    <!--INICIO CONTENEDOR NOMBRE USUARIO-->

    <div id="contenedorNombreUsuario">

        <!--INICIO DE TABLA CONTENEDORA DE DATOS INICIO DE SESION-->

        <table border="0" id="tabla_datos_inicio_de_sesion">
            <tr>
                <td>
                    <!--INICIO ICONO DE USUARIO-->
                    <img id="iconoUsuario" src="imagenes/top/u.png" title="Nombre De Usuario">
                    <!--FIN ICONO DE USUARIO-->
                </td>

                <td>
                    <span id="nombreUsuario">
                        <?php echo $_SESSION['Correo']; ?>
                    </span>
                </td>

                <td rowspan="3">
                    <form id="formularioCerrarSesion" method="POST" action="php/cerrarSesion.php">
                        <a href="php/cerrarSesion.php">
                            <img id="iconoSalir" src="imagenes/top/salir.png" width="60" height="60" title="Cerrar Session">
                        </a>
                    </form>
                </td>
            </tr>

            <tr>
                <td>
                    <!--INICIO ICONO DE USUARIO-->
                    <img id="iconoRol" src="imagenes/top/r.png" title="Nombre Del Rol">
                    <!--FIN ICONO DE USUARIO-->
                </td>

                <td>
                    <span id="nombreRol">
                        <?php
                        $conexion = conectar();
                        $select = "SELECT Nombre FROM rol WHERE ID_Rol = '$_SESSION[ID_Rol]'";
                        $nombreRol = mysqli_query($conexion, $select);
                        $rol = mysqli_fetch_array($nombreRol, MYSQLI_ASSOC);
                        echo $rol['Nombre'];
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <!--INICIO ICONO DE USUARIO-->
                    <img id="iconoOrganizacion" src="imagenes/top/o.png" title="Nombre De La Organizacion">
                    <!--FIN ICONO DE USUARIO-->
                </td>

                <td>
                    <span id="nombreOrganizacion">
                        <?php
                        $conexion = conectar();
                        $selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";
                        $nombreOrg = mysqli_query($conexion, $selectOrg);
                        $org = mysqli_fetch_array($nombreOrg, MYSQLI_ASSOC);
                        echo $org['Nombre'];
                        ?>

                    </span>
                </td>
            </tr>

        </table>
        <!--FIN DE TABLA CONTENEDORA DE DATOS INICIO DE SESION-->

    </div>
    <!--FIN CONTENEDOR NOMBRE USUARIO-->

</div>

<!--FIN DEL CONTENEDOR CABECERA-->
