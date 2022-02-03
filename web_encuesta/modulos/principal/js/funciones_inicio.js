$(document).ready(function () {
    $('.modal').modal();
    $("#btn_notificacion").hide();
    $.post("consultar/obtener_usuario.php", function (data) {
        var dato = $.trim(data);
        $.each(JSON.parse(dato), function (idx, obj) {
            var nombre = (obj.nombre);
            var foto = (obj.foto);
            var cargo = (obj.cargo);
            var id_cargo = (obj.id_cargo);
            $(".menu_tipo_usuario").hide();
            if (id_cargo == "1") {
                $("#menu_vendedor").show();
            } else if (id_cargo == "2") {
                $("#menu_almacenero").show();
                alerta(0);
                alerta_pedido(0);
                $("#btn_notificacion").show();
            } else if (id_cargo == "3") {
                $("#menu_jefe_almacenero").show();
                alerta(0);
                alerta_pedido(0);
                $("#btn_notificacion").show();
            } else if (id_cargo == "4") {
                $("#menu_compras").show();
            } else if (id_cargo == "5") {
                $("#menu_despacho").show();
            } else if (id_cargo == "6") {
                alerta(0);
                alerta_pedido(0);
                $("#menu_admin").show();
                $("#btn_notificacion").show();
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

    $("#btn_notificacion").click(function () {
        alerta(1);
        alerta_pedido(1);
    });
});
function funcion_dato_actual() {
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
function alerta(alerta) {
    var fecha = funcion_dato_actual();
    $.post("consultar/verificar_stock.php", {
        fecha: fecha
    }, function (data) {
        var dato = $.trim(data);
        if (dato == "") {
            //alerta
            if (alerta == 0) {

            } else {
                swal("Atencion", "No se ha detectado ninguna notificacion en stock", "error");
            }
        } else {
            $("#modalProducto").modal('open');
            $("#cargar_productos").html(dato);
        }
    });
}
function alerta_pedido(alerta) {
    var fecha = funcion_dato_actual();
    $.post("consultar/verificar_pedidos.php", {
        fecha: fecha
    }, function (data) {
        var dato = $.trim(data);
        if (dato != "") {
            $("#modalPedido").modal('open');
            $("#cargar_pedido").html(dato);
        } else {
            if (alerta == 0) {

            } else {
                swal("Atencion", "No se ha detectado ninguna notificacion en pedidos", "error");
            }
        }
    });
}
