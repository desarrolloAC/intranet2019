$(window).load(function () {

    $(function () {
        $('#btnImagenAvanceInformativo').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalida').attr("src", result);
        }
    });
});

$(window).load(function () {

    $(function () {
        $('#btnImagenAvanceInformativo1').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalida1').attr("src", result);
        }
    });
});

$(window).load(function () {

    $(function () {
        $('#btnImagenAvanceInformativo2').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalida2').attr("src", result);
        }
    });
});

$(window).load(function () {

    $(function () {
        $('#btnImagenAvanceInformativo3').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalida3').attr("src", result);
        }
    });
});

/**
 
 Boletin informativo.
 
 */

$(window).load(function () {
    $(function () {
        $('#btnImagenBoletinInformativo').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#bolimgSalida').attr("src", result);
        }
    });
});

$(window).load(function () {
    $(function () {
        $('#btnImagenBoletinInformativo1').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#bolimgSalida1').attr("src", result);
        }
    });
});

$(window).load(function () {
    $(function () {
        $('#btnImagenBoletinInformativo2').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#bolimgSalida2').attr("src", result);
        }
    });
});

$(window).load(function () {

    $(function () {
        $('#btnImagenBoletinInformativo3').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#bolimgSalida3').attr("src", result);
        }
    });
});

/**
 * Cumple Mes
 */
$(window).load(function () {

    $(function () {
        $('#btnImagenCumpleMes').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalidaCumpleMes').attr("src", result);
        }
    });
});


/**
 * Nacimientos Niño
 */
$(window).load(function () {

    $(function () {
        $('#btnImagenNacimiento').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalidaNacimiento').attr("src", result);
        }
    });
});

/**
 * Nacimientos Niña
 */

$(window).load(function () {

    $(function () {
        $('#btnImagenNacimientoNina').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalidaNacimientoNina').attr("src", result);
        }
    });
});
/**
 * Logros extracurriculares
 */
$(window).load(function () {

    $(function () {
        $('#btnImagenLogro').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalidaImagenLogro').attr("src", result);
        }
    });
});
/**
 * Ascensos
 */
$(window).load(function () {

    $(function () {
        $('#btnImagenNuevoAscenso').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalidaNuevoAscenso').attr("src", result);
        }
    });
});
/**
 * Promocion Escolar
 */
$(window).load(function () {

    $(function () {
        $('#btnImagenPromocionEscolar').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalidaPromocionEscolar').attr("src", result);
        }
    });
});
/**
 * FLAYERS
 */
$(window).load(function () {

    $(function () {
        $('#btnImagenFlayers').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalidaFlayers').attr("src", result);
        }
    });
});



/**
 * Actulizar Usuario
 */
// Actualizar Imagen 1
$(window).load(function () {

    $(function () {
        $('#btnImage1').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imagen1').attr("src", result);
        }
    });
});
// Actualizar Imagen 2
$(window).load(function () {

    $(function () {
        $('#btnImage2').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imagen2').attr("src", result);
        }
    });
});
// Actualizar Imagen 3
$(window).load(function () {

    $(function () {
        $('#btnImage3').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imagen3').attr("src", result);
        }
    });
});
// Actualizar Imagen 4
$(window).load(function () {

    $(function () {
        $('#btnImage4').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imagen4').attr("src", result);
        }
    });
});