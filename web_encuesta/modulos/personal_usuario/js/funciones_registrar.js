
function btn_nuevo() {
    mostrar_btn_registrar();
    $("#a_cant").numeric();
    $("#i_nro_cip").numeric();
    $("#i_dni").numeric();

//    $("#i_file").val("");
//    $(".i_con_carga_foto").hide();
//    $(".i_sin_carga_foto").show();
//    $("#i_nombre").val("");
//    $("#i_apellido_p").val("");
//    $("#i_apellido_m").val("");
//    $("#i_dni").val("");
//    $("#i_usuario").val("");
//    $("#i_clave").val("");

    $("#i_nro_cip").val("");
    $("#i_dni").val("");
    $("#i_apellido_paterno").val("");
    $("#i_apellido_materno").val("");
    $("#i_nombres").val("");
    $("#i_fecha_nacimiento").val("");
    $("#i_universidad_instituto").val("");
    $("#i_calle_av_jr_domicilio").val("");
    $("#i_urbanizacion").val("");
    $("#i_distrito_domicilio").val("");
    $("#i_idiomas_domina").val("");
    $("#i_denominacion_religion").val("");
    $("#i_telefono").val("");
    $("#i_mail").val("");
    $("#i_fecha_ingreso_marina").val("");
    $("#i_fecha_ultimo_ascenso_grado_actual").val("");
    $("#i_nro_brevete").val("");
    $("#i_modelo_vehiculo").val("");
    $("#i_placa_nro").val("");
    $("#i_nro_lic_arma").val("");
    $("#i_modelo_arma").val("");
    $("#i_tipo_arma").val("");
    $("#i_marca_arma").val("");
    $("#i_calibre_arma").val("");
    $("#i_curso_seguir_dictar").val("");
    $("#i_dependencia_origen_destaque").val("");
    $("#i_nro_carta_referencia").val("");
    $("#i_cargo_ocupaba_dependencia").val("");
    $("#i_chofer_emergencia").val("");
    $("#i_brevete_militar_emergencia").val("");
    $("#i_puesto_zafarrancho_emergencia").val("");
    $("#i_emergencia_llamar_a").val("");
    $("#i_emergencia_parentesco").val("");
    $("#i_emergencia_parentesco_telefono").val("");
    $("#i_emergencia_parentesco_centro_trabajo").val("");
    $("#i_emergencia_parentesco_domicilio").val("");

    $("#i_nombre_padre").val("");
    $("#i_ocupacion_padre").val("");
    $("#i_domicilio_padre").val("");
    $("#i_telefono_padre").val("");

    $("#i_nombre_madre").val("");
    $("#i_ocupacion_madre").val("");
    $("#i_domicilio_madre").val("");
    $("#i_telefono_madre").val("");
    //**************************************
    $("#i_nacionalidad_esposa").val("");
    $("#i_nombres_apellidos_esposa").val("");
    $("#i_fecha_nacimiento_esposa").val("");
    $("#i_dpto_esposa").val("");
    $("#i_centro_labores_esposa").val("");
    $("#i_cargo_grado_profesion_esposa").val("");
    $("#i_domicilio_esposa").val("");
    $("#i_telefono_esposa").val("");
    //********** combos de si o no *************
    $("#i_liper").html("<option value='0'>--SELECCIONE--</option><option value='1'>SI</option><option value='2'>NO</option>");
    $("#i_lisan").html("<option value='0'>--SELECCIONE--</option><option value='1'>SI</option><option value='2'>NO</option>");
    $("#i_tin").html("<option value='0'>--SELECCIONE--</option><option value='1'>SI</option><option value='2'>NO</option>");

    $("#i_vive_padre").html("<option value='0'>--SELECCIONE--</option><option value='1'>SI</option><option value='2'>NO</option>");
    $("#i_vive_madre").html("<option value='0'>--SELECCIONE--</option><option value='1'>SI</option><option value='2'>NO</option>");

    $("#i_matrimonio_civil_esposa").html("<option value='0'>--SELECCIONE--</option><option value='1'>SI</option><option value='2'>NO</option>");
    $("#i_matrimonio_religioso_esposa").html("<option value='0'>--SELECCIONE--</option><option value='1'>SI</option><option value='2'>NO</option>");

    $.post("controlador/consultas/combo_compromiso_esposa.php", function (data) {
        var dato = $.trim(data);
        $("#i_tipo_compromiso_esposa").html(dato);
    });

    $.post("controlador/consultas/combo_condicion_llega.php", function (data) {
        var dato = $.trim(data);
        $("#i_condicion_llega").html(dato);
    });
    $.post("controlador/consultas/combo_departamento.php", function (data) {
        var dato = $.trim(data);
        $("#i_departamento_nacimiento").html(dato);
    });
    $("#i_provincia_nacimiento").html('<option value="0">::SELECCIONE::</option>');
    $("#i_distrito_nacimiento").html('<option value="0">::SELECCIONE::</option>');
    $.post("controlador/consultas/combo_especialidad.php", function (data) {
        var dato = $.trim(data);
        $("#i_especialidad").html(dato);
    });
    $.post("controlador/consultas/combo_estado_civil.php", function (data) {
        var dato = $.trim(data);
        $("#i_estado_civil").html(dato);
    });
    $.post("controlador/consultas/combo_grado_catrgoria.php", function (data) {
        var dato = $.trim(data);
        $("#i_grado_categoria").html(dato);
    });
    $.post("controlador/consultas/combo_grado_instruccion.php", function (data) {
        var dato = $.trim(data);
        $("#i_grado_instruccion").html(dato);
    });
    $.post("controlador/consultas/combo_grupo_sanguineo.php", function (data) {
        var dato = $.trim(data);
        $("#i_grupo_sanguineo").html(dato);
    });
    $.post("controlador/consultas/combo_religion.php", function (data) {
        var dato = $.trim(data);
        $("#i_religion").html(dato);
    });
    $.post("controlador/consultas/combo_tipo_condicion_llega.php", function (data) {
        var dato = $.trim(data);
        $("#i_condicion_llega").html(dato);
    });
    $.post("controlador/consultas/combo_tipo_vivienda.php", function (data) {
        var dato = $.trim(data);
        $("#i_tipo_vivienda").html(dato);
    });
}
$(document).ready(function () {
//    llamar_tabla();
    mostrar_btn_registrar();
    btn_nuevo();
    $("#btn_registrar").click(function () {
        ocultar_btn_registrar();

        var i_grado_categoria = $("#i_grado_categoria").val();//********************
        var i_especialidad = $("#i_especialidad").val();//********************

        var i_nro_cip = $("#i_nro_cip").val();
        var i_dni = $("#i_dni").val();
        var i_grupo_sanguineo = $("#i_grupo_sanguineo").val();//********************
        var i_apellido_paterno = $("#i_apellido_paterno").val();
        var i_apellido_materno = $("#i_apellido_materno").val();
        var i_nombres = $("#i_nombres").val();
        //file*********************************************************************************
        var i_fecha_nacimiento = $("#i_fecha_nacimiento").val();

        var i_distrito_nacimiento = $("#i_distrito_nacimiento").val();//********************
        var i_provincia_nacimiento = $("#i_provincia_nacimiento").val();//********************
        var i_departamento_nacimiento = $("#i_departamento_nacimiento").val();//********************
        var i_grado_instruccion = $("#i_grado_instruccion").val();//********************

        var i_universidad_instituto = $("#i_universidad_instituto").val();
        var i_calle_av_jr_domicilio = $("#i_calle_av_jr_domicilio").val();
        var i_urbanizacion = $("#i_urbanizacion").val();
        var i_distrito_domicilio = $("#i_distrito_domicilio").val();
        //file*********************************************************************************
        var i_estado_civil = $("#i_estado_civil").val();//********************
        var i_idiomas_domina = $("#i_idiomas_domina").val();
        var i_religion = $("#i_religion").val();//********************
        var i_denominacion_religion = $("#i_denominacion_religion").val();
        var i_telefono = $("#i_telefono").val();
        var i_mail = $("#i_mail").val();
        var i_fecha_ingreso_marina = $("#i_fecha_ingreso_marina").val();
        var i_fecha_ultimo_ascenso_grado_actual = $("#i_fecha_ultimo_ascenso_grado_actual").val();
        var i_tipo_vivienda = $("#i_tipo_vivienda").val();//********************
        var i_nro_brevete = $("#i_nro_brevete").val();
        var i_modelo_vehiculo = $("#i_modelo_vehiculo").val();
        var i_placa_nro = $("#i_placa_nro").val();
        var i_nro_lic_arma = $("#i_nro_lic_arma").val();
        var i_modelo_arma = $("#i_modelo_arma").val();
        var i_tipo_arma = $("#i_tipo_arma").val();
        var i_marca_arma = $("#i_marca_arma").val();
        var i_calibre_arma = $("#i_calibre_arma").val();

        var i_condicion_llega = $("#i_condicion_llega").val();//********************

        var i_curso_seguir_dictar = $("#i_curso_seguir_dictar").val();
        var i_dependencia_origen_destaque = $("#i_dependencia_origen_destaque").val();
        var i_nro_carta_referencia = $("#i_nro_carta_referencia").val();
        var i_cargo_ocupaba_dependencia = $("#i_cargo_ocupaba_dependencia").val();

        var i_liper = $("#i_liper").val();//********************
        var i_lisan = $("#i_lisan").val();//********************
        var i_tin = $("#i_tin").val();//********************

        var i_chofer_emergencia = $("#i_chofer_emergencia").val();
        var i_brevete_militar_emergencia = $("#i_brevete_militar_emergencia").val();
        var i_puesto_zafarrancho_emergencia = $("#i_puesto_zafarrancho_emergencia").val();
        var i_emergencia_llamar_a = $("#i_emergencia_llamar_a").val();
        var i_emergencia_parentesco = $("#i_emergencia_parentesco").val();
        var i_emergencia_parentesco_telefono = $("#i_emergencia_parentesco_telefono").val();
        var i_emergencia_parentesco_centro_trabajo = $("#i_emergencia_parentesco_centro_trabajo").val();
        var i_emergencia_parentesco_domicilio = $("#i_emergencia_parentesco_domicilio").val();

        var i_vive_padre = $("#i_vive_padre").val();//********************

        var i_nombre_padre = $("#i_nombre_padre").val();
        var i_ocupacion_padre = $("#i_ocupacion_padre").val();
        var i_domicilio_padre = $("#i_domicilio_padre").val();
        var i_telefono_padre = $("#i_telefono_padre").val();

        var i_vive_madre = $("#i_vive_madre").val();//********************

        var i_nombre_madre = $("#i_nombre_madre").val();
        var i_ocupacion_madre = $("#i_ocupacion_madre").val();
        var i_domicilio_madre = $("#i_domicilio_madre").val();
        var i_telefono_madre = $("#i_telefono_madre").val();

        var i_tipo_compromiso_esposa = $("#i_tipo_compromiso_esposa").val();//********************

        var i_nacionalidad_esposa = $("#i_nacionalidad_esposa").val();

        var i_matrimonio_civil_esposa = $("#i_matrimonio_civil_esposa").val();//********************
        var i_matrimonio_religioso_esposa = $("#i_matrimonio_religioso_esposa").val();//********************

        var i_nombres_apellidos_esposa = $("#i_nombres_apellidos_esposa").val();
        var i_fecha_nacimiento_esposa = $("#i_fecha_nacimiento_esposa").val();
        var i_dpto_esposa = $("#i_dpto_esposa").val();
        var i_centro_labores_esposa = $("#i_centro_labores_esposa").val();
        var i_cargo_grado_profesion_esposa = $("#i_cargo_grado_profesion_esposa").val();
        var i_domicilio_esposa = $("#i_domicilio_esposa").val();
        var i_telefono_esposa = $("#i_telefono_esposa").val();
        //file*********************************************************************************

//******************************************************************************


        if ($.trim(i_grado_categoria) == "0") {
            swal("Atencion", "Debe elegir un grado o categoria valido", "warning");
            $("#i_grado_categoria").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_especialidad) == "0") {
            swal("Atencion", "Debe elegir una especialidad valida", "warning");
            $("#i_especialidad").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_nro_cip) == "") {
            swal("Atencion", "Debe escribir un numero de cip valido", "warning");
            $("#i_nro_cip").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_dni) == "") {
            swal("Atencion", "Debe escribir un numero de dni valido", "warning");
            $("#i_dni").focus();
            mostrar_btn_registrar();
            return false;
        }
        if (i_dni.length != 8) {//47089937
            swal("Atencion", "El numero de dni debe tener 8 digitos", "warning");
            $("#i_dni").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_grupo_sanguineo) == "0") {
            swal("Atencion", "Debe elegir un grupo sanguineo valida", "warning");
            $("#i_grupo_sanguineo").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_apellido_paterno) == "") {
            swal("Atencion", "Debe escribir un apellido paterno valido", "warning");
            $("#i_apellido_paterno").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_apellido_materno) == "") {
            swal("Atencion", "Debe escribir un apellido materno valido", "warning");
            $("#i_apellido_materno").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_nombres) == "") {
            swal("Atencion", "Debe escribir un nombre valido", "warning");
            $("#i_nombres").focus();
            mostrar_btn_registrar();
            return false;
        }

        if ($.trim(i_fecha_nacimiento) == "") {
            swal("Atencion", "Debe elegir una fecha de nacimiento valido", "warning");
            $("#i_fecha_nacimiento").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_distrito_nacimiento) == "0") {
            swal("Atencion", "Debe elegir un distrito valido", "warning");
            $("#i_distrito_nacimiento").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_provincia_nacimiento) == "0") {
            swal("Atencion", "Debe elegir una provincia valido", "warning");
            $("#i_provincia_nacimiento").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_departamento_nacimiento) == "0") {
            swal("Atencion", "Debe elegir un departamento valido", "warning");
            $("#i_departamento_nacimiento").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_grado_instruccion) == "0") {
            swal("Atencion", "Debe elegir un grado de instruccion valido", "warning");
            $("#i_grado_instruccion").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_universidad_instituto) == "") {
            swal("Atencion", "Debe escribir una universidad o instituto valido", "warning");
            $("#i_universidad_instituto").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_universidad_instituto) == "") {
            swal("Atencion", "Debe escribir una universidad o instituto valido", "warning");
            $("#i_universidad_instituto").focus();
            mostrar_btn_registrar();
            return false;
        }

        if ($.trim(i_calle_av_jr_domicilio) == "") {
            swal("Atencion", "Debe escribir una calle o av o jr", "warning");
            $("#i_calle_av_jr_domicilio").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_urbanizacion) == "") {
            swal("Atencion", "Debe escribir una urbanizacion valido", "warning");
            $("#i_urbanizacion").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_distrito_domicilio) == "") {
            swal("Atencion", "Debe escribir un distrito del domicilio valido", "warning");
            $("#i_distrito_domicilio").focus();
            mostrar_btn_registrar();
            return false;
        }

        if ($.trim(i_estado_civil) == "0") {
            swal("Atencion", "Debe elegir un estado civil valido", "warning");
            $("#i_estado_civil").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_idiomas_domina) == "") {
            swal("Atencion", "Debe escribir uno o varios idiomas que domina valido", "warning");
            $("#i_idiomas_domina").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_religion) == "0") {
            swal("Atencion", "Debe elegir una religion valida", "warning");
            $("#i_religion").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_telefono) == "") {
            swal("Atencion", "Debe escribir un telefono valido", "warning");
            $("#i_telefono").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_mail) == "") {
            swal("Atencion", "Debe escribir un mail valido", "warning");
            $("#i_mail").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_mail) != "") {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(i_mail)) {
            } else {
                swal("Atencion", "Debe escribir un mail valido", "warning");
                $("#i_mail").focus();
                mostrar_btn_registrar();
                return false;
            }
        }

        if ($.trim(i_fecha_ingreso_marina) == "") {
            swal("Atencion", "Debe elegir una fecha valida de ingreso a la marina", "warning");
            $("#i_fecha_ingreso_marina").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_fecha_ultimo_ascenso_grado_actual) == "") {
            swal("Atencion", "Debe elegir una fecha valida del ultimo ascenso del grado actual", "warning");
            $("#i_fecha_ingreso_marina").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_tipo_vivienda) == "0") {
            swal("Atencion", "Debe elegir un tipo de vivienda", "warning");
            $("#i_tipo_vivienda").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_nro_brevete) == "") {
            swal("Atencion", "Debe escribir un numero brevete", "warning");
            $("#i_tipo_vivienda").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_modelo_vehiculo) == "") {
            swal("Atencion", "Debe escribir un modelo de vehiculo valido", "warning");
            $("#i_modelo_vehiculo").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_placa_nro) == "") {
            swal("Atencion", "Debe escribir un numero de placa valido", "warning");
            $("#i_placa_nro").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_nro_lic_arma) == "") {
            swal("Atencion", "Debe escribir un numero de licencia de arma valido", "warning");
            $("#i_nro_lic_arma").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_modelo_arma) == "") {
            swal("Atencion", "Debe escribir un modelo de arma valido", "warning");
            $("#i_modelo_arma").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_tipo_arma) == "") {
            swal("Atencion", "Debe escribir un tipo de arma valido", "warning");
            $("#i_tipo_arma").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_marca_arma) == "") {
            swal("Atencion", "Debe escribir un tipo de arma valido", "warning");
            $("#i_tipo_arma").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_calibre_arma) == "") {
            swal("Atencion", "Debe escribir un calibre valido", "warning");
            $("#i_tipo_arma").focus();
            mostrar_btn_registrar();
            return false;
        }

        if ($.trim(i_condicion_llega) == "0") {
            swal("Atencion", "Debe elegir una condicion de llegada valido", "warning");
            $("#i_condicion_llega").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_curso_seguir_dictar) == "") {
            swal("Atencion", "Debe escribir un curso a seguir o dictar valido", "warning");
            $("#i_curso_seguir_dictar").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_dependencia_origen_destaque) == "") {
            swal("Atencion", "Debe escribir una dependencia de origen de destaque valido", "warning");
            $("#i_dependencia_origen_destaque").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_nro_carta_referencia) == "") {
            swal("Atencion", "Debe escribir un numero de carta de referencia valido", "warning");
            $("#i_nro_carta_referencia").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_cargo_ocupaba_dependencia) == "") {
            swal("Atencion", "Debe escribir un cargo que ocupaba valido", "warning");
            $("#i_cargo_ocupaba_dependencia").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_liper) == "0") {
            swal("Atencion", "Debe elegir un liper valido", "warning");
            $("#i_liper").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_lisan) == "0") {
            swal("Atencion", "Debe elegir un lisan valido", "warning");
            $("#i_lisan").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_tin) == "0") {
            swal("Atencion", "Debe elegir un tin valido", "warning");
            $("#i_tin").focus();
            mostrar_btn_registrar();
            return false;
        }

        if ($.trim(i_chofer_emergencia) == "") {
            swal("Atencion", "Debe escribir un chofer valido", "warning");
            $("#i_chofer_emergencia").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_brevete_militar_emergencia) == "") {
            swal("Atencion", "Debe escribir un brevete valido valido", "warning");
            $("#i_brevete_militar_emergencia").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_puesto_zafarrancho_emergencia) == "") {
            swal("Atencion", "Debe escribir un puesto de zafarrancho valido", "warning");
            $("#i_puesto_zafarrancho_emergencia").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_emergencia_llamar_a) == "") {
            swal("Atencion", "Debe escribir un nombre ne caso de emegerncia para ser llamado", "warning");
            $("#i_emergencia_llamar_a").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_emergencia_parentesco) == "") {
            swal("Atencion", "Debe escribir un parentesto valido", "warning");
            $("#i_emergencia_parentesco").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_emergencia_parentesco_telefono) == "") {
            swal("Atencion", "Debe escribir un telefono valido", "warning");
            $("#i_emergencia_parentesco_telefono").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_emergencia_parentesco_centro_trabajo) == "") {
            swal("Atencion", "Debe escribir un centro de trabajo valido", "warning");
            $("#i_emergencia_parentesco_centro_trabajo").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_emergencia_parentesco_domicilio) == "") {
            swal("Atencion", "Debe escribir un domicilio valido", "warning");
            $("#i_emergencia_parentesco_domicilio").focus();
            mostrar_btn_registrar();
            return false;
        }

        if ($.trim(i_vive_padre) == "0") {
            swal("Atencion", "Debe elegir un si el padre vive", "warning");
            $("#i_vive_padre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_nombre_padre) == "") {
            swal("Atencion", "Debe escribir un nombre del padre valido", "warning");
            $("#i_nombre_padre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_ocupacion_padre) == "") {
            swal("Atencion", "Debe escribir una ocupacion del padre valido", "warning");
            $("#i_ocupacion_padre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_domicilio_padre) == "") {
            swal("Atencion", "Debe escribir un domicilio del padre valido", "warning");
            $("#i_domicilio_padre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_telefono_padre) == "") {
            swal("Atencion", "Debe escribir un telefono del padre valido", "warning");
            $("#i_telefono_padre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_vive_madre) == "0") {
            swal("Atencion", "Debe elegir un si la madre vive", "warning");
            $("#i_vive_madre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_nombre_madre) == "") {
            swal("Atencion", "Debe escribir un nombre de la madre valido", "warning");
            $("#i_nombre_madre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_ocupacion_madre) == "") {
            swal("Atencion", "Debe escribir una ocupacion de la madre valido", "warning");
            $("#i_ocupacion_madre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_domicilio_madre) == "") {
            swal("Atencion", "Debe escribir un domicilio de la madre valido", "warning");
            $("#i_domicilio_madre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_telefono_madre) == "") {
            swal("Atencion", "Debe escribir un telefono de la madre valido", "warning");
            $("#i_telefono_madre").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_tipo_compromiso_esposa) == "0") {
            swal("Atencion", "Debe elegir un tipo de compromiso valido", "warning");
            $("#i_tipo_compromiso_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_nacionalidad_esposa) == "") {
            swal("Atencion", "Debe escribir una nacionaldad valida", "warning");
            $("#i_nacionalidad_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_matrimonio_civil_esposa) == "0") {
            swal("Atencion", "Debe elegir si cuenta con matrimonio civil", "warning");
            $("#i_matrimonio_civil_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_matrimonio_religioso_esposa) == "0") {
            swal("Atencion", "Debe elegir si cuenta con matrimonio religioso", "warning");
            $("#i_matrimonio_religioso_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_nombres_apellidos_esposa) == "") {
            swal("Atencion", "Debe escribir los nombres y apellidos validos", "warning");
            $("#i_nombres_apellidos_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_fecha_nacimiento_esposa) == "") {
            swal("Atencion", "Debe elegir una fecha de nacimiento valido", "warning");
            $("#i_fecha_nacimiento_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_dpto_esposa) == "") {
            swal("Atencion", "Debe escribir un dpto. valido", "warning");
            $("#i_dpto_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }

        if ($.trim(i_centro_labores_esposa) == "") {
            swal("Atencion", "Debe escribir un centro de labores valido", "warning");
            $("#i_centro_labores_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_cargo_grado_profesion_esposa) == "") {
            swal("Atencion", "Debe escribir una profesion valida", "warning");
            $("#i_cargo_grado_profesion_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_domicilio_esposa) == "") {
            swal("Atencion", "Debe escribir un domicilio valido", "warning");
            $("#i_domicilio_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }
        if ($.trim(i_telefono_esposa) == "") {
            swal("Atencion", "Debe escribir un telefono valido", "warning");
            $("#i_telefono_esposa").focus();
            mostrar_btn_registrar();
            return false;
        }

        var detalle_tabla = [];
        $("#tbl_lista_agregar .ai_fila").each(function (index, value) {
            var d_cantidad = $(this).find(".d_cantidad").val();
            var d_nombre_apellido = $(this).find(".d_nombre_apellido").val();
            var d_fecha_nacimiento = $(this).find(".d_fecha_nacimiento").val();
            var d_ocupacion = $(this).find(".d_ocupacion").val();
            var d_id = $(this).find(".d_id").val();
            detalle_tabla.push({
                d_cantidad: d_cantidad,
                d_nombre_apellido: d_nombre_apellido,
                d_fecha_nacimiento: d_fecha_nacimiento,
                d_ocupacion: d_ocupacion,
                d_id: d_id
            });
        });
        detalle_tabla = JSON.stringify(detalle_tabla);

        var formData = new FormData();
        formData.append('i_grado_categoria', i_grado_categoria);
        formData.append('i_especialidad', i_especialidad);
        formData.append('i_nro_cip', i_nro_cip);
        formData.append('i_dni', i_dni);
        formData.append('i_grupo_sanguineo', i_grupo_sanguineo);
        formData.append('i_apellido_paterno', i_apellido_paterno);
        formData.append('i_apellido_materno', i_apellido_materno);
        formData.append('i_nombres', i_nombres);
        formData.append("i_file_1", document.getElementById('i_file_1').files[0]);
        formData.append('i_fecha_nacimiento', i_fecha_nacimiento);
        formData.append('i_distrito_nacimiento', i_distrito_nacimiento);
        formData.append('i_provincia_nacimiento', i_provincia_nacimiento);
        formData.append('i_departamento_nacimiento', i_departamento_nacimiento);
        formData.append('i_grado_instruccion', i_grado_instruccion);
        formData.append('i_universidad_instituto', i_universidad_instituto);
        formData.append('i_calle_av_jr_domicilio', i_calle_av_jr_domicilio);
        formData.append('i_urbanizacion', i_urbanizacion);
        formData.append('i_distrito_domicilio', i_distrito_domicilio);
        formData.append("i_file_2", document.getElementById('i_file_2').files[0]);
        formData.append('i_estado_civil', i_estado_civil);
        formData.append('i_idiomas_domina', i_idiomas_domina);
        formData.append('i_religion', i_religion);
        formData.append('i_denominacion_religion', i_denominacion_religion);
        formData.append('i_telefono', i_telefono);
        formData.append('i_mail', i_mail);
        formData.append('i_fecha_ingreso_marina', i_fecha_ingreso_marina);
        formData.append('i_fecha_ultimo_ascenso_grado_actual', i_fecha_ultimo_ascenso_grado_actual);
        formData.append('i_tipo_vivienda', i_tipo_vivienda);
        formData.append('i_nro_brevete', i_nro_brevete);
        formData.append('i_modelo_vehiculo', i_modelo_vehiculo);
        formData.append('i_placa_nro', i_placa_nro);
        formData.append('i_nro_lic_arma', i_nro_lic_arma);
        formData.append('i_modelo_arma', i_modelo_arma);
        formData.append('i_tipo_arma', i_tipo_arma);
        formData.append('i_marca_arma', i_marca_arma);
        formData.append('i_calibre_arma', i_calibre_arma);
        formData.append('i_condicion_llega', i_condicion_llega);
        formData.append('i_curso_seguir_dictar', i_curso_seguir_dictar);
        formData.append('i_dependencia_origen_destaque', i_dependencia_origen_destaque);
        formData.append('i_nro_carta_referencia', i_nro_carta_referencia);
        formData.append('i_cargo_ocupaba_dependencia', i_cargo_ocupaba_dependencia);
        formData.append('i_liper', i_liper);
        formData.append('i_lisan', i_lisan);
        formData.append('i_tin', i_tin);
        formData.append('i_chofer_emergencia', i_chofer_emergencia);
        formData.append('i_brevete_militar_emergencia', i_brevete_militar_emergencia);
        formData.append('i_puesto_zafarrancho_emergencia', i_puesto_zafarrancho_emergencia);
        formData.append('i_emergencia_llamar_a', i_emergencia_llamar_a);
        formData.append('i_emergencia_parentesco', i_emergencia_parentesco);
        formData.append('i_emergencia_parentesco_telefono', i_emergencia_parentesco_telefono);
        formData.append('i_emergencia_parentesco_centro_trabajo', i_emergencia_parentesco_centro_trabajo);
        formData.append('i_emergencia_parentesco_domicilio', i_emergencia_parentesco_domicilio);
        formData.append('i_vive_padre', i_vive_padre);
        formData.append('i_nombre_padre', i_nombre_padre);
        formData.append('i_ocupacion_padre', i_ocupacion_padre);
        formData.append('i_domicilio_padre', i_domicilio_padre);
        formData.append('i_telefono_padre', i_telefono_padre);
        formData.append('i_vive_madre', i_vive_madre);
        formData.append('i_nombre_madre', i_nombre_madre);
        formData.append('i_ocupacion_madre', i_ocupacion_madre);
        formData.append('i_domicilio_madre', i_domicilio_madre);
        formData.append('i_telefono_madre', i_telefono_madre);
        formData.append('i_tipo_compromiso_esposa', i_tipo_compromiso_esposa);
        formData.append('i_nacionalidad_esposa', i_nacionalidad_esposa);
        formData.append('i_matrimonio_civil_esposa', i_matrimonio_civil_esposa);
        formData.append('i_matrimonio_religioso_esposa', i_matrimonio_religioso_esposa);
        formData.append('i_nombres_apellidos_esposa', i_nombres_apellidos_esposa);
        formData.append('i_fecha_nacimiento_esposa', i_fecha_nacimiento_esposa);
        formData.append('i_dpto_esposa', i_dpto_esposa);
        formData.append('i_centro_labores_esposa', i_centro_labores_esposa);
        formData.append('i_cargo_grado_profesion_esposa', i_cargo_grado_profesion_esposa);
        formData.append('i_domicilio_esposa', i_domicilio_esposa);
        formData.append('i_telefono_esposa', i_telefono_esposa);
        formData.append("i_file_3", document.getElementById('i_file_3').files[0]);
        formData.append('detalle_tabla', detalle_tabla);

        //verificar que el usuario sea unico
        $.post("controlador/consultas/verificar_registrar.php", {
            dni: i_dni
        }, function (data) {
            var dato = $.trim(data);
            if (dato == "0") {
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
//                            swal("Felicidades", "Se ha guardado correctamente", "success");

                            swal({
                                title: "Felicidades",
                                text: "Se ha guardado correctamente",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonText: "Ok",
                                closeOnConfirm: false
                            }, function () {

                                location.href = "vista.php";
                                btn_nuevo();

                            });
//                            actualizar_tabla_atras();
//                            $("#modalRegistrar").modal("hide");
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

    $("#i_file_1").val("");
    $(".i_con_carga_foto_1").hide();
    $(".i_sin_carga_foto_1").show();
    $("#i_file_1").on("change", function () {
        var archivos = document.getElementById('i_file_1').files;
        var navegador = window.URL || window.webkitURL;
        for (var x = 0; x < archivos.length; x++) {
            var size = archivos[x].size;
            var type = archivos[x].type;
            var name = archivos[x].name;
            if (size > 1024 * 1024)
            {
                swal("Atencion", "El archivo " + name + " supera el maximo permitido", "warning");
                $("#i_file_1").val("");
                $(".i_con_carga_foto_1").hide();
                $(".i_sin_carga_foto_1").show();
            }
            var array_nombre = name.split(".");
            var tipo_archivo = (array_nombre[array_nombre.length - 1]).toLowerCase();                                                       //'tif', 'tiff', 'bmp'
            if (tipo_archivo == "jpg" || tipo_archivo == "jpeg" || tipo_archivo == "gif" || tipo_archivo == "png" || tipo_archivo == "tif" || tipo_archivo == "tiff" || tipo_archivo == "bmp")
            {
                var objeto_url = navegador.createObjectURL(archivos[0]);
                $("#i_imagen_1").attr("src", objeto_url);
                $(".i_con_carga_foto_1").show();
                $(".i_sin_carga_foto_1").hide();
            } else {
                swal("Atencion", "El archivo " + name + " no es del tipo de archivo permitido (solo imagenes)", "warning");
                $("#i_file_1").val("");
                $(".i_con_carga_foto_1").hide();
                $(".i_sin_carga_foto_1").show();
            }
        }
    });
    $("#i_quitar_imagen_1").click(function () {
        $("#i_file_1").val("");
        $(".i_con_carga_foto_1").hide();
        $(".i_sin_carga_foto_1").show();
    });

    $("#i_file_2").val("");
    $(".i_con_carga_foto_2").hide();
    $(".i_sin_carga_foto_2").show();
    $("#i_file_2").on("change", function () {
        var archivos = document.getElementById('i_file_2').files;
        var navegador = window.URL || window.webkitURL;
        for (var x = 0; x < archivos.length; x++) {
            var size = archivos[x].size;
            var type = archivos[x].type;
            var name = archivos[x].name;
            if (size > 1024 * 1024)
            {
                swal("Atencion", "El archivo " + name + " supera el maximo permitido", "warning");
                $("#i_file_2").val("");
                $(".i_con_carga_foto_2").hide();
                $(".i_sin_carga_foto_2").show();
            }
            var array_nombre = name.split(".");
            var tipo_archivo = (array_nombre[array_nombre.length - 1]).toLowerCase();                                                       //'tif', 'tiff', 'bmp'
            if (tipo_archivo == "jpg" || tipo_archivo == "jpeg" || tipo_archivo == "gif" || tipo_archivo == "png" || tipo_archivo == "tif" || tipo_archivo == "tiff" || tipo_archivo == "bmp")
            {
                var objeto_url = navegador.createObjectURL(archivos[0]);
                $("#i_imagen_2").attr("src", objeto_url);
                $(".i_con_carga_foto_2").show();
                $(".i_sin_carga_foto_2").hide();
            } else {
                swal("Atencion", "El archivo " + name + " no es del tipo de archivo permitido (solo imagenes)", "warning");
                $("#i_file_2").val("");
                $(".i_con_carga_foto_2").hide();
                $(".i_sin_carga_foto_2").show();
            }
        }
    });
    $("#i_quitar_imagen_2").click(function () {
        $("#i_file_2").val("");
        $(".i_con_carga_foto_2").hide();
        $(".i_sin_carga_foto_2").show();
    });

    $(".i_con_carga_foto_3").hide();
    $(".i_sin_carga_foto_3").show();
    $("#i_file_3").on("change", function () {
        var archivos = document.getElementById('i_file_3').files;
        var navegador = window.URL || window.webkitURL;
        for (var x = 0; x < archivos.length; x++) {
            var size = archivos[x].size;
            var type = archivos[x].type;
            var name = archivos[x].name;
            if (size > 1024 * 1024)
            {
                swal("Atencion", "El archivo " + name + " supera el maximo permitido", "warning");
                $("#i_file_3").val("");
                $(".i_con_carga_foto_3").hide();
                $(".i_sin_carga_foto_3").show();
            }
            var array_nombre = name.split(".");
            var tipo_archivo = (array_nombre[array_nombre.length - 1]).toLowerCase();                                                       //'tif', 'tiff', 'bmp'
            if (tipo_archivo == "pdf" || tipo_archivo == "docx")
            {
                var objeto_url = navegador.createObjectURL(archivos[0]);
//                $("#i_imagen_2").attr("src", objeto_url);
                $(".i_con_carga_foto_3").show();
                $(".i_sin_carga_foto_3").hide();
                $("#i_nombre_cv").val(name);
            } else {
                swal("Atencion", "El archivo " + name + " no es del tipo de archivo permitido (.docx , .pdf)", "warning");
                $("#i_file_3").val("");
                $(".i_con_carga_foto_3").hide();
                $(".i_sin_carga_foto_3").show();
            }
        }
    });
    $("#i_quitar_imagen_3").click(function () {
        $("#i_file_3").val("");
        $(".i_con_carga_foto_3").hide();
        $(".i_sin_carga_foto_3").show();
    });

    mostrar_btn_agregar();
    $("#a_btn_agregar").click(function () {
        ocultar_btn_agregar();

        var a_cant = $("#a_cant").val();
        var a_nombre_apellidos = $("#a_nombre_apellidos").val();
        var a_fecha_nacimiento = $("#a_fecha_nacimiento").val();
        var a_ocupacion = $("#a_ocupacion").val();


        if ($.trim(a_cant) == "") {
            swal("Atencion", "Debe agregar una cantidad valida", "warning");
            mostrar_btn_agregar();
            return false;
        }
        if ($.trim(a_nombre_apellidos) == "") {
            swal("Atencion", "Debe agregar un nombre y apellidos validos", "warning");
            mostrar_btn_agregar();
            return false;
        }
        if ($.trim(a_fecha_nacimiento) == "") {
            swal("Atencion", "Debe agregar una fecha valida", "warning");
            mostrar_btn_agregar();
            return false;
        }
        if ($.trim(a_ocupacion) == "") {
            swal("Atencion", "Debe agregar una ocupacion valida", "warning");
            mostrar_btn_agregar();
            return false;
        }

//        var contador = 0;
//        $("#tbl_lista_agregar .ai_fila").each(function (index, value) {
//            var ai_curso = $(this).find(".ai_curso").val();
//            if (ai_curso == id_curso) {
//                contador++;
//            }
//        });
//        if (contador > 0) {
//            swal("Atencion", "El curso elegido ya esta agregado", "warning");
//            mostrar_btn_agregar();
//            return false;
//        }

//        $.post("controlador/consultas/agregar_curso.php", {
//            id_instituto: id_instituto,
//            id_profesion: id_profesion,
//            id_ciclo: id_ciclo,
//            id_curso: id_curso
//        }, function (data) {
//            var dato = $.trim(data);

        var tabla = "<tr class = 'ai_fila'>";
        tabla += "<td class = 'text-center'><span class = 'ai_numero'>1</span></td>";
        tabla += "<td class = 'text-center'><input type='text' class='form-control input-sm d_cantidad' value='" + a_cant + "'/></td>";
        tabla += "<td class = 'text-center'><input type='text' class='form-control input-sm d_nombre_apellido' value='" + a_nombre_apellidos + "'/></td>";
        tabla += "<td class = 'text-center'><input type='text' readonly='readonly' class='form-control input-sm d_fecha_nacimiento' value='" + a_fecha_nacimiento + "'/></td>";
        tabla += "<td class = 'text-center'><input type='text' class='form-control input-sm d_ocupacion' value='" + a_ocupacion + "'/></td>";
        tabla += "<td class = 'text-center'><input type='hidden' class='d_id' value='m'><span class = 'fa fa-remove red_letra manito eliminar'></span></td>";
        tabla += "</tr>";


        var nFilas = $("#tbl_lista_agregar .ai_fila").length;
        if (nFilas == 0) {
            $("#tbl_lista_agregar tbody").html(tabla);
        } else {
            $("#tbl_lista_agregar tbody").append(tabla);
        }

        evento_tabla();
        mostrar_btn_agregar();

        //limpiamos
        $("#a_cant").val("");
        $("#a_nombre_apellidos").val("");
        $("#a_fecha_nacimiento").val("");
        $("#a_ocupacion").val("");
        $("#a_cant").focus();
    });

    $("#i_departamento_nacimiento").change(function () {
        var id_detapartamento = $(this).val();
        if (id_detapartamento == "0") {
            $("#i_provincia_nacimiento").html('<option value="0">::SELECCIONE::</option>');
            $("#i_distrito_nacimiento").html('<option value="0">::SELECCIONE::</option>');
        } else {
            $.post("controlador/consultas/combo_provincia.php", {id_detapartamento: id_detapartamento}, function (data) {
                var dato = $.trim(data);
                $("#i_provincia_nacimiento").html(dato);
            });
        }
    });

    $("#i_provincia_nacimiento").change(function () {
        var id_provincia = $(this).val();
        if (id_provincia == "0") {
            $("#i_distrito_nacimiento").html('<option value="0">::SELECCIONE::</option>');
        } else {
            $.post("controlador/consultas/combo_distrito.php", {id_provincia: id_provincia}, function (data) {
                var dato = $.trim(data);
                $("#i_distrito_nacimiento").html(dato);
            });
        }
    });

    $("#btn_atras").click(function () {
        location.href = "vista.php";
    });
    $("#btn_cancelar").click(function () {
        location.href = "vista.php";
    });

});
function evento_tabla() {

//    $(".d_fecha_nacimiento").unbind();
    $(".d_fecha_nacimiento").datepicker("destroy");
    var anio = 2099;
    $(".d_fecha_nacimiento").datepicker(
            {
//                beforeShow: function (input, inst) {
//                    $(document).off('input');
//                },
//                onClose: function () {
//                    $(document).on('input');
//                },
//                showOptions: {direction: "right"},
//                direction: "both",
//showAnim: "slideDown",
//showOn: "both",
// showOptions: { direction: "both" },
                beforeShow: function (textbox, instance) {
                    var txtBoxOffset = $(this).offset();
                    var top = txtBoxOffset.top;
                    var left = txtBoxOffset.left;
                    var textBoxWidth = $(this).outerWidth();
                    console.log('top: ' + top + 'left: ' + left);
                    setTimeout(function () {
                        instance.dpDiv.css({
//                            top: top - 190, //you can adjust this value accordingly
                            top: top + 30, //you can adjust this value accordingly
//                            left: left + textBoxWidth//show at the end of textBox
                            left: left + 0//show at the end of textBox
                        });
                    }, 0);

                },
                changeMonth: true,
                changeYear: true,
                yearRange: "1900:" + anio,
                dateFormat: 'yy-mm-dd'
            }
    );
    $(".d_cantidad").unbind();
    $(".d_cantidad").numeric();
//    $(".d_fecha").bind("change", function () {
//        var id = $(this).val();
//        var padre = $(this).parents(".ai_fila");
//        if (id == "0") {
//            padre.find(".ai_curso").html("<option value='0'>::SELECCIONE::</option>");
//        } else {
//            $.post("controlador/consultas/combo_curso.php", {id: id}, function (data) {
//                var dato = $.trim(data);
//                padre.find(".ai_curso").html(dato);
//            });
//
//        }
//    });

    evento_contar();
    $(".eliminar").unbind();
    $(".eliminar").bind("click", function () {
        $(this).parents("tr").fadeOut("normal", function () {
            var id_detalle = $(this).find(".d_id").val();
            if (id_detalle != "m") {
                agregar_eliminar(id_detalle);
            }
            $(this).remove();
            evento_contar();

            var nFilas = $("#tbl_lista_agregar .ai_fila").length;
            if (nFilas == 0) {
                $("#tbl_lista_agregar tbody").html("<tr><td class='text-center' colspan='7'>Ningun curso agregado</td></tr>");
            }
        });
    });

}
function evento_contar() {
    var contador = 0;
    $("#tbl_lista_agregar .ai_fila").each(function (index, value) {
        contador++;
        $(this).find(".ai_numero").text(contador);
    });
}
function agregar_eliminar(id) {
    var cadena = "<tr class='e_fila'><td><input class='id_eliminar'  type='hidden' value='" + id + "' /></td></tr>";
    $("#tb_eliminar_detalle tbody").append(cadena);
}

function ocultar_btn_agregar() {
    $("#a_btn_agregar").hide();
    $("#a_span_btn_agregar").show();
}
function mostrar_btn_agregar() {
    $("#a_btn_agregar").show();
    $("#a_span_btn_agregar").hide();
}
