<?php

class User{
    private $fname;
    private $phoneNumber;
    private $email;
    private $password;

    function __construct($fname,$phoneNumber,$email,$password){
        $this->fname = $fname;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->password = $password;
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