<?php
class distrito {

    private $array;

    public function __construct() {
        $this->array = array();
    }

   
    public function listar_activo($id_provincia) {
        $sql = "call sp_tb006_distrito_lista_activo($id_provincia);";
        $getResults = Conectar::con()->prepare($sql);
        $getResults->execute();
        $results = $getResults->fetchAll(PDO::FETCH_BOTH);
        foreach ($results as $row) {
            $this->array[] = $row;
        }
        return $this->array;
    }

}

?>