<?php

class CUser {
    
    /** Almacena el id del usuario. */
    private $user_id;
    /** Almacena el nick del usuario. */
    private $user_nick;
    /** Almacena el pass del usuario. */
    private $user_pass;
    
    public function __construct($user_id, $user_nick, $user_pass) {
        $this->user_id = $user_id;
        $this->user_nick = $user_nick;
        $this->user_pass = $user_pass;
    }
    
    public function getUser_id() {
        return $this->user_id;
    }

    public function getUser_nick() {
        return $this->user_nick;
    }

    public function getUser_pass() {
        return $this->user_pass;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setUser_nick($user_nick) {
        $this->user_nick = $user_nick;
    }

    public function setUser_pass($user_pass) {
        $this->user_pass = $user_pass;
    }



    
    
}
