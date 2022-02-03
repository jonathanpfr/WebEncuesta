<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/compromiso_esposa/class_compromiso_esposa.php';
//$id_profesion = $_POST["id"];
$clase = new compromiso_esposa();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I014ID_TIPO_COMPROMISO'];
    $nombre = $reg[$i]['V014NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
