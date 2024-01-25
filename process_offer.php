<?php
session_start();


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $conn = new mysqli("localhost", "root", "", "monvellidb");

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    
    $sql = "INSERT INTO offers (name, description, price) VALUES ('$name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Offer added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: offers.php");
    exit();
}
?>
