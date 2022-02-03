<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/grado_instruccion/class_grado_instruccion.php';
//$id_profesion = $_POST["id"];
$clase = new grado_instruccion();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I007ID_GRADO_INSTRUCCION'];
    $nombre = $reg[$i]['V007NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
