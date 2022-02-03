<?php
class provincia {

    private $array;

    public function __construct() {
        $this->array = array();
    }

   
    public function listar_activo($id_departamento) {
        $sql = "call sp_tb005_provincia_lista_activo($id_departamento);";
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