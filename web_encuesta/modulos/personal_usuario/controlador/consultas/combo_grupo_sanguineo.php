<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/grupo_sanguineo/class_grupo_sanguineo.php';
//$id_profesion = $_POST["id"];
$clase = new grupo_sanguineo();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I003ID_GRUPO_SANGUINEO'];
    $nombre = $reg[$i]['V003NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
