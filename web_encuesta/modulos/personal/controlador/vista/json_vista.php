<?php
@session_start();
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/alumno/class_alumno.php';
//$id_instituto=$_POST["id_instituto"];
$clase = new alumno();
$reg = $clase->listar();
if (count($reg) == 0) {
    $data['data'] = array(
        "I010ID_ALUMNO" => "",
        "nombre_apellidos" => "",
        "V010DNI" => "",
        "V001NOMBRE" => "",
        "V002NOMBRE" => "",
        "I010ESTADO" => ""
    );
} else {
    for ($i = 0; $i < count($reg); $i++) {
        $data['data'] = $reg;
    }
}
echo json_encode($data);
?>