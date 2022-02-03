<?php
//require_once '../../../clases/conexion.php';
//require_once '../../../clases/producto/class_producto.php';
//$fec_fin = $_POST["fecha"];
//$clase = new producto();
//$reg = $clase->lista_kardex();
//$concatenados = "";
//$contador = 0;
//for ($i = 0; $i < count($reg); $i++) {
//    $id_producto_detalle_producto = $reg[$i]["ID_PRODUCTO_DETALLE"];
//    $codigo_producto = $reg[$i]["codigo_producto"];
//    $nombre_producto = $reg[$i]["nombre_producto"];
//    $stock_minimo = $reg[$i]["STOCK_MINIMO"];
//    $nombre_talla = $reg[$i]["NOMBRE_TALLA"];
//    $clase_dos = new producto();
//    $regi = $clase_dos->stock_disponible($id_producto_detalle_producto, $fec_fin);
//    $disponible = $regi[0]["stock_actual"];
//    if ($disponible == "" || $disponible == null) {
//        $disponible = 0;
//    }
//    $nombre_producto = strtoupper(($nombre_producto)) . " Talla : " . strtoupper(utf8_decode($nombre_talla));
//
//    if ($disponible < $stock_minimo) {
//        $contador++;
//        $concatenados = $concatenados . " <span style='color:red'>($contador)</span> El producto con codigo ($codigo_producto) " . $nombre_producto . " solo tiene  <span style='color:red'>" . $disponible . "</span> unidades, cantidad sugerida <span style='color:green'>($stock_minimo)</span>.<br><br>";
//    }
//}
//echo $concatenados;
