<?php
@session_start();
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/alumno/class_alumno.php';
$id_user=$_SESSION["id_user"];
$m_cambio_1 = $_POST["m_cambio_1"];
$m_cambio_2 = $_POST["m_cambio_2"];
$m_cambio_3 = $_POST["m_cambio_3"];
$back_imagen_1 = $_POST["back_imagen_1"];
$back_imagen_2 = $_POST["back_imagen_2"];
$back_imagen_3 = $_POST["back_imagen_3"];
$get_id = $_POST["get_id"];

$i_grado_categoria = $_POST["i_grado_categoria"];
$i_especialidad = $_POST["i_especialidad"];
$i_nro_cip = $_POST["i_nro_cip"];
$i_dni = $_POST["i_dni"];
$i_grupo_sanguineo = $_POST["i_grupo_sanguineo"];
$i_apellido_paterno = $_POST["i_apellido_paterno"];
$i_apellido_materno = $_POST["i_apellido_materno"];
$i_nombres = $_POST["i_nombres"];

$nombre_imagen_tiempo_foto = "";
$nombre_imagen_tiempo_croquis = "";
$nombre_imagen_tiempo_curriculum = "";

if ($back_imagen_1 == "") {
    $contador_foto = 0;
    $nombre_imagen_tiempo_foto = "";
    foreach ($_FILES as $index => $file) {
        $nombre_foto = @$_FILES["i_file_1"]['name'];
        if ($nombre_foto != "") {
            $fileName = @$_FILES["i_file_1"]['name'];
            $fileTempName = @$_FILES["i_file_1"]['tmp_name'];

            $contador_foto++;
            if ($contador_foto == 1) {
                $fileTempName = @$_FILES["i_file_1"]['tmp_name'];
                // check if there is an error for particular entry in array
                if (!empty($file['error'][$index])) {
                    return false;
                }
                $nombre_imagen_tiempo_foto = $nombre_nuevo = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '_' . rand(0, 100); //"unicoooooo";//date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
                //el proximo codigo es para ver que extension es la imagen 
                $array_nombre = explode('.', $fileName);
                $cuenta_arr_nombre = count($array_nombre);
                $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
                $nombre_imagen_tiempo_foto = $nombre_imagen_tiempo_foto . "." . $extension;
                //nube

                $direccion = "../../../../paquetes/imagenes/archivos_alumno/";
                //local
                $destino = $direccion . $nombre_imagen_tiempo_foto;
                // check whether file has temporary path and whether it indeed is an uploaded file
                if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
                    if (move_uploaded_file($fileTempName, $destino)) {
                        
                    }
                }
            }
        }
    }
} else {
    if ($m_cambio_1 == 1) {
        //se elimina el back
        @unlink("../../../../paquetes/imagenes/archivos_alumno/" . $back_imagen_1);

        $contador_foto = 0;
        $nombre_imagen_tiempo_foto = "";
        foreach ($_FILES as $index => $file) {
            $nombre_foto = @$_FILES["i_file_1"]['name'];
            if ($nombre_foto != "") {
                $fileName = @$_FILES["i_file_1"]['name'];
                $fileTempName = @$_FILES["i_file_1"]['tmp_name'];

                $contador_foto++;
                if ($contador_foto == 1) {
                    $fileTempName = @$_FILES["i_file_1"]['tmp_name'];
                    // check if there is an error for particular entry in array
                    if (!empty($file['error'][$index])) {
                        return false;
                    }
                    $nombre_imagen_tiempo_foto = $nombre_nuevo = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '_' . rand(0, 100); //"unicoooooo";//date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
                    //el proximo codigo es para ver que extension es la imagen 
                    $array_nombre = explode('.', $fileName);
                    $cuenta_arr_nombre = count($array_nombre);
                    $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
                    $nombre_imagen_tiempo_foto = $nombre_imagen_tiempo_foto . "." . $extension;
                    //nube

                    $direccion = "../../../../paquetes/imagenes/archivos_alumno/";
                    //local
                    $destino = $direccion . $nombre_imagen_tiempo_foto;
                    // check whether file has temporary path and whether it indeed is an uploaded file
                    if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
                        if (move_uploaded_file($fileTempName, $destino)) {
                            
                        }
                    }
                }
            }
        }
    } else {
        //nose hace nada
        $nombre_imagen_tiempo_foto = $back_imagen_1;
    }
}

