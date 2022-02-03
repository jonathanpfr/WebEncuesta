<?php
//@session_start();
//require_once '../../../clases/conexion.php';
//require_once '../../../clases/pedido/class_pedido.php';
//require_once '../../../clases/usuario/class_usuario.php';
//@$id_user=$_SESSION['id_user'];
//$clase=new usuario();
//@$reg=$clase->buscar_usuario($id_user);
//@$nombre=$reg[0]["NOMBRES"];
//@$foto=$reg[0]["FOTO"];
//@$cargo=$reg[0]["nombre_cargo"];
//@$id_cargo=$reg[0]["ID_CARGO"];
//
//if($id_cargo==6||$id_cargo==3){//admin o jefe almacenero
//    $ID_ENCARGADO="";
//}else{
//   $ID_ENCARGADO= @$id_user;
//}
//
//$fecha = $_POST["fecha"];
//$clase = new pedido();
//$reg = $clase->alerta_pedido($fecha, $ID_ENCARGADO);
////$concatenados = "";
//$contador = 0;
//$alerta="";
//for ($i = 0; $i < count($reg); $i++) {
//    $CODIGO = $reg[$i]["CODIGO"];
//    $ESTADO = $reg[$i]["ESTADO"];
//    $restar_fecha = $reg[$i]["restar_fecha"];
//    
//    $tiempo="";
//    if($restar_fecha<0){
//        $tiempo="vencio hace ". abs($restar_fecha)." dias";
//        $color="red";
//    }else if ($restar_fecha==0){
//        $tiempo="vence hoy ";
//        $color="orange";
//    }else if($restar_fecha>0){
//        $tiempo="vencera dentro de ". abs($restar_fecha)." dias";
//        $color="green";
//    }
//    //4=pendiente,5=completo,6=incompleto,7=anulado,11=atendido,12=atendido fuera de tiempo, 14=incompleto fuera de tiempo
//    if($ESTADO==4){
//        $ESTADO="Pendiente";
//        
//    }else if($ESTADO==6){
//        $ESTADO="Incompleto";
//    }else if($ESTADO==15){
//        $ESTADO="Incompleto fuera de tiempo";
//    }
//    
//    if($restar_fecha<=5){
//        $contador++;
//        $alerta.="($contador) El pedido con codigo : $CODIGO <span style='color:$color'>$tiempo</span> y esta con Estado $ESTADO <br><br>";
//    }
//    
//   
//}
//echo $alerta;
