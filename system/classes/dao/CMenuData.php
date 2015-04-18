<?php

class CMenuData {
    
    private $db;
    
    /**
     * 
     * @param \PersistenceImpl $db
     */
    public function __construct($db) {
        $this->db = $db;
    }
    
    /**
     * 
     * @param type $criterion
     * @return type
     */
    public function getMenu($criterion = "1") {
        $query = "SELECT * FROM menu WHERE $criterion";
        return $this->db->executeQuery($query);
    }

    
}

