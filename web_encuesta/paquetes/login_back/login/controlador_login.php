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

        $_SESSION['id_perfil'] = $reg[0]['id_perfil'];
        $_SESSION['username'] = $reg[0]['nombre'];
        $_SESSION['id_user'] = $reg[0]['id_usuario'];
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