<?php
class Conectar {
    public static function con() {
	$bd = "bd_proyecto_encuesta_personal";
        $user = "root";
        $pass = "";
        $servidor="localhost";
        try {
            $conn = new PDO("mysql:host=$servidor;dbname=$bd;charset=UTF8", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die(print_r($e->getMessage()));
        }
        return $conn;
    }
}
//class Conectar {
//    public static function con() {
//	$bd = "pda2018_personal";
//        $user = "pda2018_usuario";
//        $pass = "pda2018_usuario";
//        $servidor="localhost";
//        try {
//            $conn = new PDO("mysql:host=$servidor;dbname=$bd;charset=UTF8", $user, $pass);
//            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        } catch (Exception $e) {
//            die(print_r($e->getMessage()));
//        }
//        return $conn;
//    }
//}
?>

