<?php
include_once '../repository/userRepository.php';
include_once '../models/user.php';


if(isset($_POST['registerBtn'])){
    if(empty($_POST['name']) || empty($_POST['phone'])  || empty($_POST['email'])  || empty($_POST['password'])){
        echo "Fill all fields!";
    }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone= $_POST['phone'];
        $password = $_POST['password'];

        $user  = new User($name,$phone,$email,$username,$password);
        $userRepository = new UserRepository();

        $userRepository->insertUser($user);
    }
}
?>