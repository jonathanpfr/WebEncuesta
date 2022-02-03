<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/departamento/class_departamento.php';
//$id_profesion = $_POST["id"];
$clase = new departamento();
$reg = $clase->listar_activo();
echo '<option value="0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I004ID_DEPARTAMENTO'];
    $nombre = $reg[$i]['V004NOMBRE'];
    echo "<option value='$id'>$nombre</option>";
}
