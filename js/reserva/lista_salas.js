const calendario = new Vue({
    el: '#calendario',
    created: function () {
        //this.getPublicaciones();
    },
    data: {
        controlFormCalendario: true,
        list: [],
        availability: {
            availability_id: 0,
            isactive: "",
            created: "",
            updated: "",
            space: "",
            days: 0,
            moth: 0,
            yeart: 0
        }
    },
    methods: {
        mostrarPanelDisponibilidad: function () {
            $('.contenedor_lista').show();
        },
        colocarInformacion: function () {

            for (let i = 0; i < reservation.length; i++) {

                $("#cince_" + i).text(reservation[i].cince);
                $("#until_" + i).text(reservation[i].until);
                $("#usu_" + i).text(reservation[i].user);

                if (reservation[i].isreserved === "Y") {
                    $('#reserva_' + i).addClass('red');
                    $('#reserva_' + i).val('Reservado');
                    $('#cancelar_' + i).show();

                } else {
                    $('#reserva_' + i).removeClass('red');
                    $('#reserva_' + i).val('Reservar');
                    $('#cancelar_' + i).hide();
                }

            }

        },
        consultarReservas: function () {

            $.ajax({
                url: "php/GetReservation.php",
                type: "GET",
                contentType: "application/x-www-form-urlencoded;charset=utf-8;",
                crossDomain: true,
                data: {
                    id: this.availability.availability_id
                }
            })
                    .done((payload) => {

                        let obj = JSON.parse(payload);
                        this.list = obj;

                    })
                    .fail((ex) => {
                        alert("Error al consultar las reservaciones, el estatus es: " + ex.status);
                    })
                    .always(() => {
                        this.colocarInformacion();
                    })
                    .always(() => {
                        this.mostrarPanelDisponibilidad();
                    });

        },
        consultarDisponivilidad: function () {

            $.ajax({
                url: "php/AddAvailability.php",
                type: "POST",
                contentType: "application/x-www-form-urlencoded;charset=utf-8;",
                crossDomain: true,
                data: {
                    space: this.availability.space,
                    days: this.availability.days,
                    moth: this.availability.moth,
                    yeart: this.availability.yeart
                }
            })
                    .done((payload) => {
                        let obj = JSON.parse(payload);
                        this.availability = obj;
                    })
                    .fail((ex) => {
                        alert("Error al consultar disponibilidad, el estatus es: " + ex.status);
                    })
                    .always(() => {
                        this.consultarReservas();
                    });

        },
        control: function () {

            this.controlFormCalendario = !this.controlFormCalendario;

        },
        inavilitarFormCalendario: function () {

            $("#cb_sala").attr("disabled", "on");
            $("#cb_organizacion").attr("disabled", "on");
            $("#cb_año").attr("disabled", "on");

        },
        validarDia: function (event) {

            if (event.target.textContent === '-') {
                return true;

            } else {
                return false;

            }

        },
        validarReserva: function (event) {

            let success = 0;

            if (this.availability.space == null || this.availability.space == "" || this.availability.space == "Salas") {
                success += 1;
            }

            if (this.availability.days == null || this.availability.days == 0) {
                success += 1;
            }

            if (this.availability.moth == null || this.availability.moth == "" || this.availability.moth == "Mes") {
                success += 1;
            }

            if (this.availability.moth == null || this.availability.yeart == "" || this.availability.moth == "Año") {
                success += 1;
            }

            return success > 0;

        },
        obtenerValoresFormCalendario: function (event) {

            this.availability.space = $("#cb_sala option:selected").text();
            this.availability.days = event.target.textContent;
            this.availability.moth = $("#cb_organizacion option:selected").text();
            this.availability.yeart = $("#cb_año option:selected").text();

        },
        eventoFormCalendario: function (event) {

            //valida si se puede modificar la reserva.
            if (this.controlFormCalendario == false) {
                alert("Estimado usuario, ya se ah seleccionado una opcion.");
                return;
            }


            if (this.validarDia(event)) {
                alert("Estimado usuario, este dia no es valido.");
                return;
            }

            this.obtenerValoresFormCalendario(event);

            //validar formulario
            if (this.validarReserva(event)) {
                alert("Estimado usuario, Debe colocar la informacion correctamente.");
                return;
            }

            this.inavilitarFormCalendario();
            this.control();

            this.consultarDisponivilidad();
        }

    }
});






