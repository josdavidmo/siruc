<?php


abstract class AbstractFacade {
    
    /** Stores the conexion with Driver Database. */
    protected $db;
    
    /**
     * Class constructor.
     * @param \PersistenceImpl $db - Driver Database.
     */
    function __construct($db) {
        $this->db = $db;
    }

    /**
     * Abstract method insert - Used to insert a new record in database.
     */
    public abstract function insert();
    
    /**
     * Abstract method update - Used to update a record in database.
     */
    public abstract function update();
    
    /**
     * Abstract method delete - Used to delete a record in database.
     */
    public abstract function delete();
    
    /**
     * Abstract method get - Used to get a matrix of records taking into 
     * account a criterion and the number of a page. The matrix of records
     * follows the next structure:
     * record[row]['attribute name'] = "value".
     * @param string $pag - used to specify the pager to show. Default value 1.
     * @param string $criterion - used to specify a filter. Default value 1.
     * * @param type $view - corresponds to a view name stored in database.
     */
    public abstract function get($pag, $criterion = "1", $view = NULL);
    
}
