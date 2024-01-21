<?php
include_once '../repository/userRepository.php';
include_once '../models/user.php';


if(isset($_POST['registerBtn'])){
    if(empty($_POST['fname']) || empty($_POST['phoneNumber'])  || empty($_POST['email'])  || empty($_POST['password'])){
        echo "Fill all fields!";
    }else{
        $name = $_POST['fname'];
        $phone= $_POST['phoneNumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user  = new User($fname,$phonNumber,$email,$password);
        $userRepository = new UserRepository();

        $userRepository->insertUser($user);
    }
}
?>