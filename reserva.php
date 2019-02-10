<!DOCTYPE html>
<html>

    <head>
        <title>Intranet Alkes Corp, S.A</title>
        <meta name="viewport" content="width=device-width,device-height initial-scale=1.5" />
        <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
        <meta charset="utf-8">

        <link rel="icon" type="image/png" href="favicon.png" />

        <link rel="stylesheet" href="css/lib/bootstrap.min.css" media="all" />

        <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all" />

        <link rel="stylesheet" type="text/css" href="css/reserva/reserva_sala.css">

        <script type="text/javascript" src="js/lib/vue.js"></script>
        <script type="text/javascript" src="js/lib/vue-resource.min.js"></script>
    </head>

    <body>

        <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/top.php'; ?>

        <main class="contenedorContenido">

            <!--  inicio del contenedor del calendario-->
            <table id="calendario" class="calendario" border="0">

                <tr class="titulo_mes">
                    <td colspan="7">
                        <h2>Consultar Disponibilidad</h2>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" width="150">
                        <select id="cb_año">
                            <option>Año</option>
                        </select>
                    </td>

                    <td colspan="3" width="250">
                        <select id="cb_organizacion" v-on:change="colocarMes">
                            <option>Mes</option>
                            <option>Enero</option>
                            <option>Febrero</option>
                            <option>Marzo</option>
                            <option>Abril</option>
                            <option>Mayo</option>
                            <option>Junio</option>
                            <option>Julio</option>
                            <option>Agosto</option>
                            <option>Septiembre</option>
                            <option>Octubre</option>
                            <option>Noviembre</option>
                            <option>Diciembre</option>
                        </select>
                    </td>

                    <td colspan="3" width="120">
                        <select id="cb_sala">
                            <option>Salas</option>
                            <option>Sala Venfruca</option>
                            <option>Sala Alkes</option>
                            <option>Sala Caiman</option>
                            <option>Sala Atalalia</option>
                            <option>Sala Frutech</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">
                        &nbsp;
                    </td>
                    <td>
                        &nbsp;
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>1</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>2</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>3</h5>
                    </td>
                </tr>

                <tr>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>4</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>5</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>6</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>7</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>8</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>9</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>10</h5>
                    </td>
                </tr>

                <tr>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>11</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>12</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>13</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>14</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>15</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>16</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>17</h5>
                    </td>
                </tr>

                <tr>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>18</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>19</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>20</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>21</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>22</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>23</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>24</h5>
                    </td>
                </tr>

                <tr>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>25</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>26</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5>27</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5 id="final_28">-</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5 id="final_29">-</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5 id="final_30">-</h5>
                    </td>
                    <td id="numero" v-on:click="eventoFormCalendario">
                        <h5 id="final_31">-</h5>
                    </td>
                </tr>
            </table>

            <!--  inicio del contenedor de reserva-->
            <table id="tabla_disponibilidad" class="tabla_disponibilidad" border="1">

                <tr class="titulo_disponibilidad">
                    <td colspan="4">
                        <h1>Reservar Horas</h1>
                        <center>
                            <input class="btn cerrar" v-on:click="eventoOcultarPanelReserva" type="submit" name="btnCerrar" value="Cerrar">
                        </center>
                    </td>
                </tr>

                <tr class="titulo_lista">
                    <td style="width: 150px">
                        <h5>Hora Inicio</h5>
                    </td>
                    <td style="width: 150px">
                        <h5>Hora Final</h5>
                    </td>
                    <td>
                        <h5>Usuario</h5>
                    </td>
                    <td style="width: 200px">
                        <h5>Reservar</h5>
                    </td>
                </tr>

                 <tr class="fondo">
                    <td>
                        <h5 id="cince_0"></h5>
                    </td>
                    <td>
                        <h5 id="until_0"></h5>
                    </td>
                    <td>
                        <h5 id="usu_0"></h5>
                    </td>
                    <td>
                        <center>
                            <input id="reserva_0" class="btn reservar" v-on:click="eventoReserva" type="submit" name="btnReservar" value="Y">
                            <input id="cancelar_0" class="btn reservar" v-on:click="eventoCancelar" type="submit" name="btnCancelar" value="X">
                        </center>
                    </td>
                <tr>

                <tr class="fondo">
                    <td>
                        <h5 id="cince_1"></h5>
                    </td>
                    <td>
                        <h5 id="until_1"></h5>
                    </td>
                    <td>
                        <h5 id="usu_1"></h5>
                    </td>
                    <td>
                        <center>
                            <input id="reserva_1" class="btn reservar" v-on:click="eventoReserva" type="submit" name="btnReservar" value="Y">
                            <input id="cancelar_1" class="btn reservar" v-on:click="eventoCancelar" type="submit" name="btnCancelar" value="X">
                        </center>
                    </td>
                <tr>

                <tr class="fondo">
                    <td>
                        <h5 id="cince_2"></h5>
                    </td>
                    <td>
                        <h5 id="until_2"></h5>
                    </td>
                    <td>
                        <h5 id="usu_2"></h5>
                    </td>
                    <td>
                        <center>
                            <input id="reserva_2" class="btn reservar" v-on:click="eventoReserva" type="submit" name="btnReservar" value="Y">
                            <input id="cancelar_2" class="btn reservar" v-on:click="eventoCancelar" type="submit" name="btnCancelar" value="X">
                        </center>
                    </td>
                </tr>

                <tr class="fondo">
                    <td>
                        <h5 id="cince_3"></h5>
                    </td>
                    <td>
                        <h5 id="until_3"></h5>
                    </td>
                    <td>
                        <h5 id="usu_3"></h5>
                    </td>
                    <td>
                        <center>
                            <input id="reserva_3" class="btn reservar" v-on:click="eventoReserva" type="submit" name="btnReservar" value="Y">
                            <input id="cancelar_3" class="btn reservar" v-on:click="eventoCancelar" type="submit" name="btnCancelar" value="X">
                        </center>
                    </td>
                <tr>

                <tr class="fondo">
                    <td>
                        <h5 id="cince_4"></h5>
                    </td>
                    <td>
                        <h5 id="until_4"></h5>
                    </td>
                    <td>
                        <h5 id="usu_4"></h5>
                    </td>
                    <td>
                        <center>
                            <input id="reserva_4" class="btn reservar" v-on:click="eventoReserva" type="submit" name="btnReservar" value="Y">
                            <input id="cancelar_4" class="btn reservar" v-on:click="eventoCancelar" type="submit" name="btnCancelar" value="X">
                        </center>
                    </td>
                <tr>

                <tr class="fondo">
                    <td>
                        <h5 id="cince_5"></h5>
                    </td>
                    <td>
                        <h5 id="until_5"></h5>
                    </td>
                    <td>
                        <h5 id="usu_5"></h5>
                    </td>
                    <td>
                        <center>
                            <input id="reserva_5" class="btn reservar" v-on:click="eventoReserva" type="submit" name="btnReservar" value="Y">
                            <input id="cancelar_5" class="btn reservar" v-on:click="eventoCancelar" type="submit" name="btnCancelar" value="X">
                        </center>
                    </td>
                <tr>

                <tr class="fondo">
                    <td>
                        <h5 id="cince_6"></h5>
                    </td>
                    <td>
                        <h5 id="until_6"></h5>
                    </td>
                    <td>
                        <h5 id="usu_6"></h5>
                    </td>
                    <td>
                        <center>
                            <input id="reserva_6" class="btn reservar" v-on:click="eventoReserva" type="submit" name="btnReservar" value="Y">
                            <input id="cancelar_6" class="btn reservar" v-on:click="eventoCancelar" type="submit" name="btnCancelar" value="X">
                        </center>
                    </td>
                <tr>

                <tr class="fondo">
                    <td>
                        <h5 id="cince_7"></h5>
                    </td>
                    <td>
                        <h5 id="until_7"></h5>
                    </td>
                    <td>
                        <h5 id="usu_7"></h5>
                    </td>
                    <td>
                        <center>
                            <input id="reserva_7" class="btn reservar" v-on:click="eventoReserva" type="submit" name="btnReservar" value="Y">
                            <input id="cancelar_7" class="btn reservar" v-on:click="eventoCancelar" type="submit" name="btnCancelar" value="X">
                        </center>
                    </td>
                <tr>

                <tr class="fondo">
                    <td>
                        <h5 id="cince_8"></h5>
                    </td>
                    <td>
                        <h5 id="until_8"></h5>
                    </td>
                    <td>
                        <h5 id="usu_8"></h5>
                    </td>
                    <td>
                        <center>
                            <input id="reserva_8" class="btn reservar" v-on:click="eventoReserva" type="submit" name="btnReservar" value="Y">
                            <input id="cancelar_8" class="btn reservar" v-on:click="eventoCancelar" type="submit" name="btnCancelar" value="X">
                        </center>
                    </td>
                <tr>

            </table>

        </main>

        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/reserva/lista_salas.js"></script>
    </body>


</html>