if ($back_imagen_2 == "") {
    $contador_croquis = 0;
    $nombre_imagen_tiempo_croquis = "";
    foreach ($_FILES as $index => $file) {
        $nombre_croquis = @$_FILES["i_file_2"]['name'];
        if ($nombre_croquis != "") {
            $fileName = @$_FILES["i_file_2"]['name'];
            $fileTempName = @$_FILES["i_file_2"]['tmp_name'];

            $contador_croquis++;
            if ($contador_croquis == 1) {
                $fileTempName = @$_FILES["i_file_2"]['tmp_name'];
                // check if there is an error for particular entry in array
                if (!empty($file['error'][$index])) {
                    return false;
                }
                $nombre_imagen_tiempo_croquis = $nombre_nuevo = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '_' . rand(0, 100); //"unicoooooo";//date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
                //el proximo codigo es para ver que extension es la imagen 
                $array_nombre = explode('.', $fileName);
                $cuenta_arr_nombre = count($array_nombre);
                $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
                $nombre_imagen_tiempo_croquis = $nombre_imagen_tiempo_croquis . "." . $extension;
                //nube

                $direccion = "../../../../paquetes/imagenes/archivos_alumno/";
                //local
                $destino = $direccion . $nombre_imagen_tiempo_croquis;
                // check whether file has temporary path and whether it indeed is an uploaded file
                if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
                    if (move_uploaded_file($fileTempName, $destino)) {
                        
                    }
                }
            }
        }
    }
} else {
    if ($m_cambio_2 == 1) {
        //se elimina el back
        @unlink("../../../../paquetes/imagenes/archivos_alumno/" . $back_imagen_1);

        $contador_croquis = 0;
        $nombre_imagen_tiempo_croquis = "";
        foreach ($_FILES as $index => $file) {
            $nombre_croquis = @$_FILES["i_file_2"]['name'];
            if ($nombre_croquis != "") {
                $fileName = @$_FILES["i_file_2"]['name'];
                $fileTempName = @$_FILES["i_file_2"]['tmp_name'];

                $contador_croquis++;
                if ($contador_croquis == 1) {
                    $fileTempName = @$_FILES["i_file_2"]['tmp_name'];
                    // check if there is an error for particular entry in array
                    if (!empty($file['error'][$index])) {
                        return false;
                    }
                    $nombre_imagen_tiempo_croquis = $nombre_nuevo = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '_' . rand(0, 100); //"unicoooooo";//date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
                    //el proximo codigo es para ver que extension es la imagen 
                    $array_nombre = explode('.', $fileName);
                    $cuenta_arr_nombre = count($array_nombre);
                    $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
                    $nombre_imagen_tiempo_croquis = $nombre_imagen_tiempo_croquis . "." . $extension;
                    //nube

                    $direccion = "../../../../paquetes/imagenes/archivos_alumno/";
                    //local
                    $destino = $direccion . $nombre_imagen_tiempo_croquis;
                    // check whether file has temporary path and whether it indeed is an uploaded file
                    if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
                        if (move_uploaded_file($fileTempName, $destino)) {
                            
                        }
                    }
                }
            }
        }
    } else {
        //nose hace nada
        $nombre_imagen_tiempo_croquis = $back_imagen_2;
    }
}

