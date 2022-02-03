function llamar_tabla() {
//    $('#example').DataTable({
//        "scrollX": true
//    });

    $('#tbl_lista').DataTable({
        "ajax": {
            "type": "POST",
            "url": 'controlador/vista/json_vista.php',
            "data": function (d) {
            }
        },
        "destroy": true,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "<center>Ningún dato disponible en esta tabla</center>",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "columns": [
            {
//                "V006ID_TRABAJADOR" => "",
//        "V006NOMBRES" => "",
//        "V006APELLIDO_PATERNO" => "",
//        "V006APELLIDO_MATERNO" => "",
//        "V007NOMBRE" => "",
//        "V006NUMERO_DOCUMENTO" => "",
//        "V006CORREO" => "",
//        "V006TELEFONO" => "",
//        "V005NOMBRE" => "",
//        "I005ID_USUARIO" => "",
//        "I006ESTADO" => "",
//        "V005USUARIO" => ""
                "orderable": false,
                "render": function (data, type, full, meta) {
                    var id = full.I006ID_TRABAJADOR;
                    return '<center><a class="manito" style="color:#2196f3" onclick="buscar_editar(' + id + ')"> <span class="fa fa-pencil g-fa"></span> </a><center>';
                }
            },
            {"className": "text-center", "data": "nombre_completo"},
//            {"className": "text-center", "data": "V006APELLIDO_PATERNO"},
//            {"className": "text-center", "data": "V006APELLIDO_MATERNO"},
            {"className": "text-center", "data": "V007NOMBRE"},
            {"className": "text-center", "data": "V006NUMERO_DOCUMENTO"},
            {"className": "text-center", "data": "V006CORREO"},
            {"className": "text-center", "data": "V006TELEFONO"},
            {"className": "text-center", "data": "V005USUARIO"},
            //eliminar
            {"orderable": false,
                "render": function (data, type, full, meta) {
                    var estado = full.I006ESTADO;
                    if (estado == 1) {
                        return '<center><span  style="color:blue">ACTIVO</span></center>';
                    } else if (estado == 2) {
                        return '<center><span  style="color:red">INACTIVO</span></center>';
                    }

                }
            },
            {"orderable": false,
                "render": function (data, type, full, meta) {
                    var id = full.I006ID_TRABAJADOR;
                    return '<center><span onclick="buscar_eliminar(' + id + ')" class="fa fa-remove manito" style="color:#2196f3"></span></center>';
                }
            }
        ],
        "scrollCollapse": true
    });
}
function actualizar_tabla_atras() {
    $('#tbl_lista').empty();
    llamar_tabla();
}
function buscar_editar(id) {
    mostrar_btn_modificar();
    $("#m_id").val(id);
    $("#m_cambio").val("0");
    $("#modalModificar").modal("show");
    $.post("controlador/consultas/json_buscar.php", {
        id: id
    }, function (data) {
        var dato = $.trim(data);
//        alert(dato);
        $.each(JSON.parse(dato), function (idx, obj) {
            $("#m_nombre").val(obj.V006NOMBRES);
            $("#m_apellido_p").val(obj.V006APELLIDO_PATERNO);
            $("#m_apellido_m").val(obj.V006APELLIDO_MATERNO);
            $("#m_numero_documento").val(obj.V006NUMERO_DOCUMENTO);
            $("#m_direccion").val(obj.V006DIRECCION);
            $("#m_correo").val(obj.V006CORREO);
            $("#m_celular").val(obj.V006TELEFONO);
            $.post("controlador/consultas/combo_tipo_documento.php", function (data) {
                var dato = $.trim(data);
                $("#m_tipo_documento").html(dato);
                $("#m_tipo_documento option[value='" + obj.I007ID_TIPO_DOCUMENTO + "-" + obj.I007NUMERO_DIGITOS + "-" + obj.I007TIPO_VARIABLE + "-" + obj.V007NOMBRE + "']").attr('selected', 'selected');//selecciona el combo...

                var numero_digitos = obj.I007NUMERO_DIGITOS;
                var tipo_pariable = obj.I007TIPO_VARIABLE;

                $("#m_numero_documento").unbind();
                if (tipo_pariable == 1) {
                    $("#m_numero_documento").attr('maxlength', numero_digitos);
                    $("#m_numero_documento").bind('keypress', function (e) {
                        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                            return false;
                        }
                    });
                }


            });
            var estado = (obj.I006ESTADO);
            $("#m_estado").html("<option value='1'>Activo</option><option value='2'>Inactivo</option>");
            $("#m_estado option[value='" + estado + "']").attr('selected', 'selected');//selecciona el combo...

            var id_usuario = (obj.I005ID_USUARIO);
            if (id_usuario == null) {
                id_usuario = 0;
            }
            $("#m_id_usuario").val(id_usuario);
            if (id_usuario != 0) {
                $("#m_tipo_usuario").val(1);
                $("#m_si").attr('checked', 'checked');
                $("#m_div_usuario").show();
                $("#m_usuario").val(obj.V005USUARIO);

                $("#m_check").prop("checked", false);
                $("#m_clave").val("11111111111111111111111");
                $("#m_clave").prop("disabled", true);


                var imagen = (obj.T005IMAGEN);
                var id_perfil = (obj.I004ID_PERFIL);
                $("#back_imagen").val(imagen);
                $("#nombre_imagen").val(imagen);


                if (imagen == "") {
                    $("#m_file").val("");
                    $(".m_con_carga_foto").hide();
                    $(".m_sin_carga_foto").show();
                } else {
                    var direccion_imagen = "../../paquetes/imagenes/usuarios/" + imagen;
                    $("#m_imagen").attr("src", direccion_imagen);

                    $("#m_file").val("");
                    $(".m_con_carga_foto").show();
                    $(".m_sin_carga_foto").hide();
                }
                $.post("controlador/consultas/combo_perfil.php", function (data) {
                    var dato = $.trim(data);
                    $("#m_perfil").html(dato);
                    $("#m_perfil option[value='" + id_perfil + "']").attr('selected', 'selected');//selecciona el combo...
                });
                $("#m_contra_check").show();
            } else {
                $("#m_check").prop("checked", true);
                $("#m_contra_check").hide();

                $("#m_tipo_usuario").val(2);
                $("#m_div_usuario").hide();
                $("#m_no").attr('checked', 'checked');

                $.post("controlador/consultas/combo_perfil.php", function (data) {
                    var dato = $.trim(data);
                    $("#m_perfil").html(dato);
                });

                $("#m_usuario").val("");
                $("#back_imagen").val("");
                $("#nombre_imagen").val("");
                $("#m_clave").val("");
                $("#m_clave").prop("disabled", false);

                $("#m_file").val("");
                $(".m_con_carga_foto").hide();
                $(".m_sin_carga_foto").show();
            }


        });
    });
}
function buscar_eliminar(id) {
    $("#e_id").val(id);
    $("#modalEliminar").modal("show");
    mostrar_btn_eliminar();
}
//function usuario_defecto() {
//    var i_nombre = $("#i_nombre").val();
//    var i_apellido_p = $("#i_apellido_p").val();
//    var i_apellido_m = $("#i_apellido_m").val();
//    var usuario_generado = "";
//    var primera_letra = i_nombre.charAt(0);
//    var ultima_letra_letra = i_apellido_m.charAt(0);
//    usuario_generado = primera_letra + "" + i_apellido_p + "" + ultima_letra_letra;
//    $("#i_usuario").val(usuario_generado);
//}


