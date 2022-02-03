<?php
@session_start();
require_once '../../../clases/conexion.php';
require_once '../../../clases/trabajador/class_trabajador.php';
@$id_user=$_SESSION['id_user'];
$clase=new trabajador();
@$reg=$clase->seleccion_perfil($id_user);
@$nombre=$reg[0]["V006NOMBRES"];
@$foto=$reg[0]["T005IMAGEN"];
@$cargo=$reg[0]["V004NOMBRE"];
@$id_cargo=$reg[0]["I004ID_PERFIL"];
@$cambio=$reg[0]["I005CAMBIO"];
//$clase_dos=new usuario();
//$rega=$clase_dos->buscar_cargo_persona($id_persona);
////c_doctor,c_admin,c_enfer
//$cargo="";
//$c_doctor=$rega[0]["c_doctor"];if($c_doctor!=0){$cargo="DOCTOR";}
//$c_admin=$rega[0]["c_admin"];if($c_admin!=0){$cargo="ADMINISTRACION";}
//$c_enfer=$rega[0]["c_enfer"];if($c_enfer!=0){$cargo="ENFERMERA";}
////verificar si es admin, doctor,enfermera

echo @'[{"nombre":"'.$nombre.'","foto":"'.$foto.'","cargo":"'.$cargo.'","id_cargo":"'.$id_cargo.'","cambio":"'.$cambio.'"}]';