<?php
@session_start();
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/trabajador/class_trabajador.php';



$m_id = $_POST["m_id"];
$m_id_usuario = $_POST["m_id_usuario"];
$nombre = $_POST["m_nombre"];
$apellido_p = $_POST["m_apellido_p"];
$apellido_m = $_POST["m_apellido_m"];
$m_tipo_documento = $_POST["m_tipo_documento"];
$m_numero_documento = $_POST["m_numero_documento"];
$m_correo = $_POST["m_correo"];
$m_direccion = $_POST["m_direccion"];
$m_celular = $_POST["m_celular"];
$m_tipo_usuario = $_POST["m_tipo_usuario"];

$estado = $_POST["m_estado"];
$cambiar_clave = $_POST["cambiar_clave"];//cambiar =1; cambiar=0;
$id_perfil = $_POST["m_perfil"];
$usuario = $_POST["m_usuario"];
$clave = $_POST["m_clave"];


$cambio = $_POST["cambio"]; //0 sin pulsar,1=pulsado
$back_imagen = $_POST["back_imagen"];


if ($back_imagen == "") {
    $nombre_imagen_tiempo = "";
    foreach ($_FILES as $index => $file) {
        // for easy access
        $fileName = $file['name'];
        // for easy access
        $fileTempName = $file['tmp_name'];
        // check if there is an error for particular entry in array
        if (!empty($file['error'][$index])) {
            return false;
        }

        $nombre_imagen_tiempo = $nombre_nuevo = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '_' . rand(0, 100); //"unicoooooo";//date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
        //el proximo codigo es para ver que extension es la imagen 
        $array_nombre = explode('.', $fileName);
        $cuenta_arr_nombre = count($array_nombre);
        $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
        $nombre_imagen_tiempo = $nombre_imagen_tiempo . "." . $extension;
        //nube
        $direccion = "../../../../paquetes/imagenes/usuarios/";
        //local
        $destino = $direccion . $nombre_imagen_tiempo;
        // check whether file has temporary path and whether it indeed is an uploaded file
        if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
            if (move_uploaded_file($fileTempName, $destino)) {
                
            }
        }
    }
} else {
    if ($cambio == 1) {
        //se elimina el back
        @unlink("../../../../paquetes/imagenes/usuarios/".$back_imagen);
        $nombre_imagen_tiempo = "";
        foreach ($_FILES as $index => $file) {
            // for easy access
            $fileName = $file['name'];
            // for easy access
            $fileTempName = $file['tmp_name'];
            // check if there is an error for particular entry in array
            if (!empty($file['error'][$index])) {
                return false;
            }

            $nombre_imagen_tiempo = $nombre_nuevo = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '_' . rand(0, 100); //"unicoooooo";//date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
            //el proximo codigo es para ver que extension es la imagen 
            $array_nombre = explode('.', $fileName);
            $cuenta_arr_nombre = count($array_nombre);
            $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
            $nombre_imagen_tiempo = $nombre_imagen_tiempo . "." . $extension;
            //nube
            $direccion = "../../../../paquetes/imagenes/usuarios/";
            //local
            $destino = $direccion . $nombre_imagen_tiempo;
            // check whether file has temporary path and whether it indeed is an uploaded file
            if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
                if (move_uploaded_file($fileTempName, $destino)) {
                    
                }
            }
        }
    }else{
        //nose hace nada
        $nombre_imagen_tiempo = $back_imagen;
    }
}

$clase = new trabajador();
$reg = $clase->modificar($nombre, $apellido_p, $apellido_m, $m_tipo_documento,$m_numero_documento,
        $m_correo,$m_direccion,$m_celular, $nombre_imagen_tiempo, $usuario, $clave,
        $estado, $m_id, $cambiar_clave,$m_id_usuario,$m_tipo_usuario,$id_perfil);
echo $reg[0]["contar"];
