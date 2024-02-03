<?php
session_start();


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
        margin: 0;
        padding: 0;
    }

    main {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        padding: 20px;
        border: 1px solid #ccc;
    }

    .offer {
        width: 200px;
        padding: 10px;
        margin: 10px;
        border: 1px solid #ddd;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .offer:hover {
        transform: scale(1.1);
    }
</style>
</head>
<body>
    <header>
    
    </header>

    <main>
        <h2>Add Offers</h2>
        <form action="process_offer.php" method="post" enctype="multipart/form-data">
            <label for="name">Offer Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Offer Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Offer Price:</label>
            <input type="text" id="price" name="price" required>

            <label for="image">Offer Image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <button type="submit">Add Offer</button>
        </form>
    </main>

    <footer>
       
    </footer>
</body>
</html>