const disponibilidadUrl = 'php/GetReservation.php';
const disponibilidad = new Vue({
    el: '#tabla_disponibilidad',
    created: function () {
        this.getPublicaciones();
    },
    data: {
        list: []
    },
    methods: {
        getPublicaciones: function () {
            this.$http.get(disponibilidadUrl).then((responsed) => {
                this.list = responsed.body;
            });
        }
    }
});





var controlFormCalendario = true;

const userState = {
    state: ""
}

/**
 * Este es un objeto global que permite
 * almacenar los valores de la reserva.
 *
 * @constant {{Object}}
 */
const availability = {
    availability_id: 0,
    isactive: "",
    created: "",
    updated: "",
    space: "",
    days: 0,
    moth: 0,
    yeart: 0
}

/**
 * Este es un objeto global que permite
 * almacenar los valores de la disponivilidad.
 *
 * @constant {{type}}
 */
const reservation = [
    {
        reservation_id: 0,
        isactive: "",
        created: "",
        updated: "",
        cince: "",
        until: "",
        user: "",
        isreserved: "",
        availability_id: 0
    },
    {
        reservation_id: 0,
        isactive: "",
        created: "",
        updated: "",
        cince: "",
        until: "",
        user: "",
        isreserved: "",
        availability_id: 0
    },
    {
        reservation_id: 0,
        isactive: "",
        created: "",
        updated: "",
        cince: "",
        until: "",
        user: "",
        isreserved: "",
        availability_id: 0
    },
    {
        reservation_id: 0,
        isactive: "",
        created: "",
        updated: "",
        cince: "",
        until: "",
        user: "",
        isreserved: "",
        availability_id: 0
    },
    {
        reservation_id: 0,
        isactive: "",
        created: "",
        updated: "",
        cince: "",
        until: "",
        user: "",
        isreserved: "",
        availability_id: 0
    },
    {
        reservation_id: 0,
        isactive: "",
        created: "",
        updated: "",
        cince: "",
        until: "",
        user: "",
        isreserved: "",
        availability_id: 0
    },
    {
        reservation_id: 0,
        isactive: "",
        created: "",
        updated: "",
        cince: "",
        until: "",
        user: "",
        isreserved: "",
        availability_id: 0
    },
    {
        reservation_id: 0,
        isactive: "",
        created: "",
        updated: "",
        cince: "",
        until: "",
        user: "",
        isreserved: "",
        availability_id: 0
    },
    {
        reservation_id: 0,
        isactive: "",
        created: "",
        updated: "",
        cince: "",
        until: "",
        user: "",
        isreserved: "",
        availability_id: 0
    }
]

const user = {
    pNombre: "",
    sNombre: "",
    pApellido: "",
    sApellido: "",
    correo: ""
}


/**
 * Funcion que permite mapear dos
 * array a la ves.
 *
 * @constant {{type}}
 */
const bindMap = (a, b, c) => {

    if (a.length != b.length) {
        console.error("La longitud del array es diferente " + a.length + " " + b.length);
        return;
    }

    if (typeof c !== "function") {
        console.error("No es una funcion.");
        return;
    }

    for (let i = 0; i < a.length; i++) {
        c(a[i], b[i]);
    }
}

/**
 * @constant {{type}}
 */
const error = () => {
    console.log("error");
}

/**
 * @constant {{type}}
 */
const completed = () => {
    console.log("completada la transaccion...");
}

/**
 * Avilitar o inavilitar los controles
 * del calendario.
 *
 * @constant {{Function}}
 */
const control = () => {
    controlFormCalendario = !controlFormCalendario;
}

/** eventos de Form Calendario ** /
 
 
 /**
 * Obtener los valores necesarios del front end
 * para construir la pateticion ajax.
 *
 * @constant {{Function}}
 */
