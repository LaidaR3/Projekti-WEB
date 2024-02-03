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

if (isset($_GET['offer_id'])) {
    $offer_id = $_GET['offer_id'];
    $result = mysqli_query($conn, "SELECT * FROM offers WHERE offersID = '$offer_id'");
    $offer = mysqli_fetch_assoc($result);

    if ($offer) {
        ?>
        <form method="post" action="update_offer.php">
            <input type="hidden" name="offer_id" value="<?php echo $offer['offersID']; ?>">
            <label for="name">Offer Name:</label>
            <input type="text" name="name" value="<?php echo $offer['name']; ?>" required>
            <br>

            <label for="description">Description:</label>
            <textarea name="description" required><?php echo $offer['description']; ?></textarea>
            <br>

            <label for="price">Price:</label>
            <input type="text" name="price" value="<?php echo $offer['price']; ?>" required>
            <br>

            <label for="edited_by">Edited By:</label>
            <select name="edited_by">
                <option value="delfinaplakolliii@gmail.com">Delfina</option>
                <option value="laida@gmail.com">Laida</option>
                <!-- Add more options as needed -->
            </select>

            <input type="submit" name="submit_update" value="Update Offer">
        </form>
        <?php
    } else {
        echo "Offer not found.";
    }
}

mysqli_close($conn);
?>
