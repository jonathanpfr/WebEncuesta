<?php

class trabajador {

    private $array;

    public function __construct() {
        $this->array = array();
    }
//     public function lista_comercial_activo() {
//        $sql = "call sp_tb006_trabajador_listar_comercial_activo();";
//        $getResults = Conectar::con()->prepare($sql);
//        $getResults->execute();
//        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
//        foreach ($results as $row) {
//            $this->array[] = $row;
//        }
//        return $this->array;
//    }
 public function lista_comercial_activo() {
        $sql = "call sp_tb006_trabajador_listar_comercial_activo();";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }
    public function verificar_dni_registrar($id,$numero) {
        $sql = "call sp_tb006_trabajador_dni_verificar_registrar($id,'$numero');";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function verificar_dni_modificar($id_tipo_documento,$numero_doc,$id_admin) {
        $sql = "call sp_tb006_trabajador_dni_verificar_modificar($id_tipo_documento,'$numero_doc',$id_admin);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function verificar_usuario_registrar($usuario) {
        $sql = "call sp_tb006_trabajador_usuario_verificar_registrar('$usuario');";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function verificar_usuario_modificar($usuario, $id_admin) {
        $sql = "call sp_tb006_trabajador_usuario_verificar_modificar('$usuario',$id_admin);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

//    in nombre_ VARCHAR(200),in apellido_p_ VARCHAR(200),in apellido_m_ VARCHAR(200),in tipo_documento_ int,in numero_documento_ VARCHAR(200),in correo_ varchar(200),in direccion_ varchar(200),in telefono_ varchar(200),
// in imagen_ text,in usuario_ VARCHAR(200),in clave_ VARCHAR(200),in id_perfil_ int
            
    public function registrar($nombre, $apellido_p, $apellido_m, $id_tipo_doc,$numero_doc,$correo,$direccion,$telefono, $imagen, $usuario, $clave, $id_perfil,$i_tipo_usuario) {
        $sql = "call sp_tb006_trabajador_registrar('$nombre','$apellido_p','$apellido_m',$id_tipo_doc,'$numero_doc','$correo','$direccion','$telefono','$imagen','$usuario','$clave',$id_perfil,$i_tipo_usuario);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

//    in nombre_ VARCHAR(200),in apellido_p_ VARCHAR(200),in apellido_m_ VARCHAR(200),in tipo_documento_ int,in numero_doc_ VARCHAR(200),
//in correo_ varchar(200),in direccion_ varchar(200),in telefono_ varchar(200), in imagen_ text,in usuario_ VARCHAR(200),in clave_ VARCHAR(200),in estado_ int, in id_ int,in cambiar_clave_ int,in id_usuario_ int,in tipo_usuario_ int,in id_perfil_ int
            
    public function modificar($nombre, $apellido_p, $apellido_m, $id_tipo_doc,$numero_doc,$correo,$direccion,$telefono,$imagen, $usuario, $clave, $estado, $id, $cambiar_clave,$id_usuario,$tipo_usuario,$id_perfil) {
//        $sql = "call sp_tb006_trabajador_modificar($nombre,$apellido_p,$apellido_m,$dni,$imagen,$usuario,$clave,$estado,$id,$cambiar_clave);";
       $sql = "call sp_tb006_trabajador_modificar('$nombre','$apellido_p','$apellido_m',$id_tipo_doc,'$numero_doc','$correo','$direccion','$telefono','$imagen','$usuario','$clave',$estado,$id,$cambiar_clave,$id_usuario,$tipo_usuario,$id_perfil);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function eliminar($id) {
        $sql = "call sp_tb006_trabajador_eliminar($id);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

public function seleccion_perfil($id_user) {
        $sql = "call sp_tb006_trabajador_seleccion_perfil($id_user);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }
    
    public function seleccion_cuenta($id_user) {
        $sql = "call sp_tb006_trabajador_seleccion_cuenta($id_user);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }
    public function seleccion($id) {
        $sql = "call sp_tb006_trabajador_seleccion($id);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

    public function listar() {
        $sql = "call sp_tb006_trabajador_listar();";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

//    
//  public function like_vendedor($nombre) {
//        $sql = "SELECT * from (
//SELECT us.*,CONCAT(us.NOMBRES,' ',us.APELLIDOS)nombre_apellidos from  tbl_usuario us
//where us.ID_CARGO=1 and us.ESTADO=1 and not us.ID_USUARIO=1) as a
// where nombre_apellidos LIKE '%$nombre%'";
//        $res = mysql_query($sql, Conectar::con());
//
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//    
//    public function verificar_reg_codigo($codigo) {
//        $sql = "SELECT COUNT(id_usuario)contar from tbl_usuario where codigo='$codigo';";
//        $res = mysql_query($sql, Conectar::con());
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//      public function verificar_mod_codigo($codigo,$id_usuario) {
//        $sql = "SELECT COUNT(id_usuario)contar from tbl_usuario where codigo='$codigo' and not id_usuario=$id_usuario;";
//        $res = mysql_query($sql, Conectar::con());
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//    
//      public function obtener_maximo_codigo() {
//        $sql = "SELECT MAX(codigo)codigo from tbl_usuario;";
//        $res = mysql_query($sql, Conectar::con());
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//    
//     public function lista() {
//        $sql = "SELECT u.*,c.NOMBRE as nombre_cargo from tbl_usuario u 
//INNER JOIN tbl_cargo c on c.ID_CARGO=u.ID_CARGO
//where u.ESTADO=1 and not u.ID_USUARIO=1;";
//        $res = mysql_query($sql, Conectar::con());
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//
//    public function verificar_reg_usuario($usuario) {
//        $sql = "SELECT COUNT(id_usuario)contar from tbl_usuario where usuario='$usuario' and estado=1;";
//        $res = mysql_query($sql, Conectar::con());
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//
//    public function verificar_mod_usuario($usuario, $id) {
//        $sql = "SELECT COUNT(id_usuario)contar from tbl_usuario where usuario='$usuario' and estado=1 and not id_usuario=$id;";
//        $res = mysql_query($sql, Conectar::con());
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//    public function buscar_cargo_persona($id_persona) {
//        $sql = "SELECT c_doctor,c_admin,c_enfer from (
//SELECT * from (
//SELECT COUNT(d.id_doctor)c_doctor,'1'u from tbl_doctor d
//where d.id_persona=$id_persona
//) as a
//LEFT JOIN (
//SELECT COUNT(a.id_administrador)c_admin,'1'uu from tbl_administrador a
//where a.id_persona=$id_persona
//) as b on b.uu=a.u
//LEFT JOIN (
//SELECT COUNT(e.id_enfermera)c_enfer,'1'uuu from tbl_enfermera e
//where e.id_persona=$id_persona
//) as c on c.uuu=a.u
//) as b";
//        $res = mysql_query($sql, Conectar::con());
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//    public function buscar_usuario($id) {
//        $sql = "SELECT u.* from tbl_usuario u 
//where u.id_usuario=$id";
//        $res = mysql_query($sql, Conectar::con());
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//    public function buscar_usuario($id) {
//        $sql = "SELECT u.*,c.NOMBRE as nombre_cargo from tbl_usuario u 
//INNER JOIN tbl_cargo c on c.ID_CARGO=u.ID_CARGO
// where  u.id_usuario=$id;";
//        $res = mysql_query($sql, Conectar::con());
//        while ($reg = mysql_fetch_assoc($res)) {
//            $this->usuario[] = $reg;
//        }
//        return $this->usuario;
//    }
//
////    public function lista_usuario() {
////        $sql = "SELECT u.*,CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno)as persona from tbl_usuario u 
////INNER JOIN tbl_persona p on p.id_persona=u.id_persona
////where u.estado=1";
////        $res = mysql_query($sql, Conectar::con());
////        while ($reg = mysql_fetch_assoc($res)) {
////            $this->usuario[] = $reg;
////        }
////        return $this->usuario;
////    }
//
//    public function insertar_usuario($codigo, $nombres, $apellidos, $usuario, $pass, $id_cargo, $correo, $foto) {
//        $sql = "INSERT INTO tbl_usuario VALUES(null,'$codigo','$nombres','$apellidos','$usuario',md5('$pass'),$id_cargo,'$correo','$foto',1);";
//        $res = mysql_query($sql, conectar::con());
//        if ($res) {
//            echo "1";
//        } else {
//            echo "error: " . mysql_error(), "</br>";
//            echo "codigo_error:" . mysql_errno();
//        }
//    }
//
//    public function modificar_usuario($nombres, $apellidos, $usuario, $ID_CARGO, $correo, $foto, $ESTADO, $ID_USUARIO) {
//        $sql = "UPDATE tbl_usuario set NOMBRES='$nombres',APELLIDOS='$apellidos',USUARIO='$usuario',ID_CARGO=$ID_CARGO,
//CORREO='$correo',FOTO='$foto',ESTADO=$ESTADO where ID_USUARIO=$ID_USUARIO;";
//        $res = mysql_query($sql, conectar::con());
//        if ($res) {
//            echo "1";
//        } else {
//            echo "error: " . mysql_error(), "</br>";
//            echo "codigo_error:" . mysql_errno();
//        }
//    }
//
//    public function modificar_pass($password, $ID_USUARIO) {
//        $sql = "UPDATE tbl_usuario set `PASSWORD`=md5('$password') where ID_USUARIO=$ID_USUARIO;";
//        $res = mysql_query($sql, conectar::con());
//        if ($res) {
////            echo "1";
//        } else {
//            echo "error: " . mysql_error(), "</br>";
//            echo "codigo_error:" . mysql_errno();
//        }
//    }
//
//    public function eliminar_usuario($id_usuario) {
//        $sql = "UPDATE tbl_usuario set ESTADO=3 where ID_USUARIO=$id_usuario;";
//        $res = mysql_query($sql, conectar::con());
//        if ($res) {
//            echo "1";
//        } else {
//            echo "error: " . mysql_error(), "</br>";
//            echo "codigo_error:" . mysql_errno();
//        }
//    }
}

?>