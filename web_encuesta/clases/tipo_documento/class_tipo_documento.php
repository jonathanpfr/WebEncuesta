<?php
class tipo_documento {

    private $array;

    public function __construct() {
        $this->array = array();
    }

    public function lista_activo() {
        $sql = "call sp_tb007_tipo_documento_lista_activo();";
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