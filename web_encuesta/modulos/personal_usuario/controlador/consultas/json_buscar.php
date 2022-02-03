<?php
require_once '../../../../clases/alumno/class_alumno.php';
require_once '../../../../clases/conexion.php';
$id=$_POST["id"];
$clase=new alumno();
$reg=$clase->seleccion($id);
for ($i = 0; $i < count($reg); $i++) {
    $datos[] = $reg[$i];
}
echo json_encode($datos);