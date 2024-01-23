<?php
include_once './repository/userRepository.php';
include_once './models/user.php';


if(isset($_POST['registerBtn'])){
    if(empty($_POST['fname']) || empty($_POST['phoneNumber'])  || empty($_POST['email'])  || empty($_POST['password'])){
        echo "Fill all fields!";
    }else{
        $name = $_POST['fname'];
        $email = $_POST['phoneNumber'];
        $phone= $_POST['email'];
        $password = $_POST['password'];
        $ID = $username.rand(100,999);

        $user  = new User($ID,$fname,$phoneNumber,$email,$username,$password);
        $userRepository = new UserRepository();

        $userRepository->insertUser($user);
    }
}
?>