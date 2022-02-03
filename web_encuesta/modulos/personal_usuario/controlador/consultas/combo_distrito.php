<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/distrito/class_distrito.php';
$id_provincia = $_POST["id_provincia"];
$clase = new distrito();
$reg = $clase->listar_activo($id_provincia);
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I006ID_DISTRITO'];
    $nombre = $reg[$i]['V006NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