if ($back_imagen_3 == "") {
    $contador_curriculum = 0;
    $nombre_imagen_tiempo_curriculum = "";
    foreach ($_FILES as $index => $file) {
        $nombre_curriculum = @$_FILES["i_file_3"]['name'];
        if ($nombre_curriculum != "") {
            $fileName = @$_FILES["i_file_3"]['name'];
            $fileTempName = @$_FILES["i_file_3"]['tmp_name'];
            $contador_curriculum++;
            if ($contador_curriculum == 1) {
                $fileTempName = @$_FILES["i_file_3"]['tmp_name'];
                // check if there is an error for particular entry in array
                if (!empty($file['error'][$index])) {
                    return false;
                }
                $nombre_imagen_tiempo_curriculum = $nombre_nuevo = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '_' . rand(0, 100); //"unicoooooo";//date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
                //el proximo codigo es para ver que extension es la imagen 
                $array_nombre = explode('.', $fileName);
                $cuenta_arr_nombre = count($array_nombre);
                $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
                $nombre_imagen_tiempo_curriculum = $nombre_imagen_tiempo_curriculum . "." . $extension;
                //nube

                $direccion = "../../../../paquetes/imagenes/archivos_alumno/";
                //local
                $destino = $direccion . $nombre_imagen_tiempo_curriculum;
                // check whether file has temporary path and whether it indeed is an uploaded file
                if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
                    if (move_uploaded_file($fileTempName, $destino)) {
                        
                    }
                }
            }
        }
    }
} else {
    if ($m_cambio_3 == 1) {
        //se elimina el back
        @unlink("../../../../paquetes/imagenes/archivos_alumno/" . $back_imagen_1);

        $contador_curriculum = 0;
        $nombre_imagen_tiempo_curriculum = "";
        foreach ($_FILES as $index => $file) {
            $nombre_curriculum = @$_FILES["i_file_3"]['name'];
            if ($nombre_curriculum != "") {
                $fileName = @$_FILES["i_file_3"]['name'];
                $fileTempName = @$_FILES["i_file_3"]['tmp_name'];

                $contador_curriculum++;
                if ($contador_curriculum == 1) {
                    $fileTempName = @$_FILES["i_file_3"]['tmp_name'];
                    // check if there is an error for particular entry in array
                    if (!empty($file['error'][$index])) {
                        return false;
                    }
                    $nombre_imagen_tiempo_curriculum = $nombre_nuevo = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '_' . rand(0, 100); //"unicoooooo";//date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
                    //el proximo codigo es para ver que extension es la imagen 
                    $array_nombre = explode('.', $fileName);
                    $cuenta_arr_nombre = count($array_nombre);
                    $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
                    $nombre_imagen_tiempo_curriculum = $nombre_imagen_tiempo_curriculum . "." . $extension;
                    //nube

                    $direccion = "../../../../paquetes/imagenes/archivos_alumno/";
                    //local
                    $destino = $direccion . $nombre_imagen_tiempo_curriculum;
                    // check whether file has temporary path and whether it indeed is an uploaded file
                    if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
                        if (move_uploaded_file($fileTempName, $destino)) {
                            
                        }
                    }
                }
            }
        }
    } else {
        //nose hace nada
        $nombre_imagen_tiempo_curriculum = $back_imagen_3;
    }
}

$i_fecha_nacimiento = $_POST["i_fecha_nacimiento"];
$i_distrito_nacimiento = $_POST["i_distrito_nacimiento"];
$i_provincia_nacimiento = $_POST["i_provincia_nacimiento"];
$i_departamento_nacimiento = $_POST["i_departamento_nacimiento"];
$i_grado_instruccion = $_POST["i_grado_instruccion"];

