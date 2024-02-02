<?php
$roomIDtoDelete = $_GET['id'];
include_once './userRepository.php';

$userRepository = new UserRepository();

$userRepository->deleteRoomReservation($roomIDtoDelete);

header("location: RoomsDashboard.php");
?>