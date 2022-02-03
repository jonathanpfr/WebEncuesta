<?php
@session_start();
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/trabajador/class_trabajador.php';

$id = $_POST["e_id"];
$clase = new trabajador();
$reg = $clase->eliminar($id);
echo $reg[0]["contar"];
