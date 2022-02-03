<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/alumno/class_alumno.php';
$get_id = $_POST["get_id"];
$dni = $_POST["dni"];
$clase = new alumno();
$reg = $clase->verificar_modificar($dni, $get_id);
$contar_usuario = $reg[0]["contar"];
if ($contar_usuario != 0) {
    echo "El dni '$dni' ya existe, ingrese otro dni";
    return false;
}
//$clase_dos = new profesor();
//$reg_dos = $clase_dos->verificar_dni_registrar($dni);
//$contar_dni = $reg_dos[0]["contar"];
//if ($contar_dni != 0) {
//    echo "El dni '$dni' ya existe, ingrese otro dni";
//    return false;
//}

echo "0"; //ningun problema