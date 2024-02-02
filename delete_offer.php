<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['offer_id'])) {
    $offerId = $_GET['offer_id'];

    $conn = new mysqli("localhost", "root", "", "monvellidb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Implement the deletion logic here
    $deleteQuery = "DELETE FROM offers WHERE offersID = $offerId";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "Offer deleted successfully";
    } else {
        echo "Error deleting offer: " . $conn->error;
    }

    mysqli_close($conn);
} else {
    echo "Invalid offer ID";
}
?>