const obtenerValoresFormCalendario = (event) => {
    availability.space = $("#cb_sala option:selected").text();
    availability.days = event.children[0].textContent;
    availability.moth = $("#cb_organizacion option:selected").text();
    availability.yeart = $("#cb_año option:selected").text();
}

/**
 * Inavilita temporalmente el formulario del
 * calendario para mantener el estado en memoria.
 *
 * @constant {{Function}}
 */
const inavilitarFormCalendario = () => {
    $("#cb_sala").attr("disabled", "on");
    $("#cb_organizacion").attr("disabled", "on");
    $("#cb_año").attr("disabled", "on");
}

/**
 * Valida los datos del formulario.
 *
 * @constant {{Function}}
 */
const validarReserva = () => {
    let success = 0;

    if (availability.space == null || availability.space == "" ||
            availability.space == "Salas") {
        success += 1;
    }

    if (availability.days == null || availability.days == 0) {
        success += 1;
    }

    if (availability.moth == null || availability.moth == "" || availability.moth == "Mes") {
        success += 1;
    }
    if (availability.moth == null || availability.yeart == "" || availability.moth == "Año") {
        success += 1;
    }
    return success > 0;
}
const colocarInformacion = () => {
    for (let i = 0; i < reservation.length; i++) {

        $("#cince_" + i).text(reservation[i].cince);
        $("#until_" + i).text(reservation[i].until);
        $("#usu_" + i).text(reservation[i].user);

        if (reservation[i].isreserved === "Y") {
            $('#reserva_' + i).addClass('red');
            $('#reserva_' + i).val('Reservado');
            $('#cancelar_' + i).show();

        } else {
            $('#reserva_' + i).removeClass('red');
            $('#reserva_' + i).val('Reservar');
            $('#cancelar_' + i).hide();
        }

    }

}

const mostrarPanelDisponibilidad = () => {
    $('.contenedor_lista').show();
}


const consultarReservas = () => {

    $.ajax({
        url: "php/GetReservation.php",
        type: "GET",
        contentType: "application/x-www-form-urlencoded;charset=utf-8;",
        crossDomain: true,
        data: {
            id: availability.availability_id
        }
    })
            .done((payload) => {

                let obj = JSON.parse(payload);

                bindMap(reservation, obj, (a, b) => {

                    a.reservation_id = b.reservation_id;
                    a.isactive = b.isactive;
                    a.created = b.created;
                    a.updated = b.updated;
                    a.cince = b.cince;
                    a.until = b.until;
                    a.user = b.user;
                    a.isreserved = b.isreserved;
                    a.availability_id = b.availability_id;

                });

            })
            .fail((ex) => {
                alert("Error al consultar las reservaciones, el estatus es: " + ex.status);
            })
            .always(colocarInformacion)
            .always(mostrarPanelDisponibilidad);
}


const consultarDisponivilidad = () => {

    $.ajax({
        url: "php/AddAvailability.php",
        type: "POST",
        contentType: "application/x-www-form-urlencoded;charset=utf-8;",
        crossDomain: true,
        data: {
            space: availability.space,
            days: availability.days,
            moth: availability.moth,
            yeart: availability.yeart
        }
    })
            .done((payload) => {

                let obj = JSON.parse(payload);
                availability.availability_id = obj.availability_id;
                availability.isactive = obj.isactive;
                availability.created = obj.created;
                availability.updated = obj.updated;
                availability.space = obj.space;
                availability.days = obj.days;
                availability.moth = obj.moth;
                availability.yeart = obj.yeart;

            })
            .fail((ex) => {
                alert("Error al consultar disponibilidad, el estatus es: " + ex.status);
            })
            .always(consultarReservas);
}
const validarDia = (event) => {

    if (event.children[0].textContent === '-') {
        return true;
    } else {
        return false;

    }
}
/**
 * Ejecuta todos los procesos al ejecutar
 * el evento click en el formulario del
 * calendario.
 *
 * @constant {{Function}}
 */
