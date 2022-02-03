<?php
@session_start();
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/alumno/class_alumno.php';
//require_once '../../../../paquetes/imagenes/archivos_alumno/';
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
$contador_foto = 0;
$contador_croquis = 0;
$contador_curriculum = 0;
$id_user=$_SESSION["id_user"];
  

foreach ($_FILES as $index => $file) {
    //Validamos que el archivo exista
    $nombre_foto = @$_FILES["i_file_1"]['name'];
//    $fileName = @$file['name'];
////    // for easy access
//    $fileTempName = @$file['tmp_name'];
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
//    if ($_FILES["i_file_3"]["name"][$key]) {
//        $filename = $_FILES["i_file_3"]["name"][$key];
//    }
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
            $array_detalle[] = "(null,$d_cantidad," . '"' . $d_nombre_apellido . '"' . "," . '"' . $d_fecha_nacimiento . '"' . ",@id_alumno," . '"' . $d_ocupacion . '"' . ",1)";
        } else {
            
        }
    }
    $TEXT_QUERY_VENTA_REGISTRAR = implode(',', $array_detalle);
}
//**********************************************************************************
//nombre_imagen_tiempo_foto:1537197884_89_51_12.png,nombre_imagen_tiempo_croquis:1537197884_19_39_5.docx,nombre_imagen_tiempo_curriculum:
//nombre_imagen_tiempo_foto:,nombre_imagen_tiempo_croquis:1537199434_45_40_7.png,nombre_imagen_tiempo_curriculum:1537199434_4_56_3.png    
//nombre_imagen_tiempo_foto:,nombre_imagen_tiempo_croquis:1537199652_41_47_73.png,nombre_imagen_tiempo_curriculum:1537199652_12_94_27.docx
//echo "nombre_imagen_tiempo_foto:" . $nombre_imagen_tiempo_foto . ",nombre_imagen_tiempo_croquis:" . $nombre_imagen_tiempo_croquis . ",nombre_imagen_tiempo_curriculum:" . $nombre_imagen_tiempo_curriculum;
$clase = new alumno();
$reg = $clase->registrar($i_grado_categoria, $i_especialidad, $i_nro_cip, $i_dni, $i_grupo_sanguineo,
        $i_apellido_paterno,$i_apellido_materno, $i_nombres, $i_fecha_nacimiento, $i_distrito_nacimiento,
        $i_grado_instruccion, $i_universidad_instituto,$i_calle_av_jr_domicilio, $i_urbanizacion, $i_distrito_domicilio,
        $i_estado_civil, $i_idiomas_domina, $i_religion, $i_telefono, $i_mail,
        $i_fecha_ingreso_marina, $i_fecha_ultimo_ascenso_grado_actual, $i_tipo_vivienda, $i_nro_brevete,$i_modelo_vehiculo,
        $i_placa_nro, $i_nro_lic_arma, $i_modelo_arma, $i_tipo_arma, $i_marca_arma,
        $i_calibre_arma,$i_condicion_llega, $i_curso_seguir_dictar, $i_dependencia_origen_destaque, $i_nro_carta_referencia,
        $i_cargo_ocupaba_dependencia, $i_liper, $i_lisan, $i_tin, $profesion_emergencia,
        $i_brevete_militar_emergencia,$i_puesto_zafarrancho_emergencia, $i_emergencia_llamar_a, $i_emergencia_parentesco, $i_emergencia_parentesco_telefono,
        $i_emergencia_parentesco_centro_trabajo, $i_emergencia_parentesco_domicilio, $i_vive_padre, $i_nombre_padre,$i_ocupacion_padre,
        $i_domicilio_padre, $i_telefono_padre, $i_vive_madre, $i_nombre_madre, $i_ocupacion_madre,
        $i_domicilio_madre, $i_telefono_madre, $i_tipo_compromiso_esposa, $i_nacionalidad_esposa, $i_matrimonio_civil_esposa,
        $i_matrimonio_religioso_esposa, $i_nombres_apellidos_esposa, $i_fecha_nacimiento_esposa, $i_dpto_esposa,$i_centro_labores_esposa,
        $i_cargo_grado_profesion_esposa, $i_domicilio_esposa, $i_telefono_esposa,$nombre_imagen_tiempo_foto, $nombre_imagen_tiempo_croquis,
        $nombre_imagen_tiempo_curriculum, $CONTADOR_DETALLE_REGISTRAR,$TEXT_QUERY_VENTA_REGISTRAR,$id_user);
echo $reg[0]["contar"];
