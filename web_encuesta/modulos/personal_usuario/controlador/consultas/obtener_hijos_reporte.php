<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/alumno/class_alumno.php';
$id = $_POST["id"];
$tabla = "";
$clase = new alumno();
$reg = $clase->seleccion_hijos($id);
for ($i = 0; $i < count($reg); $i++) {
    $id_hijo = $reg[$i]["I013ID_HIJOS"];
    $cantidad = $reg[$i]["I013CANTIDAD"];
    $nombre_apellido = $reg[$i]["V013NOMBRE_APELLIDOS"];
    $fecha_nacimiento = $reg[$i]["F013FECHA_NACIMIENTO"];
    $ocupacion = $reg[$i]["V013OCUPACION_ACTUAL"];

    $tabla .= "<tr class = 'ai_fila'>";
    $tabla .= "<td class = 'text-center'><span class = 'ai_numero'>" . ($i + 1) . "</span></td>";
    $tabla .= "<td class = 'text-center'>$cantidad</td>";
    $tabla .= "<td class = 'text-center'>$nombre_apellido</td>";
    $tabla .= "<td class = 'text-center'>$fecha_nacimiento</td>";
    $tabla .= "<td class = 'text-center'>$ocupacion</td>";
//    $tabla .= "<td class = 'text-center'><input type='hidden' class='d_id' value='$id_hijo'><span class = 'fa fa-remove red_letra manito eliminar'></span></td>";
    $tabla .= "</tr>";
}
echo $tabla;
