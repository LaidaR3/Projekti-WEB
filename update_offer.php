<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_update'])) {
    $conn = new mysqli("localhost", "root", "", "monvellidb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $offer_id = $_POST['offer_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $edited_by = $_POST['edited_by'];  // Get the value selected in the form

    // Update the offer in the database
    $updateQuery = "UPDATE offers SET name='$name', description='$description', price='$price', edited_by='$edited_by' WHERE offersID='$offer_id'";
    
    if (mysqli_query($conn, $updateQuery)) {
        echo "Offer updated successfully!";
    } else {
        echo "Error updating offer. Please try again.";
    }

    mysqli_close($conn);
}
?>

