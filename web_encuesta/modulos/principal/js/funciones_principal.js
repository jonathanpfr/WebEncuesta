$(document).ready(function () {
    $(".btn_carga_registrar").hide();
    $(".btn_registrar").show();

    setInterval(function () {
        $("#validar_session").load('validar_sesion.php');
    }, 3000);
//    $(".menu_tipo_usuario").hide();
    $.post("consultar/obtener_usuario.php", function (data) {
        var dato = $.trim(data);
//        alert(dato);
        $.each(JSON.parse(dato), function (idx, obj) {
            var nombre = (obj.nombre);
            var foto = (obj.foto);
            var cargo = (obj.cargo);
            var id_cargo = (obj.id_cargo);
            var cambio = (obj.cambio);

//            if (cambio == "0") {
//                $("#modalRegistrar").modal("show");
//            }

            $(".menu_tipo_usuario").hide();
            if (id_cargo == "1") {
                $(".menu_admin").show();
            } else if (id_cargo == "2") {
                $(".menu_usuario").show();
            } 

            var direccion = "";
            if ($.trim(foto) == "") {
                direccion = "../../paquetes/imagenes/usuario.jpg";
            } else {
                direccion = "../../paquetes/imagenes/usuarios/" + foto;
            }
            $(".imagen_foto").attr('src', direccion);
            $(".nombre_usuario").text(nombre);
            $(".nombre_cargo").text(cargo);
        });
    });
    $("#i_menu").val("1");
    $("#page-content-wrapper").removeClass("minimizar_content").addClass("ampliar_content");//css({"padding-left": "145px"},{"padding-left": "145px"},{"padding-left": "145px"});
    $("#sidebar-collapse").click(function () {
        var menu = $("#i_menu").val();

        if ($('#ace-settings-compact').prop('checked')) {
            $("#i_cambiar_user").hide();
            if ("1" == $.trim(menu)) {
                $("#i_menu").val("2");
                $("#page-content-wrapper").removeClass("minimizar_media_content");
                $("#page-content-wrapper").removeClass("ampliar_content").addClass("minimizar_content");
            } else {
                $("#i_menu").val("1");
                $("#page-content-wrapper").removeClass("minimizar_media_content");
                $("#page-content-wrapper").removeClass("minimizar_content").addClass("ampliar_content");
            }
        } else {
            if ("1" == $.trim(menu)) {
                $("#i_cambiar_user").hide();
                $("#i_menu").val("2");
                $("#page-content-wrapper").removeClass("minimizar_media_content");
                $("#page-content-wrapper").removeClass("ampliar_content").addClass("minimizar_content");
            } else {
                if ($('#ace-settings-compact').prop('checked')) {
                    $("#i_cambiar_user").hide();
                } else {
                    $("#i_cambiar_user").show();
                }
                $("#i_menu").val("1");
                $("#page-content-wrapper").removeClass("minimizar_media_content");
                $("#page-content-wrapper").removeClass("minimizar_content").addClass("ampliar_content");
            }
        }
    });
    $("#ace-settings-compact").click(function () {
        var menu = $("#i_menu").val();
        if ($.trim(menu) == 2) {
            $("#i_cambiar_user").hide();
        } else {
//            $("#i_cambiar_user").show();
            if ($('#ace-settings-compact').prop('checked')) {
                $("#i_cambiar_user").hide();

                $("#page-content-wrapper").removeClass("minimizar_content");
                $("#page-content-wrapper").removeClass("ampliar_content").addClass("minimizar_media_content");
            } else {
                $("#i_cambiar_user").show();
                $("#page-content-wrapper").removeClass("minimizar_content");

                $("#page-content-wrapper").removeClass("minimizar_media_content").addClass("ampliar_content");
            }
        }
//        if ($('#ace-settings-compact').prop('checked')) {
//            $("#i_cambiar_user").hide();
//        } else {
//            if (menu == "2") {
//                $("#i_cambiar_user").hide();
//            } else {
//                $("#i_cambiar_user").show();
//            }
//
//        }
    });
    $('li').click(function () {
        var validar = $(this).attr('rel');
        var validar2 = $.trim(validar);
        if (validar2 == "") {
        } else {
            var dato = $(this).text();
            var url = $(this).attr('rel');
            $('#cargar_iframe').html('<iframe class="embed-responsive-item" width="100%" height="100%" frameborder="0" scrolling="yes" id="iframe" src="' + url + '"></iframe>');
        }
    });
    $(".evento_li_2").click(function () {
//        $(".evento_li_2").removeClass("open");
        $(".evento_li_1").removeClass("active");
        $(".evento_li_2").removeClass("active");
//        $(this).parents(".evento_li_1").addClass("open");
        $(this).parents(".evento_li_1").addClass("active");
        $(this).addClass("active");
    });

    $(".btn_registrar").click(function () {
        $(".btn_carga_registrar").show();
        $(".btn_registrar").hide();

        var i_clave = $("#i_clave").val();
        var i_clave_dos = $("#i_clave_dos").val();

        if ($.trim(i_clave) == "") {
            swal("Atencion", "Escriba una contraseña valida", "warning");
            $(".btn_carga_registrar").hide();
            $(".btn_registrar").show();
            return false;
        }
        if ($.trim(i_clave_dos) == "") {
            swal("Atencion", "vuelva a escribir la contraseña", "warning");
            $(".btn_carga_registrar").hide();
            $(".btn_registrar").show();
            return false;
        }

        if (i_clave != i_clave_dos) {
            swal("Atencion", "Las contraseñas no coinciden", "warning");
            $(".btn_carga_registrar").hide();
            $(".btn_registrar").show();
            return false;
        }

        var contar_mayuscula = 0;
        var contar_minuscula = 0;
//        alert("m_password:" + m_password);
        for (var index = 0; index < i_clave.length; index++) {
            var letraActual = i_clave.charAt(index);
            if (letraActual != "1" && letraActual != "2" && letraActual != "3"
                    && letraActual != "4" && letraActual != "5" && letraActual != "6"
                    && letraActual != "7" && letraActual != "8" && letraActual != "9"
                    && letraActual != "0") {
                if (esMayuscula(letraActual))
                {
                    contar_mayuscula++;
                }
                if (esMinuscula(letraActual))
                {
                    contar_minuscula++;
                }
            }
        }
        var contar_numeros = 0;
        var numeros = "0123456789";
        for (i = 0; i < i_clave.length; i++) {
            if (numeros.indexOf(i_clave.charAt(i), 0) != -1) {
                contar_numeros++;
            }
        }
        if (contar_minuscula == 0) {
            $(".btn_carga_registrar").hide();
            $(".btn_registrar").show();
            swal("Error", "La contraseña debe contener letras minusculas", "error");
            return false;
        }
        if (contar_mayuscula == 0) {
            $(".btn_carga_registrar").hide();
            $(".btn_registrar").show();
            swal("Error", "La contraseña debe contener letras mayusculas", "error");
            return false;
        }
        if (contar_numeros == 0) {
            $(".btn_carga_registrar").hide();
            $(".btn_registrar").show();
            swal("Error", "La contraseña debe contener numeros", "error");
            return false;
        }
        if (i_clave.length < 6) {
            $(".btn_carga_registrar").hide();
            $(".btn_registrar").show();
            swal("Error", "La contraseña debe tener mas de 5 digitos", "error");
            return false;
        }

        $.post("consultar/cambiar_clave.php", {
            i_clave: i_clave
        }, function (data) {
            var dato = $.trim(data);
            if (dato == "1") {//persona y doctor
                swal("Felicidades", "Se guardo correctamente", "success");
                $(".btn_carga_registrar").hide();
                $(".btn_registrar").show();
                $("#modalRegistrar").modal("hide");
            } else {
                $(".btn_carga_registrar").hide();
                $(".btn_registrar").show();
                swal("Error", dato, "error");
                $("#modalRegistrar").modal("hide");
            }
        });
    });
});
function esMayuscula(letra)
{
    return letra === letra.toUpperCase();
}

function esMinuscula(letra)
{
    return letra === letra.toLowerCase();
}