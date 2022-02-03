<?php

class alumno {

    private $array;

    public function __construct() {
        $this->array = array();
    }
   public function seleccion_hijos($id) {
        $sql = "call sp_tb013_hijos_seleccion($id);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }
    public function verificar_registrar($dni) {
        $sql = "call sp_tb010_alumno_verificar_registrar('$dni');";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function verificar_modificar($dni, $id) {
        $sql = "call sp_tb010_alumno_verificar_modificar('$dni',$id);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function listar() {
        $sql = "call sp_tb010_alumno_listar();";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function seleccion($id) {
        $sql = "call sp_tb010_alumno_seleccion($id);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function registrar($id_grado_categoria_,$id_especialidad_,$nro_cip_,$dni_,$id_grupo_sanguineo_,
$apellido_paterno_,$apellido_materno_,$nombres_,$fecha_nacimiento_,$id_distrito_,$id_grado_instruccion_,$universidad_,$calle_jrn_,
$urbanizacion_,$distrito_,$id_estado_civil_,$idiomas_domina_,$id_religion_,$telefono_,$mail_,$fecha_ingreso_marina_,$fecha_ascenso_grado_,
$id_tipo_vivienda_,$nro_brevete_,$modelo_vehiculo_,$placa_nro_,$nro_lic_arma_,$modelo_arma_,$tipo_arma_,$marca_arma_,$calibre_arma_,
$id_tipo_condicion_llega_,$curso_seguir_dictar_,$dependencia_origen_,$nro_carta_referencia_,$cargo_ocupa_,$id_liper_,$id_lisan_,$id_tin_,
$profesion_emergencia_,$brevete_militar_emergencia_,$puesto_zafarrancho_,$emegergencia_llamar_,$emergencia_parentesco_,
$emergencia_telefono_,$emergencia_centro_trabajo_,$emergencia_domicilio_,
$id_padre_vive_,$nombre_padre_,$ocupacion_padre_,$domicilio_padre_,$telefono_padre_,
$id_madre_vive_,$nombre_madre_,$ocupacion_madre_,$domicilio_madre_,$telefono_madre_,
$id_tipo_compromiso_,$nacionalidad_compromiso_,
$id_matrimonio_civil_,$id_matrimonio_religioso_,
$nombre_apellidos_esposa_,$fecha_nacimiento_esposa_,$dpto_esposa_,$centro_labores_esposa_,$cargo_grado_esposa_,$domicilio_esposa_,$telefono_esposa_,
$foto_,$croquis_,$curriculum_,$contador_query_,$query_registrar,$id_user) {
        
        $sql = "call sp_tb010_alumno_registrar
($id_grado_categoria_,$id_especialidad_,'$nro_cip_','$dni_',$id_grupo_sanguineo_,
'$apellido_paterno_','$apellido_materno_','$nombres_','$fecha_nacimiento_',$id_distrito_,$id_grado_instruccion_,'$universidad_','$calle_jrn_',
'$urbanizacion_','$distrito_',$id_estado_civil_,'$idiomas_domina_',$id_religion_,'$telefono_','$mail_','$fecha_ingreso_marina_','$fecha_ascenso_grado_',
$id_tipo_vivienda_,'$nro_brevete_','$modelo_vehiculo_','$placa_nro_','$nro_lic_arma_','$modelo_arma_','$tipo_arma_','$marca_arma_','$calibre_arma_',
$id_tipo_condicion_llega_,'$curso_seguir_dictar_','$dependencia_origen_','$nro_carta_referencia_','$cargo_ocupa_',$id_liper_,$id_lisan_,$id_tin_,
'$profesion_emergencia_','$brevete_militar_emergencia_','$puesto_zafarrancho_','$emegergencia_llamar_','$emergencia_parentesco_',
'$emergencia_telefono_','$emergencia_centro_trabajo_','$emergencia_domicilio_',
$id_padre_vive_,'$nombre_padre_','$ocupacion_padre_','$domicilio_padre_','$telefono_padre_',
$id_madre_vive_,'$nombre_madre_','$ocupacion_madre_','$domicilio_madre_','$telefono_madre_',
$id_tipo_compromiso_,'$nacionalidad_compromiso_',
$id_matrimonio_civil_,$id_matrimonio_religioso_,
'$nombre_apellidos_esposa_','$fecha_nacimiento_esposa_','$dpto_esposa_','$centro_labores_esposa_','$cargo_grado_esposa_','$domicilio_esposa_','$telefono_esposa_',
'$foto_','$croquis_','$curriculum_',$contador_query_,'$query_registrar',$id_user);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

     public function modificar($id,$id_grado_categoria_,$id_especialidad_,$nro_cip_,$dni_,$id_grupo_sanguineo_,
$apellido_paterno_,$apellido_materno_,$nombres_,$fecha_nacimiento_,$id_distrito_,$id_grado_instruccion_,$universidad_,$calle_jrn_,
$urbanizacion_,$distrito_,$id_estado_civil_,$idiomas_domina_,$id_religion_,$telefono_,$mail_,$fecha_ingreso_marina_,$fecha_ascenso_grado_,
$id_tipo_vivienda_,$nro_brevete_,$modelo_vehiculo_,$placa_nro_,$nro_lic_arma_,$modelo_arma_,$tipo_arma_,$marca_arma_,$calibre_arma_,
$id_tipo_condicion_llega_,$curso_seguir_dictar_,$dependencia_origen_,$nro_carta_referencia_,$cargo_ocupa_,$id_liper_,$id_lisan_,$id_tin_,
$profesion_emergencia_,$brevete_militar_emergencia_,$puesto_zafarrancho_,$emegergencia_llamar_,$emergencia_parentesco_,
$emergencia_telefono_,$emergencia_centro_trabajo_,$emergencia_domicilio_,
$id_padre_vive_,$nombre_padre_,$ocupacion_padre_,$domicilio_padre_,$telefono_padre_,
$id_madre_vive_,$nombre_madre_,$ocupacion_madre_,$domicilio_madre_,$telefono_madre_,
$id_tipo_compromiso_,$nacionalidad_compromiso_,
$id_matrimonio_civil_,$id_matrimonio_religioso_,
$nombre_apellidos_esposa_,$fecha_nacimiento_esposa_,$dpto_esposa_,$centro_labores_esposa_,$cargo_grado_esposa_,$domicilio_esposa_,$telefono_esposa_,
$foto_,$croquis_,$curriculum_,$contador_query_registrar,$query_registrar,$contador_query_modificar,$query_modificar,$contador_query_eliminar,$query_eliminar,$id_user) {
        
        $sql = "call sp_tb010_alumno_modificar
($id,$id_grado_categoria_,$id_especialidad_,'$nro_cip_','$dni_',$id_grupo_sanguineo_,
'$apellido_paterno_','$apellido_materno_','$nombres_','$fecha_nacimiento_',$id_distrito_,$id_grado_instruccion_,'$universidad_','$calle_jrn_',
'$urbanizacion_','$distrito_',$id_estado_civil_,'$idiomas_domina_',$id_religion_,'$telefono_','$mail_','$fecha_ingreso_marina_','$fecha_ascenso_grado_',
$id_tipo_vivienda_,'$nro_brevete_','$modelo_vehiculo_','$placa_nro_','$nro_lic_arma_','$modelo_arma_','$tipo_arma_','$marca_arma_','$calibre_arma_',
$id_tipo_condicion_llega_,'$curso_seguir_dictar_','$dependencia_origen_','$nro_carta_referencia_','$cargo_ocupa_',$id_liper_,$id_lisan_,$id_tin_,
'$profesion_emergencia_','$brevete_militar_emergencia_','$puesto_zafarrancho_','$emegergencia_llamar_','$emergencia_parentesco_',
'$emergencia_telefono_','$emergencia_centro_trabajo_','$emergencia_domicilio_',
$id_padre_vive_,'$nombre_padre_','$ocupacion_padre_','$domicilio_padre_','$telefono_padre_',
$id_madre_vive_,'$nombre_madre_','$ocupacion_madre_','$domicilio_madre_','$telefono_madre_',
$id_tipo_compromiso_,'$nacionalidad_compromiso_',
$id_matrimonio_civil_,$id_matrimonio_religioso_,
'$nombre_apellidos_esposa_','$fecha_nacimiento_esposa_','$dpto_esposa_','$centro_labores_esposa_','$cargo_grado_esposa_','$domicilio_esposa_','$telefono_esposa_',
'$foto_','$croquis_','$curriculum_',$contador_query_registrar,'$query_registrar',$contador_query_modificar,'$query_modificar',$contador_query_eliminar,'$query_eliminar',$id_user);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function eliminar($id) {
        $sql = "call sp_tb010_alumno_eliminar($id);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

}

?>