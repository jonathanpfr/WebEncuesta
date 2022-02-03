<?php
class condicion_llega {

    private $array;

    public function __construct() {
        $this->array = array();
    }

   
    public function listar_activo() {
        $sql = "call sp_tb012_tipo_condicion_llega_lista_activo();";
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