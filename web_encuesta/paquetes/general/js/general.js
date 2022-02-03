function mostrar_btn_registrar() {
    $(".btn_cancelar_registrar").show();
    $(".btn_registrar").show();
    $(".btn_carga_registrar").hide();

    $(".modalRegistrar input").prop('disabled', false);
    $(".modalRegistrar file").prop('disabled', false);
    $(".modalRegistrar select").prop('disabled', false);

}
function ocultar_btn_registrar() {
    $(".btn_cancelar_registrar").hide();
    $(".btn_registrar").hide();
    $(".btn_carga_registrar").show();

    $(".modalRegistrar input").prop('disabled', true);
    $(".modalRegistrar file").prop('disabled', true);
    $(".modalRegistrar select").prop('disabled', true);


}

function mostrar_btn_modificar() {
    $(".btn_cancelar_modificar").show();
    $(".btn_modificar").show();
    $(".btn_carga_modificar").hide();

    $(".modalModificar input").prop('disabled', false);
    $(".modalModificar file").prop('disabled', false);
    $(".modalModificar select").prop('disabled', false);
}
function ocultar_btn_modificar() {
    $(".btn_cancelar_modificar").hide();
    $(".btn_modificar").hide();
    $(".btn_carga_modificar").show();

    $(".modalModificar input").prop('disabled', true);
    $(".modalModificar file").prop('disabled', true);
    $(".modalModificar select").prop('disabled', true);

}

function mostrar_btn_eliminar() {
    $(".btn_cancelar_eliminar").show();
    $(".btn_eliminar").show();
    $(".btn_carga_eliminar").hide();
}
function ocultar_btn_eliminar() {
    $(".btn_cancelar_eliminar").hide();
    $(".btn_eliminar").hide();
    $(".btn_carga_eliminar").show();
}

//validacion
function validacion() {
    
    $(".nombre_apellido").keypress(function (e) {
        return soloLetras(e);
    });
    $(".razon_social").keypress(function (e) {
        return soloLetrasNumero(e);
    });
    $(".telefono").attr('maxlength', '7');
    $(".telefono").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $(".celular").attr('maxlength', '9');
    $(".celular").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $(".dni").attr('maxlength', '8');//47089937
    $(".dni").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $(".correo").keypress(function (e) {
        return soloLetrasNumeroCorreo(e);
    });

    $(".solo_numero_decimal").numeric();
}
function soloLetrasNumero(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
function soloLetrasNumeroCorreo(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz@-_.";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

$(document).ready(function () {
     validacion();
//    $(".razon_social");
//    $(".telefono");
//    $(".celular");
//    $(".correo");
//    $(".dni");
//    $(".nombre_apellido");
});

$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
    var anio = 2099;
    $(".fecha").datepicker(
            {
                beforeShow: function (input, inst) {
                    $(document).off('focusin.bs.modal');
                },
                onClose: function () {
                    $(document).on('focusin.bs.modal');
                },
                changeMonth: true,
                changeYear: true,
                yearRange: "1900:" + anio,
                dateFormat: 'yy-mm-dd'
            }
    );
});
function funcion_fecha_actual() {
    var fecha = new Date();
    var mes = (fecha.getMonth() + 1);
    if (mes < 10) {
        mes = "0" + mes;
    }
    var dia = (fecha.getDate());
    if (dia < 10) {
        dia = "0" + dia;
    }
    var dato_actual = (fecha.getFullYear() + "-" + mes + "-" + dia);
    return dato_actual;
}
