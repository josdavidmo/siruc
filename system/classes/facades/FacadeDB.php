<?php

class FacadeDB extends AbstractFacade {    
    
    public function getColumns($table){
        $query = "SHOW COLUMNS FROM $table";
        $result = $this->db->executeQuery($query);
        return $result;
    }
    
    public function getTablesAssociated(){
        $query;
        $result = $this->db->executeQuery($query);
        return $result;
    }
    
    public function getPrimaryKey($table) {
        $query;
        $result = $this->db->executeQuery($query);
        return $result;
    }
    
    public function delete() {}

    public function get($criterion = "1", $pag = "1") {}

    public function insert() {}

    public function update() {}

}
