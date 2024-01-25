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
  
</head>
<body>
    <header>
    
    </header>

    <main>
        <h2>Add Offers</h2>
        <form action="process_offer.php" method="post">
            <label for="name">Offer Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Offer Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Offer Price:</label>
            <input type="text" id="price" name="price" required>

            <button type="submit">Add Offer</button>
        </form>
    </main>

    <footer>
       
    </footer>
</body>
</html>
