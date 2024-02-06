<?php
include_once './userRepository.php';
include_once './user.php';

function userAlreadyExists($email) {
    $userRepository = new userRepository();
    $existingUser = $userRepository->getUserByEmail($email);

    return $existingUser !== null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit-form'])) {
        $fname = $_POST['fname'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (userAlreadyExists($email)) {
            echo "User with this email already exists!";
            exit();
        }

        $user = new user(null, $fname, $phoneNumber, $email, $password);
        $userRepository = new userRepository();
        $userRepository->insertUser($user);

        header("Location: login.php");
        exit();
    }
}
?>



