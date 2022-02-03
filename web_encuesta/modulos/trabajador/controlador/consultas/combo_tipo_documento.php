<?php
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/tipo_documento/class_tipo_documento.php';
$clase = new tipo_documento();
$reg = $clase->lista_activo();
echo '<option value="0-0-0">::SELECCIONE::</option>';
for ($i = 0; $i < count($reg); $i++) {
    $id = $reg[$i]['I007ID_TIPO_DOCUMENTO'];
    $numero_digitos = $reg[$i]['I007NUMERO_DIGITOS'];
    $tipo_variable = $reg[$i]['I007TIPO_VARIABLE'];
    $nombre = $reg[$i]['V007NOMBRE'];
    echo "<option value='$id-$numero_digitos-$tipo_variable-$nombre'>$nombre</option>";
}