$i_universidad_instituto = $_POST["i_universidad_instituto"];
$i_calle_av_jr_domicilio = $_POST["i_calle_av_jr_domicilio"];
$i_urbanizacion = $_POST["i_urbanizacion"];
$i_distrito_domicilio = $_POST["i_distrito_domicilio"];
$i_estado_civil = $_POST["i_estado_civil"];
$i_idiomas_domina = $_POST["i_idiomas_domina"];
$i_religion = $_POST["i_religion"];
$i_denominacion_religion = $_POST["i_denominacion_religion"];
$i_telefono = $_POST["i_telefono"];
$i_mail = $_POST["i_mail"];
$i_fecha_ingreso_marina = $_POST["i_fecha_ingreso_marina"];

$i_fecha_ultimo_ascenso_grado_actual = $_POST["i_fecha_ultimo_ascenso_grado_actual"];
$i_tipo_vivienda = $_POST["i_tipo_vivienda"];
$i_nro_brevete = $_POST["i_nro_brevete"];
$i_modelo_vehiculo = $_POST["i_modelo_vehiculo"];
$i_placa_nro = $_POST["i_placa_nro"];
$i_nro_lic_arma = $_POST["i_nro_lic_arma"];
$i_modelo_arma = $_POST["i_modelo_arma"];
$i_tipo_arma = $_POST["i_tipo_arma"];
$i_marca_arma = $_POST["i_marca_arma"];
$i_calibre_arma = $_POST["i_calibre_arma"];
$i_condicion_llega = $_POST["i_condicion_llega"];
$i_curso_seguir_dictar = $_POST["i_curso_seguir_dictar"];
$i_dependencia_origen_destaque = $_POST["i_dependencia_origen_destaque"];
$i_nro_carta_referencia = $_POST["i_nro_carta_referencia"];

$i_cargo_ocupaba_dependencia = $_POST["i_cargo_ocupaba_dependencia"];
$i_liper = $_POST["i_liper"];
$i_lisan = $_POST["i_lisan"];
$i_tin = $_POST["i_tin"];
$profesion_emergencia = $_POST["i_chofer_emergencia"];
$i_brevete_militar_emergencia = $_POST["i_brevete_militar_emergencia"];
$i_puesto_zafarrancho_emergencia = $_POST["i_puesto_zafarrancho_emergencia"];
$i_emergencia_llamar_a = $_POST["i_emergencia_llamar_a"];
$i_emergencia_parentesco = $_POST["i_emergencia_parentesco"];
$i_emergencia_parentesco_telefono = $_POST["i_emergencia_parentesco_telefono"];
$i_emergencia_parentesco_centro_trabajo = $_POST["i_emergencia_parentesco_centro_trabajo"];

$i_emergencia_parentesco_domicilio = $_POST["i_emergencia_parentesco_domicilio"];
$i_vive_padre = $_POST["i_vive_padre"];
$i_nombre_padre = $_POST["i_nombre_padre"];
$i_ocupacion_padre = $_POST["i_ocupacion_padre"];
$i_domicilio_padre = $_POST["i_domicilio_padre"];
$i_telefono_padre = $_POST["i_telefono_padre"];

$i_vive_madre = $_POST["i_vive_madre"];
$i_nombre_madre = $_POST["i_nombre_madre"];
$i_ocupacion_madre = $_POST["i_ocupacion_madre"];
$i_domicilio_madre = $_POST["i_domicilio_madre"];
$i_telefono_madre = $_POST["i_telefono_madre"];

$i_tipo_compromiso_esposa = $_POST["i_tipo_compromiso_esposa"];
$i_nacionalidad_esposa = $_POST["i_nacionalidad_esposa"];
$i_matrimonio_civil_esposa = $_POST["i_matrimonio_civil_esposa"];
$i_matrimonio_religioso_esposa = $_POST["i_matrimonio_religioso_esposa"];
$i_nombres_apellidos_esposa = $_POST["i_nombres_apellidos_esposa"];

$i_fecha_nacimiento_esposa = $_POST["i_fecha_nacimiento_esposa"];
$i_dpto_esposa = $_POST["i_dpto_esposa"];
$i_centro_labores_esposa = $_POST["i_centro_labores_esposa"];
$i_cargo_grado_profesion_esposa = $_POST["i_cargo_grado_profesion_esposa"];
$i_domicilio_esposa = $_POST["i_domicilio_esposa"];
$i_telefono_esposa = $_POST["i_telefono_esposa"];

