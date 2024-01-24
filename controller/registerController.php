<?php
include_once './repository/userRepository.php';
include_once './models/user.php';


if(isset($_POST['submit-form'])){
    if(empty($_POST['fname']) || empty($_POST['phoneNumber'])  || empty($_POST['email'])  || empty($_POST['password'])){
        echo "Fill all fields!";
    }else{
        $fname = $_POST['fname'];
        $phoneNumber= $_POST['phoneNumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ID = $username.rand(100,999);

        $user  = new User($ID,$fname,$phoneNumber,$email,$username,$password);
        $userRepository = new UserRepository();

        $userRepository->insertUser($user);
    }
}
?>