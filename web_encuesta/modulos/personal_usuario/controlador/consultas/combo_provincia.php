<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/provincia/class_provincia.php';
$id_departamento = $_POST["id_detapartamento"];
$clase = new provincia();
$reg = $clase->listar_activo($id_departamento);
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I005ID_PROVINCIA'];
    $nombre = $reg[$i]['V005NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