function btn_nuevo() {
    mostrar_btn_registrar();
    $("#i_file").val("");
    $(".i_con_carga_foto").hide();
    $(".i_sin_carga_foto").show();
    $("#i_nombre").val("");
    $("#i_apellido_p").val("");
    $("#i_apellido_m").val("");
    $("#i_direccion").val("");
    $("#i_correo").val("");
    $("#i_celular").val("");
    $("#i_numero_documento").val("");
    $("#i_tipo_usuario").val("1");
//    $("#i_si").attr('checked', false);
//    $("#i_no").attr('checked', false);
//    $("#i_si").attr('checked', '');
//    $("#i_no").attr('checked', '');
//    $("#i_si").attr("checked");

//    $("#i_si").attr('checked', true);
    $("#i_si").attr('checked', 'checked');
    $("#i_div_usuario").show();

    $("#i_usuario").val("");
    $("#i_clave").val("");

    $.post("controlador/consultas/combo_perfil.php", function (data) {
        var dato = $.trim(data);
        $("#i_perfil").html(dato);
    });
    $.post("controlador/consultas/combo_tipo_documento.php", function (data) {
        var dato = $.trim(data);
        $("#i_tipo_documento").html(dato);
    });
}
$(document).ready(function () {

    llamar_tabla();
    mostrar_btn_registrar();

    $("#i_si").click(function () {
        $("#i_tipo_usuario").val("1");
        $("#i_div_usuario").show("slow");
    });
    $("#i_no").click(function () {
        $("#i_tipo_usuario").val("2");
        $("#i_div_usuario").hide("slow");
    });

    $("#m_si").click(function () {
        $("#m_tipo_usuario").val("1");
        $("#m_div_usuario").show("slow");
    });
    $("#m_no").click(function () {
        $("#m_tipo_usuario").val("2");
        $("#m_div_usuario").hide("slow");
    });

    $("#i_tipo_documento").change(function () {
        var tipo = $(this).val();
        var array_tipo = tipo.split("-");
        var id_tipo_documento = array_tipo[0];
        var numero_digitos = array_tipo[1];
        var tipo_variable = array_tipo[2];
        if (id_tipo_documento == 0) {
            $("#i_numero_documento").val("");
        } else {
            $("#i_numero_documento").val("");
            if (tipo_variable == 1) {
                $("#i_numero_documento").unbind();
                $("#i_numero_documento").attr('maxlength', numero_digitos);
                $("#i_numero_documento").bind('keypress', function (e) {
                    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        return false;
                    }
                });

            }
        }
    });

    $("#m_tipo_documento").change(function () {
        var tipo = $(this).val();
        var array_tipo = tipo.split("-");
        var id_tipo_documento = array_tipo[0];
        var numero_digitos = array_tipo[1];
        var tipo_variable = array_tipo[2];
        if (id_tipo_documento == 0) {
            $("#m_numero_documento").val("");
        } else {
            $("#m_numero_documento").val("");
            if (tipo_variable == 1) {
                $("#m_numero_documento").unbind();
                $("#m_numero_documento").attr('maxlength', numero_digitos);
                $("#m_numero_documento").bind('keypress', function (e) {
                    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        return false;
                    }
                });

            }
        }
    });

    $("#btn_registrar").click(function () {
        ocultar_btn_registrar();
        var i_nombre = $("#i_nombre").val();
        var i_apellido_p = $("#i_apellido_p").val();
        var i_apellido_m = $("#i_apellido_m").val();
        var i_tipo_usuario = $("#i_tipo_usuario").val();
        var i_tipo_documento = $("#i_tipo_documento").val();
        var i_numero_documento = $("#i_numero_documento").val();
        var i_correo = $("#i_correo").val();
        var i_celular = $("#i_celular").val();
        var i_perfil = $("#i_perfil").val();
        var i_usuario = $("#i_usuario").val();
        var i_clave = $("#i_clave").val();
        var i_direccion = $("#i_direccion").val();

        if ($.trim(i_nombre) == "") {
            swal("Atencion", "Debe escribir un nombre valido", "warning");
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_apellido_p) == "") {
            swal("Atencion", "Debe escribir un apellido paterno valido", "warning");
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_apellido_m) == "") {
            swal("Atencion", "Debe escribir un apellido materno valido", "warning");
            mostrar_btn_registrar();
            return false;
        }
        var array_tipo = i_tipo_documento.split("-");
        var id_tipo_documento = array_tipo[0];
        var numero_digitos = array_tipo[1];
        var nombre_documento = array_tipo[3];
        if (id_tipo_documento == 0) {
            swal("Atencion", "Debe elegir un tipo de documento valido", "warning");
            mostrar_btn_registrar();
            return false;
        } else {
            if ($.trim(i_numero_documento) == "") {
                swal("Atencion", "Debe escribir un numero de documento valido", "warning");
                mostrar_btn_registrar();
                return false;
            }
            var a_numero_digitos = $("#i_numero_documento").val().length;
//            alert(numero_digitos + " !=" + a_numero_digitos);
            if (numero_digitos != a_numero_digitos) {
                swal("Atencion", "El tipo de documento " + nombre_documento + " requiere " + numero_digitos + " digitos", "warning");
                mostrar_btn_registrar();
                return false;
            }
        }


        if ($.trim(i_correo) != "") {

            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(i_correo)) {
//                var correo_empresa = "@";
//                var dominio = "kizuroko.holdings";
            } else {
                swal("Atencion", "Escriba un correo valido", "warning");
                mostrar_btn_registrar();
                return false;
            }

