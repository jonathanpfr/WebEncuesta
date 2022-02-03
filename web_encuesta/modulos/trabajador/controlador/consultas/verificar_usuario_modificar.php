<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/trabajador/class_trabajador.php';

//usuario: m_usuario,
//            id: m_id,
//            m_id_usuario:m_id_usuario,
//            m_tipo_documento: m_tipo_documento,
//            m_numero_documento: m_numero_documento
    
$usuario=$_POST["usuario"];
$m_tipo_documento=$_POST["m_tipo_documento"];
$m_numero_documento=$_POST["m_numero_documento"];
$id=$_POST["id"];
$m_id_usuario=$_POST["m_id_usuario"];
$clase = new trabajador();
$reg = $clase->verificar_usuario_modificar($usuario,$m_id_usuario);
$contar_usuario = $reg[0]["contar"];
if ($contar_usuario != 0) {
    echo "El usuario '$usuario' ya existe, ingrese otro usuario";
    return false;
}
$clase_dos = new trabajador();
$reg_dos = $clase_dos->verificar_dni_modificar($m_tipo_documento, $m_numero_documento, $id);
$contar_dni = $reg_dos[0]["contar"];
if ($contar_dni != 0) {
   echo "El numero de documento '$m_numero_documento' ya existe, ingrese otro numero de documento";
    return false;
}

echo "0";//ningun problema