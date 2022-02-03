<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/trabajador/class_trabajador.php';
$usuario = $_POST["usuario"];
$numero_documento = $_POST["numero_documento"];
$id_tipo_documento=$_POST["id_tipo_documento"];
$clase = new trabajador();
$reg = $clase->verificar_usuario_registrar($usuario);
$contar_usuario = $reg[0]["contar"];
if ($contar_usuario != 0) {
    echo "El usuario '$usuario' ya existe, ingrese otro usuario";
    return false;
}
$clase_dos = new trabajador();
$reg_dos = $clase_dos->verificar_dni_registrar($id_tipo_documento,$numero_documento);
$contar_dni = $reg_dos[0]["contar"];
if ($contar_dni != 0) {
    echo "El numero de documento '$numero_documento' ya existe, ingrese otro numero de documento";
    return false;
}

echo "0";//ningun problema