//            var domains = ['kizuroko.holdings'];//dominios
//
//            $("#i_correo").mailcheck(domains, {
//                suggested: function (element, suggestion) {
//// callback code 
//                },
//                empty: function (element) {
//// callback code 
//                }
//            })
//
//            var array_correo = i_correo.split("@");
//            var dominio_correo = (array_correo[1]);
//
//            if (array_correo.length <= 1) {
//                swal("Atencion", "Escriba un correo valido", "warning");
//                mostrar_btn_registrar();
//                return false;
//            }
//            if (array_correo.length == 2) {
//                if (dominio_correo != "kizuroko.holdings") {
//                    swal("Atencion", "El correo  debe contener @kizuroko.holdings", "warning");
//                    mostrar_btn_registrar();
//                    return false;
//                }
//            } else {
//                swal("Atencion", "Escriba un correo valido", "warning");
//                mostrar_btn_registrar();
//                return false;
//            }

        }
        if ($.trim(i_celular) != "") {
            if ((i_celular).length == 9 || (i_celular).length == 7) {

            } else {
                swal("Atencion", "Debe escribir un numero de Telefono o celular valido", "warning");
                mostrar_btn_registrar();
                return false;
            }

        }



        var formData = new FormData();
        if (i_tipo_usuario == "1") {
            if ($.trim(i_perfil) == "0") {
                swal("Atencion", "Debe elegir un perfil valido", "warning");
                mostrar_btn_registrar();
                return false;
            }
            if ($.trim(i_usuario) == "") {
                swal("Atencion", "Debe escribir un usuario valido", "warning");
                mostrar_btn_registrar();
                return false;
            }
            if ($.trim(i_clave) == "") {
                swal("Atencion", "Debe escribir una clave valida", "warning");
                mostrar_btn_registrar();
                return false;
            }


            var i_file = document.getElementById('i_file').files;
            for (var x = 0; x < i_file.length; x++) {
                var size = i_file[x].size;
                var type = i_file[x].type;
                var name = i_file[x].name;
                if (size > 1024 * 1024)
                {
                    mostrar_btn_registrar();
                    swal("Atencion", "El archivo " + name + " supera el maximo permitido", "warning");
                    return false;
                }
            }
        } else {

        }


        formData.append('i_direccion', i_direccion);
        formData.append('i_nombre', i_nombre);
        formData.append('i_apellido_p', i_apellido_p);
        formData.append('i_apellido_m', i_apellido_m);
        formData.append('i_tipo_usuario', i_tipo_usuario);
        formData.append('id_tipo_documento', id_tipo_documento);

        formData.append('i_numero_documento', i_numero_documento);
        formData.append('i_correo', i_correo);
        formData.append('i_celular', i_celular);

        formData.append('i_perfil', i_perfil);
        formData.append('i_usuario', i_usuario);
        formData.append('i_clave', i_clave);
        formData.append("i_file", document.getElementById('i_file').files[0]);

        //verificar que el usuario sea unico
        $.post("controlador/consultas/verificar_usuario_registrar.php", {
            usuario: i_usuario, id_tipo_documento: id_tipo_documento, numero_documento: i_numero_documento
        }, function (data) {
            var dato = $.trim(data);
            if (dato == "0") {
//                alert("se guardo");
                $.ajax({
                    url: "controlador/registrar/registrar.php", // our php file
                    type: 'post',
                    data: formData,
                    dataType: 'html', // we return html from our php file
                    async: true,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function (data) {
                        if ($.trim(data) == "1") {
                            swal("Felicidades", "Se ha guardado correctamente", "success");
                            btn_nuevo();
                            actualizar_tabla_atras();
                            $("#modalRegistrar").modal("hide");
                        } else {
                            mostrar_btn_registrar();
                            swal("Error", "Hubo un error, intentelo nuevamente: " + data, "error");
                        }
                    },
                    error: function (request) {
                        mostrar_btn_registrar();
                        swal("Error", "Hubo un error, intentelo nuevamente: " + request, "error");
                    }
                });
            } else {
                mostrar_btn_registrar();
                swal("Error", dato, "error");
            }
        });


    });

    $("#btn_modificar").click(function () {
        ocultar_btn_modificar();
        var m_id = $("#m_id").val();
        var m_id_usuario = $("#m_id_usuario").val();
        var m_tipo_usuario = $("#m_tipo_usuario").val();
        var cambio = $("#m_cambio").val();//0 sin pulsar,1=pulsado
        var m_nombre = $("#m_nombre").val();
        var m_apellido_p = $("#m_apellido_p").val();
        var m_apellido_m = $("#m_apellido_m").val();

        var m_tipo_documento = $("#m_tipo_documento").val();
        var m_numero_documento = $("#m_numero_documento").val();
        var m_correo = $("#m_correo").val();
        var m_direccion = $("#m_direccion").val();
        var m_celular = $("#m_celular").val();

        var m_perfil = $("#m_perfil").val();
        var m_usuario = $("#m_usuario").val();
        var m_clave = $("#m_clave").val();
        var m_estado = $("#m_estado").val();
        var back_imagen = $("#back_imagen").val();

        var cambiar_clave = 0;
        if ($("#m_check").prop('checked')) {
            cambiar_clave = 1;
        } else {
            cambiar_clave = 0;
        }

        if ($.trim(m_nombre) == "") {
            swal("Atencion", "Debe escribir un nombre valido", "warning");
            mostrar_btn_modificar();
            return false;
        }
        if ($.trim(m_apellido_p) == "") {
            swal("Atencion", "Debe escribir un apellido paterno valido", "warning");
            mostrar_btn_modificar();
            return false;
        }
        if ($.trim(m_apellido_m) == "") {
            swal("Atencion", "Debe escribir un apellido materno valido", "warning");
            mostrar_btn_modificar();
            return false;
        }

        var array_tipo = m_tipo_documento.split("-");
        var id_tipo_documento = array_tipo[0];
        var numero_digitos = array_tipo[1];
        var nombre_documento = array_tipo[3];
        if (id_tipo_documento == 0) {
            swal("Atencion", "Debe elegir un tipo de documento valido", "warning");
            mostrar_btn_modificar();
            return false;
        } else {
            if ($.trim(m_numero_documento) == "") {
                swal("Atencion", "Debe escribir un numero de documento valido", "warning");
                mostrar_btn_modificar();
                return false;
            }
            var a_numero_digitos = $("#m_numero_documento").val().length;
//            alert(numero_digitos + " !=" + a_numero_digitos);
            if (numero_digitos != a_numero_digitos) {
                swal("Atencion", "El tipo de documento " + nombre_documento + " requiere " + numero_digitos + " digitos", "warning");
                mostrar_btn_modificar();
                return false;
            }
        }


        if ($.trim(m_correo) != "") {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(m_correo)) {
            } else {
                swal("Atencion", "Escriba un correo valido", "warning");
                mostrar_btn_modificar();
                return false;
            }
//            var array_correo = m_correo.split("@");
//            var dominio_correo = (array_correo[1]);
//
//            if (array_correo.length <= 1) {
//                swal("Atencion", "Escriba un correo valido", "warning");
//                mostrar_btn_modificar();
//                return false;
//            }
//            if (array_correo.length == 2) {
//                if (dominio_correo != "kizuroko.holdings") {
//                    swal("Atencion", "El correo  debe contener @kizuroko.holdings", "warning");
//                    mostrar_btn_modificar();
//                    return false;
//                }
//            } else {
//                swal("Atencion", "Escriba un correo valido", "warning");
//                mostrar_btn_modificar();
//                return false;
//            }
        }
        if ($.trim(m_celular) != "") {
            if ((m_celular).length == 9 || (m_celular).length == 7) {

            } else {
                swal("Atencion", "Debe escribir un numero de Telefono o celular valido", "warning");
                mostrar_btn_modificar();
                return false;
            }
        }

        var formData = new FormData();
        if (m_tipo_usuario == "1") {
            if ($.trim(m_perfil) == "0") {
                swal("Atencion", "Debe elegir un perfil valido", "warning");
                mostrar_btn_modificar();
                return false;
            }
            if ($.trim(m_usuario) == "") {
                swal("Atencion", "Debe escribir un usuario valido", "warning");
                mostrar_btn_modificar();
                return false;
            }

            if ($("#m_check").prop('checked')) {
                if ($.trim(m_clave) == "") {
                    swal("Atencion", "Debe escribir una clave valida", "warning");
                    mostrar_btn_modificar();
                    return false;
                }
            }

            var i_file = document.getElementById('m_file').files;
            for (var x = 0; x < i_file.length; x++) {
                var size = i_file[x].size;
                var type = i_file[x].type;
                var name = i_file[x].name;
                if (size > 1024 * 1024)
                {
                    mostrar_btn_modificar();
                    swal("Atencion", "El archivo " + name + " supera el maximo permitido", "warning");
                    return false;
                }
            }

        }



        formData.append('m_id', m_id);
        formData.append('m_id_usuario', m_id_usuario);
        formData.append('m_nombre', m_nombre);
        formData.append('m_apellido_p', m_apellido_p);
        formData.append('m_apellido_m', m_apellido_m);
        formData.append('m_tipo_documento', id_tipo_documento);
        formData.append('m_numero_documento', m_numero_documento);
        formData.append('m_correo', m_correo);
        formData.append('m_direccion', m_direccion);
        formData.append('m_celular', m_celular);
        formData.append('m_tipo_usuario', m_tipo_usuario);
        formData.append('m_estado', m_estado);

        formData.append('m_perfil', m_perfil);
        formData.append('m_usuario', m_usuario);
        formData.append('m_clave', m_clave);
        formData.append('cambio', cambio);
        formData.append('cambiar_clave', cambiar_clave);
        formData.append('back_imagen', back_imagen);

        formData.append("m_file", document.getElementById('m_file').files[0]);

        $.post("controlador/consultas/verificar_usuario_modificar.php", {
            usuario: m_usuario,
            id: m_id,
            m_id_usuario: m_id_usuario,
            m_tipo_documento: id_tipo_documento,
            m_numero_documento: m_numero_documento
        }, function (data) {
            var dato = $.trim(data);
            if (dato == "0") {
                $.ajax({
                    url: "controlador/modificar/modificar.php", // our php file
                    type: 'post',
                    data: formData,
                    dataType: 'html', // we return html from our php file
                    async: true,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function (data) {
                        if ($.trim(data) == "1") {
                            swal("Felicidades", "Se ha guardado correctamente", "success");
                            mostrar_btn_modificar();
                            actualizar_tabla_atras();
                            $("#modalModificar").modal("hide");
                        } else {
                            mostrar_btn_modificar();
                            swal("Error", "Hubo un error, intentelo nuevamente: " + data, "error");
                        }
                    },
                    error: function (request) {
                        mostrar_btn_modificar();
                        swal("Error", "Hubo un error, intentelo nuevamente: " + request, "error");
                    }
                });
            } else {
                mostrar_btn_modificar();
                swal("Error", dato, "error");
            }
        });



    });

    $("#btn_eliminar").click(function () {
        ocultar_btn_eliminar();
        var e_id = $("#e_id").val();
        var formData = new FormData();
        formData.append('e_id', e_id);

        $.ajax({
            url: "controlador/eliminar/eliminar.php", // our php file
            type: 'post',
            data: formData,
            dataType: 'html', // we return html from our php file
            async: true,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function (data) {
                if ($.trim(data) == "1") {
                    swal("Felicidades", "Se ha eliminado correctamente", "success");
                    mostrar_btn_eliminar();
                    actualizar_tabla_atras();
                    $("#modalEliminar").modal("hide");
                } else {
                    mostrar_btn_eliminar();
                    swal("Error", "Hubo un error, intentelo nuevamente: " + data, "error");
                }
            },
            error: function (request) {
                mostrar_btn_modificar();
                swal("Error", "Hubo un error, intentelo nuevamente: " + request, "error");
            }
        });

    });


    $("#m_check").click(function () {
        if ($("#m_check").prop('checked')) {
            $("#m_clave").focus();
            $("#m_clave").val("");
            $("#m_clave").prop("disabled", false);
        } else {
            $("#m_clave").val("11111111111111111111111");
            $("#m_clave").prop("disabled", true);
        }
    });

    $("#btn_nuevo").click(function () {
        $("#modalRegistrar").modal("show");
        btn_nuevo();
    });


    $("#i_file").on("change", function () {
//        $("#i_mensaje").html("");
        var archivos = document.getElementById('i_file').files;
        var navegador = window.URL || window.webkitURL;
        for (var x = 0; x < archivos.length; x++) {
            var size = archivos[x].size;
            var type = archivos[x].type;
            var name = archivos[x].name;
            if (size > 1024 * 1024)
            {
                swal("Atencion", "El archivo " + name + " supera el maximo permitido", "warning");
                $("#i_file").val("");
                $(".i_con_carga_foto").hide();
                $(".i_sin_carga_foto").show();
            }
            var array_nombre = name.split(".");
            var tipo_archivo = (array_nombre[1]).toLowerCase();                                                       //'tif', 'tiff', 'bmp'
            if (tipo_archivo == "jpg" || tipo_archivo == "jpeg" || tipo_archivo == "gif" || tipo_archivo == "png" || tipo_archivo == "tif" || tipo_archivo == "tiff" || tipo_archivo == "bmp")
            {
                var objeto_url = navegador.createObjectURL(archivos[0]);
                $("#i_imagen").attr("src", objeto_url);
                $(".i_con_carga_foto").show();
                $(".i_sin_carga_foto").hide();
//                $("#i_mensaje").html("<div class='col-sm-6'> <img class='img-thumbnail mediana' src=" + objeto_url + "></div>");
//                 $("#i_mensaje").html("<div class='col-sm-3'> <img class='img-thumbnail mediana' src=" + objeto_url + "/></div>");
            } else {
//                $("#i_mensaje").html("<p style='color:red'>El archivo " + name + " no es del tipo de archivo permitido</p>");
                swal("Atencion", "El archivo " + name + " no es del tipo de archivo permitido", "warning");
                $("#i_file").val("");
                $(".i_con_carga_foto").hide();
                $(".i_sin_carga_foto").show();
            }
        }

    });

    $("#m_file").on("change", function () {
//        $("#i_mensaje").html("");
        var archivos = document.getElementById('m_file').files;
        var navegador = window.URL || window.webkitURL;
        for (var x = 0; x < archivos.length; x++) {
            var size = archivos[x].size;
            var type = archivos[x].type;
            var name = archivos[x].name;
            if (size > 1024 * 1024)
            {
                swal("Atencion", "El archivo " + name + " supera el maximo permitido", "warning");
                $("#m_file").val("");
                $(".m_con_carga_foto").hide();
                $(".m_sin_carga_foto").show();
            }
            var array_nombre = name.split(".");
            var tipo_archivo = (array_nombre[array_nombre.length - 1]).toLowerCase();
            if (tipo_archivo == "jpg" || tipo_archivo == "jpeg" || tipo_archivo == "gif" || tipo_archivo == "png" || tipo_archivo == "tif" || tipo_archivo == "tiff" || tipo_archivo == "bmp")
            {
                var objeto_url = navegador.createObjectURL(archivos[0]);
                $("#m_imagen").attr("src", objeto_url);
                $(".m_con_carga_foto").show();
                $(".m_sin_carga_foto").hide();
//                $("#i_mensaje").html("<div class='col-sm-6'> <img class='img-thumbnail mediana' src=" + objeto_url + "></div>");
//                 $("#i_mensaje").html("<div class='col-sm-3'> <img class='img-thumbnail mediana' src=" + objeto_url + "/></div>");
            } else {
//                $("#i_mensaje").html("<p style='color:red'>El archivo " + name + " no es del tipo de archivo permitido</p>");
                swal("Atencion", "El archivo " + name + " no es del tipo de archivo permitido", "warning");
                $("#m_file").val("");
                $(".m_con_carga_foto").hide();
                $(".m_sin_carga_foto").show();
            }
        }

    });

    $("#i_quitar_imagen").click(function () {
        $("#i_file").val("");
        $(".i_con_carga_foto").hide();
        $(".i_sin_carga_foto").show();
    });

    $("#m_quitar_imagen").click(function () {
        $("#m_cambio").val("1");
        $("#m_file").val("");
        $(".m_con_carga_foto").hide();
        $(".m_sin_carga_foto").show();
    });

});
