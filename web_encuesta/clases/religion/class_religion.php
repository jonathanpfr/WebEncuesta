<?php
class religion {

    private $array;

    public function __construct() {
        $this->array = array();
    }

   
    public function listar_activo() {
        $sql = "call sp_tb008_religion_lista_activo();";
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