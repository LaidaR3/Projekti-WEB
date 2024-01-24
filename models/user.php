<?php

class User{//User
    private $ID;
    private $fname;
    private $phoneNumber;
    private $email;
    private $password;

    function __construct($ID,$fname,$phoneNumber,$email,$password){
        $this->ID = $ID;
        $this->fname = $fname;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->password = $password;
    }

    function getID(){
        return $this->ID;
    }
    function getFname(){
        return $this->fname;
    }
    function getPhoneNumber(){
        return $this->phoneNumber;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
}
?>