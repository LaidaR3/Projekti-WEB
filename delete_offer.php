<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "monvellidb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$offerId = $_POST['id']; // Change 'offersID' to 'id'

$sql = "DELETE FROM offers WHERE offersID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $offerId);

if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>

?>
