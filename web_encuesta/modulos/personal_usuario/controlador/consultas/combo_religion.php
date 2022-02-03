<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/religion/class_religion.php';
//$id_profesion = $_POST["id"];
$clase = new religion();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I008ID_RELIGION'];
    $nombre = $reg[$i]['V008NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
