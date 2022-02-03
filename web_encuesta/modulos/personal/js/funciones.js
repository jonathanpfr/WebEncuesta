function llamar_tabla() {
//    $('#example').DataTable({
//        "scrollX": true
//    });

    $('#tbl_lista').DataTable({
        "ajax": {
            "type": "POST",
            "url": 'controlador/vista/json_vista.php',
            "data": function (d) {
//                d.nombre_habitacion = nombre_habitacion;
//                d.id_instituto = id_instituto;
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
//            
//             "I010ID_ALUMNO" => "",
//        "nombre_apellidos" => "",
//        "V010DNI" => "",
//        "V001NOMBRE" => "",
//        "V002NOMBRE" => "",
//        "I010ESTADO" => ""

            {
                "orderable": false,
                "render": function (data, type, full, meta) {
                    var id = full.I010ID_ALUMNO;
                    return '<center><a class="manito" style="color:#2196f3" onclick="buscar_editar(' + id + ')"> <span class="fa fa-pencil g-fa"></span> </a><center>';
                }
            },
            {"className": "text-center", "data": "V001NOMBRE"},
            {"className": "text-center", "data": "V002NOMBRE"},
            {"className": "text-center", "data": "nombre_apellidos"},
            {"className": "text-center", "data": "V010DNI"},
            
            {"orderable": false,
                "render": function (data, type, full, meta) {
                    var id = full.I010ID_ALUMNO;
//                    var curriculum = full.T010CURRICULUM;
//                    if (curriculum == "") {
//                        return '<center>--</center>';
//                    } else {
//                        curriculum = "'" + curriculum + "'";
                        return '<center><span onclick="reporte(' + id + ')" class="fa fa-file manito" style="color:#2196f3"></span></center>';
//                    }

                }
            },
            {"orderable": false,
                "render": function (data, type, full, meta) {
                    var id = full.I010ID_ALUMNO;
                    var curriculum = full.T010CURRICULUM;
                    if (curriculum == "") {
                        return '<center>--</center>';
                    } else {
                        curriculum = "'" + curriculum + "'";
                        return '<center><span onclick="descargar_cv(' + curriculum + ')" class="fa fa-download manito" style="color:#2196f3"></span></center>';
                    }

                }
            },
            {"orderable": false,
                "render": function (data, type, full, meta) {
                    var id = full.I010ID_ALUMNO;
                    return '<center><span onclick="buscar_eliminar(' + id + ')" class="fa fa-remove manito" style="color:#2196f3"></span></center>';
                }
            }
        ],
//        "dom": 'T<"clear">lfrtip',
//        "scrollX": true,
        "scrollCollapse": true
//        "tableTools": {
//            "aButtons": [
//                "print"
//            ]
//        }
    });
}
function actualizar_tabla_atras() {
    $('#tbl_lista').empty();
    llamar_tabla();
}
function descargar_cv(descargar) {
    location.href = "controlador/consultas/descargar.php?file=" + descargar;
}
function reporte(id) {
//    location.href = "vista_reporte.php?id=" + id;
    v = open("vista_reporte.php?id=" + id, "", 'height=' + screen.height + ',width=' + screen.width + ',scrollbars=yes');
}
function buscar_editar(id) {
    location.href = "vista_modificar.php?id=" + id;
//    mostrar_btn_modificar();
//    $("#m_id").val(id);
//    $("#modalModificar").modal("show");
//    $.post("controlador/consultas/json_buscar.php", {
//        id: id
//    }, function (data) {
//        var dato = $.trim(data);
//        $.each(JSON.parse(dato), function (idx, obj) {
//            $("#m_nombre").val(obj.V009NOMBRE);
//            var estado = (obj.I009ESTADO);
//            $("#m_estado").html("<option value='1'>Activo</option><option value='2'>Inactivo</option>");
//            $("#m_estado option[value='" + estado + "']").attr('selected', 'selected');//selecciona el combo...
//
////            $.post("controlador/consultas/combo_perfil.php", function (data) {
////                var dato = $.trim(data);
////                $("#m_perfil").html(dato);
////                $("#m_perfil option[value='" + id_perfil + "']").attr('selected', 'selected');//selecciona el combo...
////            });
//        });
//    });
}
function buscar_eliminar(id) {
    $("#e_id").val(id);
    $("#modalEliminar").modal("show");
    mostrar_btn_eliminar();
}

function btn_nuevo() {
    location.href = "vista_registrar.php";
//    mostrar_btn_registrar();
//    $("#i_nombre").val("");
//    $.post("controlador/consultas/combo_perfil.php", function (data) {
//        var dato = $.trim(data);
//        $("#i_perfil").html(dato);
//    });
}
$(document).ready(function () {

//    (function ($) {
//        $.get = function (key) {
//            key = key.replace(/[\[]/, '\\[');
//            key = key.replace(/[\]]/, '\\]');
//            var pattern = "[\\?&]" + key + "=([^&#]*)";
//            var regex = new RegExp(pattern);
//            var url = unescape(window.location.href);
//            var results = regex.exec(url);
//            if (results === null) {
//                return null;
//            } else {
//                return results[1];
//            }
//        }
//    })(jQuery);
//    //*****************************************************************
//    var id_instituto = $.get("id_instituto");
//    var nombre_instituto = $.get("nombre_instituto");
//    $("#span_nombre").text(nombre_instituto);
//    $("#get_nombre_instituto").val(nombre_instituto);
//    $("#get_id_instituto").val(id_instituto);

    llamar_tabla();
    mostrar_btn_registrar();


    $("#btn_registrar").click(function () {
        ocultar_btn_registrar();

        var id_instituto = $("#get_id_instituto").val();
        var i_nombre = $("#i_nombre").val();


        if ($.trim(i_nombre) == "") {
            swal("Atencion", "Debe escribir un nombre de semestre valido", "warning");
            mostrar_btn_registrar();
            return false;
        }

        $.post("controlador/registrar/registrar.php", {
            id_instituto: id_instituto,
            i_nombre: i_nombre
        }, function (data) {
            var dato = $.trim(data);
            if (dato == "1") {
                swal("Felicidades", "Se ha guardado correctamente", "success");
                btn_nuevo();
                actualizar_tabla_atras();
                $("#modalRegistrar").modal("hide");
            } else {
                mostrar_btn_registrar();
                swal("Error", "Hubo un error, intentelo nuevamente: " + data, "error");
            }
        });

    });

    $("#btn_modificar").click(function () {
        ocultar_btn_modificar();
        var m_id = $("#m_id").val();
        var m_nombre = $("#m_nombre").val();
        var m_estado = $("#m_estado").val();

        if ($.trim(m_nombre) == "") {
            swal("Atencion", "Debe escribir un nombre de semestre valido", "warning");
            mostrar_btn_modificar();
            return false;
        }

        $.post("controlador/modificar/modificar.php", {
            m_nombre: m_nombre,
            m_id: m_id,
            m_estado: m_estado
        }, function (data) {
            var dato = $.trim(data);
            if ($.trim(dato) == "1") {
                swal("Felicidades", "Se ha guardado correctamente", "success");
                mostrar_btn_modificar();
                actualizar_tabla_atras();
                $("#modalModificar").modal("hide");
            } else {
                mostrar_btn_modificar();
                swal("Error", "Hubo un error, intentelo nuevamente: " + data, "error");
            }
        });



    });

    $("#btn_eliminar").click(function () {
        ocultar_btn_eliminar();
        var e_id = $("#e_id").val();

        $.post("controlador/eliminar/eliminar.php", {
            e_id: e_id
        }, function (data) {
            var dato = $.trim(data);
            if ($.trim(dato) == "1") {
                swal("Felicidades", "Se ha eliminado correctamente", "success");
                mostrar_btn_eliminar();
                actualizar_tabla_atras();
                $("#modalEliminar").modal("hide");
            } else {
                mostrar_btn_eliminar();
                swal("Error", "Hubo un error, intentelo nuevamente: " + data, "error");
            }
        });

    });

    $("#btn_nuevo").click(function () {
        $("#modalRegistrar").modal("show");
        btn_nuevo();
    });

    $("#btn_atras").click(function () {
//         var id_instituto=$("#get_id_instituto").val();
//         var nombre_instituto=$("#get_nombre_instituto").val();
        location.href = "../../index.php";
    });


});