//**********************************************************************************
$CONTADOR_DETALLE_REGISTRAR = 0;
$TEXT_QUERY_VENTA_REGISTRAR = "";

$CONTADOR_DETALLE_MODIFICAR = 0;
$TEXT_QUERY_VENTA_MODIFICAR = "";

$ID_DETALLE_MODIFICAR = "";
$CANTIDAD_DETALLE_MODIFICAR = "";
$NOMBRE_APELLIDO_DETALLE_MODIFICAR = "";
$FECHA_NACIMIENTO_DETALLE_MODIFICAR = "";
$OCUPACION_ACTUAL_DETALLE_MODIFICAR = "";

$detalle_tabla = $_POST["detalle_tabla"];
if ($detalle_tabla != "[]") {
    $array_cabecera = json_decode($detalle_tabla);
    $array_detalle = array();
    foreach ($array_cabecera as $obj2) {
        $d_cantidad = $obj2->d_cantidad;
        $d_nombre_apellido = $obj2->d_nombre_apellido;
        $d_fecha_nacimiento = $obj2->d_fecha_nacimiento;
        $d_ocupacion = $obj2->d_ocupacion;
        $d_id = $obj2->d_id;
        if ($d_id == "m") {
            $CONTADOR_DETALLE_REGISTRAR++;
            $array_detalle[] = "(null,$d_cantidad," . '"' . $d_nombre_apellido . '"' . "," . '"' . $d_fecha_nacimiento . '"' . ",$get_id," . '"' . $d_ocupacion . '"' . ",1)";
        } else {
            $CONTADOR_DETALLE_MODIFICAR++;
            $ID_DETALLE_MODIFICAR .= "," . $d_id;
            $CANTIDAD_DETALLE_MODIFICAR .= ' WHEN ' . $d_id . ' THEN ' .  $d_cantidad ;
            $NOMBRE_APELLIDO_DETALLE_MODIFICAR .= ' WHEN ' . $d_id . ' THEN ' . '"' . $d_nombre_apellido . '"';
            $FECHA_NACIMIENTO_DETALLE_MODIFICAR .= ' WHEN ' . $d_id . ' THEN ' . '"' . $d_fecha_nacimiento . '"';
            $OCUPACION_ACTUAL_DETALLE_MODIFICAR .= ' WHEN ' . $d_id . ' THEN ' . '"' . $d_ocupacion . '"';
        }
    }
    $TEXT_QUERY_VENTA_REGISTRAR = implode(',', $array_detalle);
    
    $ID_DETALLE_MODIFICAR = substr($ID_DETALLE_MODIFICAR, 1);
    $TEXT_QUERY_VENTA_MODIFICAR = ' I013CANTIDAD = CASE I013ID_HIJOS  ' . $CANTIDAD_DETALLE_MODIFICAR . ' END, 
                                    V013NOMBRE_APELLIDOS = CASE I013ID_HIJOS  ' . $NOMBRE_APELLIDO_DETALLE_MODIFICAR . ' END,
                                    F013FECHA_NACIMIENTO = CASE I013ID_HIJOS  ' . $FECHA_NACIMIENTO_DETALLE_MODIFICAR . ' END,
                                    V013OCUPACION_ACTUAL = CASE I013ID_HIJOS  ' . $OCUPACION_ACTUAL_DETALLE_MODIFICAR . ' END
                         WHERE I013ID_HIJOS IN (' . $ID_DETALLE_MODIFICAR . ');';
}
////////////////////////////////////////////////////////////////////////////////
$ELIMINAR_ID_DETALLE = "";
$ELIMINAR_ESTADO = "";
$CONTADOR_DETALLE_ELIMINAR = 0;
$TEXT_QUERY_VENTA_ELIMINAR = "";

