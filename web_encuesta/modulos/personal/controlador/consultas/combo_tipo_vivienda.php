<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/tipo_vivienda/class_tipo_vivienda.php';
//$id_profesion = $_POST["id"];
$clase = new tipo_vivienda();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I011ID_TIPO_VIVIENDA'];
    $nombre = $reg[$i]['V011NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