const eventoFormCalendario = (event) => {

    //valida si se puede modificar la reserva.
    if (controlFormCalendario == false) {
        alert("Estimado usuario, ya se ah seleccionado una opcion.");
        return;
    }

    if (validarDia(event)) {
        alert("Estimado usuario, este dia no es valido.");
        return;
    }

    //obtener los valores de la reserva del UI.
    obtenerValoresFormCalendario(event);

    //validar formulario
    if (validarReserva()) {
        alert("Estimado usuario, Debe colocar la informacion correctamente.");
        return;
    }

    //Inavilitar formulario
    inavilitarFormCalendario();
    control();

    //enviar data.
    consultarDisponivilidad();

}

/** eventos de cerrar el panel de disponivilidad **/

/**
 * Oculta el panel de disponivilidad.
 *
 * @constant {{Function}}
 */
const ocultarPanelDisponivilidad = () => {
    $('.contenedor_lista').hide();
}

/**
 * Avilita de nuevo el formulario del
 * calendario.
 *
 * @constant {{Function}}
 */
const avilitarFormCalendario = () => {
    $("#cb_usuario").removeAttr("disabled", "on");
    $("#cb_sala").removeAttr("disabled", "on");
    $("#cb_organizacion").removeAttr("disabled", "on");
    $("#cb_año").removeAttr("disabled", "on");
}

/**
 * Oculta el panel de reserva.
 *
 * @constant {{Function}}  */
const eventoOcultarPanelReserva = (event) => {
    ocultarPanelDisponivilidad();
    avilitarFormCalendario();
    control();

}

/** eventos de mostrar el panel de disponivilidad **/

const actualizarReserva = (id) => {

    $.ajax({
        url: "php/UpdateReservation.php",
        type: "POST",
        contentType: "application/x-www-form-urlencoded;charset=utf-8;",
        crossDomain: true,
        data: {
            reservation_id: reservation[id].reservation_id,
            user: reservation[id].user,
            isreserved: reservation[id].isreserved,
            availability_id: reservation[id].availability_id
        }
    })
            .done((payload) => {

                let obj = JSON.parse(payload);

                bindMap(reservation, obj, (a, b) => {

                    a.reservation_id = b.reservation_id;
                    a.isactive = b.isactive;
                    a.created = b.created;
                    a.updated = b.updated;
                    a.cince = b.cince;
                    a.until = b.until;
                    a.user = b.user;
                    a.isreserved = b.isreserved;
                    a.availability_id = b.availability_id;
                });

            })
            .fail((ex) => {
                alert("Error al actualizar la reservacion, el estatus es: " + ex.status);

            })
            .always(colocarInformacion)
            .always(completed);
}
const cambiarEstado = (id) => {

    let estado = reservation[id].isreserved;

    if (estado === 'Y') {
        estado = 'N';
    } else {
        estado = 'Y';

    }

    reservation[id].isreserved = estado;

}

