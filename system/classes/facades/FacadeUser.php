<?php


class FacadeUser {
    
    private $db;
    
    /**
     * 
     * @param \PersistenceImpl $db
     */
    public function __construct($db) {
        $this->db = $db;
    }
    
    /**
     * Valida la existencia de un usuario.
     * @param type $user_email
     * @param type $user_pass
     * @return type
     */
    public function checkUser($user_email,$user_pass) {
        $query = "SELECT user_id FROM user "
                . "WHERE user_email='$user_email' AND user_pass='$user_pass'";
        $result = $this->db->executeQuery($query);
        if(empty($result)){
            return FALSE;
        } else {
            return $result[0]['user_id'];
        }
    }

}
