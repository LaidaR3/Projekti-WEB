<?php
include_once './userRepository.php';
include_once './user.php';


if(isset($_POST['submit-form'])){
    if(empty($_POST['fname']) || empty($_POST['phoneNumber'])  || empty($_POST['email'])  || empty($_POST['password'])){
        echo "Fill all fields!";
    }else{
        $fname = $_POST['fname'];
        $phoneNumber= $_POST['phoneNumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //$ID = $username.rand(100,999);
        $user=new user(null,$fname,$phoneNumber,$email,$password);
        // $statement->execute([$id, $name, $phone, $email, $password]);
         $userRepository = new userRepository();

        $userRepository->insertUser($user);
    }
}



?>