const consultarUsuario = (correo, id) => {
    $.ajax({
        url: "php/GetUser.php",
        type: "GET",
        contentType: "application/x-www-form-urlencoded;charset=utf-8;",
        crossDomain: true,
        data: {
            correo: correo
        }
    }).done((payload) => {

        let obj = JSON.parse(payload);

        user.pNombre = obj.pNombre;
        user.sNombre = obj.sNombre;
        user.pApellido = obj.pApellido;
        user.sApellido = obj.sApellido;
        user.correo = obj.correo;

    })
            .fail((ex) => {
                alert("Error al consultar el usuario, el estatus es: " + ex.status);

            })
            .always(() => {
                reservation[id].user = user.correo;

            }).always(() => {
        cambiarEstado(id);
    })
            .always(() => {
                actualizarReserva(id);

            });

}
const validarSiExisteElUsuario = (correo) => {

    $.ajax({
        url: "php/GetUser.php",
        type: "GET",
        contentType: "application/x-www-form-urlencoded;charset=utf-8;",
        crossDomain: true,
        async: false,
        data: {
            correo: correo
        }
    })
            .done((payload) => {
                if (payload !== 'null') {
                    userState.state = payload;
                }

            })
            .fail((ex) => {
                alert("Error al consultar el usuario, el estatus es: " + ex.status);

            });

    return userState.state === "";
}
const validarEmail = (email) => {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validarUsuario = (user) => {

    let success = 0;

    if (user == null || user == "" || isNaN(user) == false || validarEmail(user) == false) {
        success += 1;
    }
    return success > 0;
}

const validar = (id) => {
    let estado = reservation[id].isreserved;

    if (estado === 'Y') {
        return true;

    } else {
        return false;

    }
}
const eventoReserva = (event) => {

    let id = parseInt(event.id.substring(8));

    if (validar(id)) {
        alert("Estimado usuario, Esta hora ya esta reservada.");
        return;
    }
    let correo = prompt("Dime tu correo para poder reservar.");

    if (validarUsuario(correo)) {
        alert("Estimado usuario, Debe colocar la informacion correctamente.");
        return;
    }

    if (validarSiExisteElUsuario(correo)) {
        alert("Estimado usuario, El correo que ingreso no existe.");
        return;
    }

    //cambia el estado del modelo reservation con el usuario que esta en la base de datos.
    consultarUsuario(correo, id);

}



/** Eventos de carga de la pagina **/



const eventoCancelar = (event) => {

    let id = parseInt(event.id.substring(8));

    let correo = prompt("Dime tu correo para poder cancelar.");

    if (validarUsuario(correo)) {
        alert("Estimado usuario, Debe colocar la informacion correctamente.");
        return;
    }

    consultarUsuario(correo);

    let user = $('#usu_' + id).val();

    if (user !== correo) {
        alert("Estimado usuario, Uted no puede cancelar la reserva por no ser quien la creo.");
    }
    if (user === correo) {
        alert("Exito");
    }
}

/*
 Los meses 1,3,5,7,8,10,12 siempre tienen 31 días
 Los meses 4,6,9,11 siempre tienen 30 días
 El único problema es el mes de febrero dependiendo del año puede tener 28 o 29 días
 */
const getUltimoDiaDelMes = (mes, ano) => {

    if ((mes == 1) || (mes == 3) || (mes == 5) || (mes == 7) || (mes == 8) || (mes == 10) || (mes == 12))
        return 31;
    else if ((mes == 4) || (mes == 6) || (mes == 9) || (mes == 11))
        return 30;
    else if (mes == 2) {

        if ((ano % 4 == 0) && (ano % 100 != 0) || (ano % 400 == 0))
            return 29;
        else
            return 28;
    }
}
const getUltimoDiaDelMes2 = (mes, ano) => {
    if ((mes == "Enero") || (mes == "Marzo") || (mes == "Mayo") || (mes == "Julio") || (mes == "Agosto") ||
            (mes == "Octubre") || (mes == "Diciembre"))
        return 31;
    else if ((mes == "Abril") || (mes == "Junio") || (mes == "Septiembre") || (mes == "Noviembre"))
        return 30;
    else if (mes == "Febrero") {

        if ((ano % 4 == 0) && (ano % 100 != 0) || (ano % 400 == 0))
            return 29;
        else
            return 28;
    }
}
const colocarMes = (evet) => {
    let ref = new Date();
    let mes = $("#cb_organizacion option:selected").text();
    for (let i = 27; i <= 31; i++) {
        $('#final_' + i).text('-');
    }
    for (let i = 27; i <= getUltimoDiaDelMes2(mes, ref.getFullYear()); i++) {
        $('#final_' + i).text(i.toString());
        // console.log(i+" "+i.toString()+" "+getUltimoDiaDelMes2(mes, ref.getFullYear()));
    }
}
const colocarMesInicio = () => {

    let ref = new Date();
    for (let i = 27; i < getUltimoDiaDelMes(ref.getMonth(), ref.getFullYear()); i++) {
        $('#final_' + i).text(i.toString());
    }
}
const colocarAño = () => {
    let ref = new Date();
    $('#cb_año').append('<option>' + ref.getFullYear() + '</option>');
}

/**
 * Funcion que se ejecuta al cargar la pagina.
 *
 * @constant {{Function}}
 */
const main = (jQuery) => {
    console.log("La pagina esta cargada...");
    colocarAño();
    colocarMesInicio();
}

/**
 * Inicial JQuery.
 */
$(document).ready(main);
