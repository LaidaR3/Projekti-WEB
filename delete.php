<?php
$userId = $_GET['ID'];
include_once 'userRepository.php';

$userRepository = new UserRepository();

$userRepository->deleteUser($userId);

header("location:dashboard.php");
?>