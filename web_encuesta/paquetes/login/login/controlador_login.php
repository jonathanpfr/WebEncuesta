<?php
@session_start();
@session_destroy();
@session_start();
require_once '../../../clases/conexion.php';
require_once '../../../clases/usuario/class_usuario.php';

$usuario = get_valor($_POST['login_username']);
$password = get_valor($_POST['login_userpass']);
//echo $_POST['login_username']."->";
//echo $usuario;
//echo $usuario." ->".$_POST['login_username'];
if (!isset($_SESSION['username']) && !isset($_SESSION['id_user'])) {
    $_SESSION['usuario'] = $usuario;
    $clase = new usuario();
    $reg = $clase->login($usuario, $password);
    if (count($reg) == 1) {

//        tb005.I005ID_USUARIO,tb006.V006NOMBRES,tb004.V004NOMBRE,tb004.I004ID_PERFIL
                
        $_SESSION['id_perfil'] = $reg[0]['I004ID_PERFIL'];
        $_SESSION['nombre_perfil'] = $reg[0]['V004NOMBRE'];
        $_SESSION['username'] = $reg[0]['V006NOMBRES'];
        $_SESSION['id_user'] = $reg[0]['I005ID_USUARIO'];
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo "0";
}

function securitymax($valores) {
    $_Cadena = htmlspecialchars(trim(addslashes(stripslashes(strip_tags($valores)))));
    $_Cadena = str_replace(chr(160), "", $valores);
    return mysql_real_escape_string($valores);
}

function get_valor($minurl) {
    $minurla = str_replace("'", "", $minurl);
    $minurlb = str_replace(";", "", $minurla);
    $minurlokc = str_replace("\"", "", $minurlb);
//    $minurlok = securitymax($minurlokc);
    return $minurlokc;
}

//echo $minurlok;
?>