$detalle_tabla_eliminar = $_POST["detalle_tabla_eliminar"];
if ($detalle_tabla_eliminar != "[]") {
    $array_cabecera1 = json_decode($detalle_tabla_eliminar);
    foreach ($array_cabecera1 as $obj2) {
        $id_eliminar = $obj2->id_eliminar;
        $ELIMINAR_ID_DETALLE .= "," . $id_eliminar;
        $ELIMINAR_ESTADO .= ' WHEN ' . $id_eliminar . ' THEN 3 ';
        $CONTADOR_DETALLE_ELIMINAR++;
    }
    $ELIMINAR_ID_DETALLE = substr($ELIMINAR_ID_DETALLE, 1);
    $TEXT_QUERY_VENTA_ELIMINAR = ' I013ESTADO = CASE I013ID_HIJOS  ' . $ELIMINAR_ESTADO . ' END 
                         WHERE I013ID_HIJOS IN (' . $ELIMINAR_ID_DETALLE . ');';
}
//$CONTADOR_DETALLE_ELIMINAR = 0;
//$TEXT_QUERY_VENTA_ELIMINAR = "";
//**********************************************************************************

$clase = new alumno();
$reg = $clase->modificar($get_id, $i_grado_categoria, $i_especialidad, $i_nro_cip, $i_dni, $i_grupo_sanguineo, $i_apellido_paterno, $i_apellido_materno, $i_nombres, $i_fecha_nacimiento, $i_distrito_nacimiento, $i_grado_instruccion, $i_universidad_instituto, $i_calle_av_jr_domicilio, $i_urbanizacion, $i_distrito_domicilio, $i_estado_civil, $i_idiomas_domina, $i_religion, $i_telefono, $i_mail, $i_fecha_ingreso_marina, $i_fecha_ultimo_ascenso_grado_actual, $i_tipo_vivienda, $i_nro_brevete, $i_modelo_vehiculo, $i_placa_nro, $i_nro_lic_arma, $i_modelo_arma, $i_tipo_arma, $i_marca_arma, $i_calibre_arma, $i_condicion_llega, $i_curso_seguir_dictar, $i_dependencia_origen_destaque, $i_nro_carta_referencia, $i_cargo_ocupaba_dependencia, $i_liper, $i_lisan, $i_tin, $profesion_emergencia, $i_brevete_militar_emergencia, $i_puesto_zafarrancho_emergencia, $i_emergencia_llamar_a, $i_emergencia_parentesco, $i_emergencia_parentesco_telefono, $i_emergencia_parentesco_centro_trabajo, $i_emergencia_parentesco_domicilio, $i_vive_padre, $i_nombre_padre, $i_ocupacion_padre, $i_domicilio_padre, $i_telefono_padre, $i_vive_madre, $i_nombre_madre, $i_ocupacion_madre, $i_domicilio_madre, $i_telefono_madre, $i_tipo_compromiso_esposa, $i_nacionalidad_esposa, $i_matrimonio_civil_esposa, $i_matrimonio_religioso_esposa, $i_nombres_apellidos_esposa, $i_fecha_nacimiento_esposa, $i_dpto_esposa, $i_centro_labores_esposa, $i_cargo_grado_profesion_esposa, $i_domicilio_esposa, $i_telefono_esposa, $nombre_imagen_tiempo_foto, $nombre_imagen_tiempo_croquis, $nombre_imagen_tiempo_curriculum, $CONTADOR_DETALLE_REGISTRAR, $TEXT_QUERY_VENTA_REGISTRAR, $CONTADOR_DETALLE_MODIFICAR, $TEXT_QUERY_VENTA_MODIFICAR, $CONTADOR_DETALLE_ELIMINAR, $TEXT_QUERY_VENTA_ELIMINAR,$id_user);
echo $reg[0]["contar"];
