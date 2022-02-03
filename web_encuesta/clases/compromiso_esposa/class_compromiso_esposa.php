<?php
class compromiso_esposa {

    private $array;

    public function __construct() {
        $this->array = array();
    }

   
    public function listar_activo() {
        $sql = "call sp_tb014_tipo_compromiso_lista_activo();";
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