<?php
@session_start();
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/alumno/class_alumno.php';

$id = $_POST["e_id"];
$clase = new alumno();
$reg = $clase->eliminar($id);
echo $reg[0]["contar"];
