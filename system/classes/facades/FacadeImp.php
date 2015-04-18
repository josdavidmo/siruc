<?php

class FacadeImp extends AbstractFacade{
    
    /** Object type FacadeDB used to get information about the table. */
    private $facadeTable;
    /** String which stores table name. */
    private $table;
    
    /**
     * Class constructor.
     * @param string $table - Table name.
     * @param \PersistenceImpl $db - Driver Database.
     */
    public function __construct($table, $db) {
        $this->table = $table;
        $this->facadeTable = new FacadeDB($db);
        parent::__construct($db);
    }

    /**
     * Delete a record from table.
     * @param string $idEntity
     * @return boolean - True if the operation was succes else Error
     * Code from Database. 
     */
    public function delete($idEntity) {
        $table = $this->table;
        $primaryKey = array_column($this->facadeTable->getPrimaryKey($table),0);
        $criterion = "$primaryKey = $idEntity";
        return $this->db->delete($table, $criterion);
    }

    /**
     * Gets records from table.
     * @param type $pag - page number shown.
     * @param string $criterion - used to make a filter. 
     * @param type $view - corresponds to a view name stored in database.
     * @return string[][] - The matrix of records follows the next structure:
     * record[row]['attribute name'] = "value".
     */
    public function get($pag, $criterion = "1", $view = NULL) {
        $table = $this->table;
        $limit = PAG_CANT;
        $offset = PAG_CANT*$pag;
        $query = "SELECT * "
                . "FROM $table "
                . "WHERE $criterion "
                . "LIMIT $limit "
                . "OFFSET $offset";
        if($view != NULL){
            $query = "SELECT * "
                    . "FROM $view "
                    . "WHERE $criterion "
                    . "LIMIT $limit "
                    . "OFFSET $offset";
        }
        return $this->db->executeQuery($query);
    }

    /**
     * Insert a new record in the select table.
     * @param string $values - Array of values.
     * @return boolean - True if the operation was succes else Error
     * Code from Database.
     */
    public function insert($values) {
        $table = $this->table;
        $fields = array_column($this->facadeTable->getColumns($table), 0);
        return $this->db->save($table,$fields,$values);
    }

    /**
     * Updates an exist record in the select table.
     * @param string $values - Array of values.
     * @return boolean - True if the operation was succes else Error
     * Code from Database.
     */
    public function update($values) {
        $table = $this->table;
        $fields = array_column($this->facadeTable->getColumns($table), 0);
        $primaryKey = array_column($this->facadeTable->getPrimaryKey($table), 0);
        $idEntity = $values[0];
        $criterion = "$primaryKey = $idEntity";
        return $this->db->update($table, $fields, $values, $criterion);
    }

}
