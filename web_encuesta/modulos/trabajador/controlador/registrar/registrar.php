<?php

@session_start();
require_once '../../../../clases/conexion.php';
require_once '../../../../clases/trabajador/class_trabajador.php';

//formData.append('i_nombre', i_nombre);
//        formData.append('i_apellido_p', i_apellido_p);
//        formData.append('i_apellido_m', i_apellido_m);
//        formData.append('i_tipo_usuario', i_tipo_usuario);
//        formData.append('id_tipo_documento', id_tipo_documento);
//
//        formData.append('i_numero_documento', i_numero_documento);
//        formData.append('i_correo', i_correo);
//        formData.append('i_celular', i_celular);
//
//        formData.append('i_perfil', i_perfil);
//        formData.append('i_usuario', i_usuario);
//        formData.append('i_clave', i_clave);
//        formData.append("i_file", document.getElementById('i_file').files[0]);


$nombre = $_POST["i_nombre"];
$i_direccion=$_POST["i_direccion"];
$apellido_p = $_POST["i_apellido_p"];
$apellido_m = $_POST["i_apellido_m"];
$i_tipo_usuario = $_POST["i_tipo_usuario"]; //$rega[0]["I008ID_TRABAJADOR"];
$id_tipo_documento = $_POST["id_tipo_documento"];
$i_numero_documento = $_POST["i_numero_documento"];
$i_correo = $_POST["i_correo"];
$i_celular = $_POST["i_celular"];
$id_perfil = $_POST["i_perfil"];
$usuario = $_POST["i_usuario"];
$clave = $_POST["i_clave"];
if ($i_tipo_usuario == "1") {
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
    $nombre_imagen_tiempo = "";
}
$clase = new trabajador();

$reg = $clase->registrar($nombre, $apellido_p, $apellido_m, $id_tipo_documento,$i_numero_documento,
        $i_correo,$i_direccion,$i_celular, $nombre_imagen_tiempo, $usuario, $clave, $id_perfil,$i_tipo_usuario);
echo $reg[0]["contar"];
