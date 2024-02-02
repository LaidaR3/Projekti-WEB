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

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_extensions)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO offers (name, description, price, image) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $description, $price, $target_file);

        if ($stmt->execute()) {
            echo "Offer added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading image";
    }

    $conn->close();
} else {
    header("Location: offers.php");
    exit();
}
?>
