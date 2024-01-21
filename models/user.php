<?php

class User{
    private $name;
    private $phone;
    private $email;
    private $password;

    function __construct($name,$phone,$email,$password){
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }

    function getName(){
        return $this->name;
    }
    function getPhone(){
        return $this->phone;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
}
?>