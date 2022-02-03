<?php
@session_start();
require_once '../../../clases/conexion.php';
require_once '../../../clases/usuario/class_usuario.php';
$id_user=$_SESSION["id_user"];
$i_clave=$_POST["i_clave"];

$clase=new usuario();
$reg=$clase->cambiar_clave_primera($id_user, $i_clave);
echo $reg[0]["contar"];