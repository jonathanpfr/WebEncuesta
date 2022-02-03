<?php
require_once '../../../../clases/trabajador/class_trabajador.php';
require_once '../../../../clases/conexion.php';
$id=$_POST["id"];
$clase=new trabajador();
$reg=$clase->seleccion($id);
for ($i = 0; $i < count($reg); $i++) {
    $datos[] = $reg[$i];
}
echo json_encode($datos);