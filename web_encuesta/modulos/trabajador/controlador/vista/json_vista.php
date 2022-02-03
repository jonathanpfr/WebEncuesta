<?php
@session_start();
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/trabajador/class_trabajador.php';

$clase = new trabajador();
$reg = $clase->listar();
if (count($reg) == 0) {
//    I006ID_TRABAJADOR
//V006NOMBRES
//V006APELLIDO_PATERNO
//V006APELLIDO_MATERNO
//V006NUMERO_DOCUMENTO
//V006CORREO
//V006DIRECCION
//V006TELEFONO
//V007NOMBRE
//I005ID_USUARIO
//V005NOMBRE
    $data['data'] = array(
        "V006ID_TRABAJADOR" => "",
        "nombre_completo" => "",
        
        "V006NOMBRES" => "",
        "V006APELLIDO_PATERNO" => "",
        "V006APELLIDO_MATERNO" => "",
        "V007NOMBRE" => "",
        "V006NUMERO_DOCUMENTO" => "",
        "V006CORREO" => "",
        "V006TELEFONO" => "",
        "V005NOMBRE" => "",
        "I005ID_USUARIO" => "",
        "I006ESTADO" => "",
        "V005USUARIO" => ""
    );
} else {
    for ($i = 0; $i < count($reg); $i++) {
        $data['data'] = $reg;
    }
}
echo json_encode($data);
?>