const root = {
    data: {
        controlFormCalendario: {
            state: true
        },
        availability: {
            availability_id: 0,
            isactive: "",
            created: "",
            updated: "",
            space: "",
            days: 0,
            moth: 0,
            yeart: 0
        },
        reservation: [
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
    },
    methods: {
        control: function () {
            this.controlFormCalendario.state = !this.controlFormCalendario.state;

        },
        bindMap: function (a, b, c) {

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

        },
        colocarInformacion: function () {

            for (let i = 0; i < this.reservation.length; i++) {

                $("#cince_" + i).text(this.reservation[i].cince);
                $("#until_" + i).text(this.reservation[i].until);
                $("#usu_" + i).text(this.reservation[i].user);

                if (this.reservation[i].isreserved === "Y") {
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
    }
}



const calendario = new Vue({
    el: '#calendario',
    mixins: [root],
    created: function () {
        this.colocarMesInicio();
        this.colocarAñoInicio();
    },
    data: {

    },
    methods: {
        mostrarPanelDisponibilidad: function () {

            $('.contenedor_lista').show();

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

                this.bindMap(this.reservation, obj, (a, b) => {

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

                this.availability.availability_id = obj.availability_id;
                this.availability.isactive = obj.isactive;
                this.availability.created = obj.created;
                this.availability.updated = obj.updated;
                this.availability.space = obj.space;
                this.availability.days = obj.days;
                this.availability.moth = obj.moth;
                this.availability.yeart = obj.yeart;

            })
            .fail((ex) => {
                alert("Error al consultar disponibilidad, el estatus es: " + ex.status);

            })
            .always(() => {
                this.consultarReservas();

            });

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
            if (this.controlFormCalendario.state === false) {
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
        },
        /*
         Los meses 1,3,5,7,8,10,12 siempre tienen 31 días
         Los meses 4,6,9,11 siempre tienen 30 días
         El único problema es el mes de febrero dependiendo del año puede tener 28 o 29 días
         */
        getUltimoDiaDelMes: function (mes, ano) {

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

        },
        getUltimoDiaDelMes2: function (mes, ano) {

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

        },
        colocarMes: function (evet) {

            let ref = new Date();
            let mes = $("#cb_organizacion option:selected").text();

            for (let i = 27; i <= 31; i++) {
                $('#final_' + i).text('-');
            }

            for (let i = 27; i <= this.getUltimoDiaDelMes2(mes, ref.getFullYear()); i++) {
                $('#final_' + i).text(i.toString());
                // console.log(i+" "+i.toString()+" "+getUltimoDiaDelMes2(mes, ref.getFullYear()));
            }

        },
        colocarMesInicio: function () {

            let ref = new Date();
            for (let i = 27; i < this.getUltimoDiaDelMes(ref.getMonth(), ref.getFullYear()); i++) {
                $('#final_' + i).text(i.toString());
            }

        },
        colocarAñoInicio: function () {

            let ref = new Date();
            $('#cb_año').append('<option>' + ref.getFullYear() + '</option>');

        }

    }
});






const disponibilidad = new Vue({
    el: '#tabla_disponibilidad',
    mixins: [root],
    created: function () {

    },
    data: {
        userState: {
            state: ""
        },
        keyState: {
            state: ""
        },
        user: {
            pNombre: "",
            sNombre: "",
            pApellido: "",
            sApellido: "",
            correo: ""
        }
    },
    methods: {
        completed: function () {
            console.log("completada la transaccion...");

        },
        cambiarUsuarioEliminar: function (id) {
            this.reservation[id].user = '-';

        },
        cambiarUsuario: function (id) {
            this.reservation[id].user = this.user.correo;

        },
        cambiarEstado: function (id) {

            let estado = this.reservation[id].isreserved;

            if (estado === 'Y') {
                estado = 'N';

            } else {
                estado = 'Y';

            }

            this.reservation[id].isreserved = estado;

        },
        actualizarReserva: function (id) {

            $.ajax({
                url: "php/UpdateReservation.php",
                type: "POST",
                contentType: "application/x-www-form-urlencoded;charset=utf-8;",
                crossDomain: true,
                data: {
                    reservation_id: this.reservation[id].reservation_id,
                    user: this.reservation[id].user,
                    isreserved: this.reservation[id].isreserved,
                    availability_id: this.reservation[id].availability_id
                }

            })
            .done((payload) => {

                let obj = JSON.parse(payload);

                this.bindMap(this.reservation, obj, (a, b) => {

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
            .always(() => {
                this.colocarInformacion();

            })
            .always(() => {
                this.completed();

            });

        },
        consultarUsuario: function (correo, id) {

            $.ajax({
                url: "php/GetUser.php",
                type: "GET",
                contentType: "application/x-www-form-urlencoded;charset=utf-8;",
                crossDomain: true,
                data: {
                    correo: correo
                }

            })
            .done((payload) => {

                let obj = JSON.parse(payload);

                this.user.pNombre = obj.pNombre;
                this.user.sNombre = obj.sNombre;
                this.user.pApellido = obj.pApellido;
                this.user.sApellido = obj.sApellido;
                this.user.correo = obj.correo;

            })
            .fail((ex) => {
                alert("Error al consultar el usuario, el estatus es: " + ex.status);

            })
            .always(() => {
                this.cambiarUsuario(id);

            })
            .always(() => {
                this.cambiarEstado(id);

            })
            .always(() => {
                this.actualizarReserva(id);

            });

        },
        validarSiExisteElUsuario: function (correo) {

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
                    this.userState.state = payload;
                }

            })
            .fail((ex) => {
                alert("Error al consultar el usuario, el estatus es: " + ex.status);

            });

            return this.userState.state === "";

        },
        validarEmail: function (email) {

            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());

        },
        validarUsuario: function (user) {

            let success = 0;

            if (user == null || user == "" || isNaN(user) == false || this.validarEmail(user) == false) {
                success += 1;
            }

            return success > 0;

        },
        validar: function (id) {

            let estado = this.reservation[id].isreserved;

            if (estado === 'Y') {
                return true;

            } else {
                return false;

            }
        },
        eventoReserva: function (event) {

            let id = parseInt(event.target.id.substring(8));

            if (this.validar(id)) {
                alert("Estimado usuario, Esta hora ya esta reservada.");
                return;
            }

            let correo = prompt("Dime tu correo para poder reservar.");

            if (this.validarUsuario(correo)) {
                alert("Estimado usuario, Debe colocar la informacion correctamente.");
                return;
            }

            if (this.validarSiExisteElUsuario(correo)) {
                alert("Estimado usuario, El correo que ingreso no existe.");
                return;
            }

            //cambia el estado del modelo reservation con el usuario que esta en la base de datos.
            this.consultarUsuario(correo, id);

        },
        ocultarPanelDisponivilidad: function () {

            $('.contenedor_lista').hide();

        },
        avilitarFormCalendario: function () {

            $("#cb_usuario").removeAttr("disabled", "on");
            $("#cb_sala").removeAttr("disabled", "on");
            $("#cb_organizacion").removeAttr("disabled", "on");
            $("#cb_año").removeAttr("disabled", "on");

        },
        eventoOcultarPanelReserva: function (event) {

            this.ocultarPanelDisponivilidad();
            this.avilitarFormCalendario();
            this.control();

        },
        consultarUsuarioCancelar: function (correo, id) {

            $.ajax({
                url: "php/GetUser.php",
                type: "GET",
                contentType: "application/x-www-form-urlencoded;charset=utf-8;",
                crossDomain: true,
                data: {
                    correo: correo
                }

            })
            .done((payload) => {

                let obj = JSON.parse(payload);

                this.user.pNombre = obj.pNombre;
                this.user.sNombre = obj.sNombre;
                this.user.pApellido = obj.pApellido;
                this.user.sApellido = obj.sApellido;
                this.user.correo = obj.correo;

            })
            .fail((ex) => {
                alert("Error al consultar el usuario, el estatus es: " + ex.status);

            })
            .always(() => {
                this.cambiarUsuarioEliminar(id);

            })
            .always(() => {
                this.cambiarEstado(id);

            })
            .always(() => {
                this.actualizarReserva(id);

            });

        },
        validarIdentidad: function (correo, id) {

            let original = $('#usu_'+id).text();

            if (original.trim() === correo.trim()) {
                return false;

            } else {
                return true;

            }
        },
        validarKey: function (key) {

            if (this.keyState.trim() === key.trim()) {
                return false;

            } else {
                return true;

            }
        },
        enviarCorreo: function (correo) {

            $.ajax({
                url: "php/SendMail.php",
                type: "GET",
                contentType: "application/x-www-form-urlencoded;charset=utf-8;",
                crossDomain: true,
                data: {
                    correo: correo
                }

            })
            .done((payload) => {

                if (payload !== 'null') {
                    this.keyState.state = payload;
                }

            })
            .fail((ex) => {
                alert("Error al consultar el usuario, el estatus es: " + ex.status);

            });

        },
        eventoCancelar: function (event) {

            let id = parseInt(event.target.id.substring(9));

            let correo = prompt("Dime tu correo para poder reservar.");

            if (this.validarUsuario(correo)) {
                alert("Estimado usuario, Debe colocar la informacion correctamente.");
                return;
            }

            if (this.validarSiExisteElUsuario(correo)) {
                alert("Estimado usuario, El correo que ingreso no existe.");
                return;
            }

            if (this.validarIdentidad(correo, id)) {
                alert("Estimado usuario, Usted no es la persona que creo la reserva.");
                return;
            }

            this.enviarCorreo(correo);

            let key = prompt("Dime la clave.");


            if (this.validarKey(key)) {
                alert("Estimado usuario, la clave que ingreso es incorrecta.");
                return;
            }

<<<<<<< HEAD
            //cambia el estado del modelo reservation con el usuario que esta en la base de datos.
            /*
             esto hay que cambiarlo esta es la parte que falta

             */
            this.consultarUsuario(correo, id);
=======
            this.consultarUsuarioCancelar(correo, id);
>>>>>>> brayan

        }
    }
});
