<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/especialidad/class_especialidad.php';
//$id_profesion = $_POST["id"];
$clase = new especialidad();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I002ID_ESPECIALIDAD'];
    $nombre = $reg[$i]['V002NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
