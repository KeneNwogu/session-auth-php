<?php
class User{
    public $name;
    public $email;
    private $session_id;
    private $password;
    // static $IDs = []

    function __construct($name, $email, $password){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    function get_password(){
        return $this->password;
    }
    function get_session_id(){
        return $this->session_id;
    }

    function set_session_id(){
        $this->session_id = rand(2000, 8000);
    }
}

class UserID{
    public $ID;
    public $user;

    function __construct($id, $user){
        $this->ID = $id;
        $this->user = $user;
    }
}

?>