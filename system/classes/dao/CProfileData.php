<?php

class CProfileData {

    private $db;

    /**
     * 
     * @param \PersistenceImpl $db
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Insert new profile in data base.
     * @param type $table
     * @param type $fields
     * @param type $object
     * @return type
     */
    public function insertProfile($table, $fields, $object) {
        return $this->db->save($table,$fields,$object);
    }

}
