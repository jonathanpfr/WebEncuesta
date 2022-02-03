<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/estado_civil/class_estado_civil.php';
//$id_profesion = $_POST["id"];
$clase = new estado_civil();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I009ID_ESTADO_CIVIL'];
    $nombre = $reg[$i]['V009NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
