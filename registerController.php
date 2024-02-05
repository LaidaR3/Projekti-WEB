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

        // Check if the user with the provided email already exists
        if (userAlreadyExists($email)) {
            echo "User with this email already exists!";
            exit();
        }

        // Continue with the registration process if the user is not already registered
        $user = new user(null, $fname, $phoneNumber, $email, $password);
        $userRepository = new userRepository();
        $userRepository->insertUser($user);

        header("Location: login.php");
        exit();
    }
}
?>



