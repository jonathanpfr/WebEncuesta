<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/perfil/class_perfil.php';
$clase = new perfil();
$reg = $clase->lista_activo();
echo '<option value="0">::SELECCIONE::</option>';

for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I004ID_PERFIL'];
    $nombre = $reg[$i]['V004NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
