<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/grado_categoria/class_grado_categoria.php';
//$id_profesion = $_POST["id"];
$clase = new grado_categoria();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I001ID_GRADO_CATEGORIA'];
    $nombre = $reg[$i]['V001NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
