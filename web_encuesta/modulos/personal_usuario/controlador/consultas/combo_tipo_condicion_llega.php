<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/condicion_llega/class_condicion_llega.php';
//$id_profesion = $_POST["id"];
$clase = new condicion_llega();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I012ID_TIPO_CONDICION_LLEGA'];
    $nombre = $reg[$i]['V012NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
