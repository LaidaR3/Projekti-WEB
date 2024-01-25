<?php
session_start();

$conn = new mysqli("localhost", "root", "", "monvellidb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_booking"])) {
    $user_id = $_SESSION["user_id"];
    $offer_id = $_POST["offer_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

  
    $insert_booking_sql = "INSERT INTO bookings (user_id, offer_id, name, email) VALUES ('$user_id', '$offer_id', '$name', '$email')";
    if ($conn->query($insert_booking_sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $insert_booking_sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM offers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $offers = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $offers = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        
        .booking-form-container {
            display: none;
        }
        
    </style>
</head>
<body>
    <header>
       
    </header>

    <main>
        <h2>Available Offers</h2>
        <div class="offers-container">
            <?php foreach ($offers as $offer): ?>
                <div class="offer">
                    <h3><?php echo $offer['name']; ?></h3>
                    <div class="offer-details">
                        <p><?php echo $offer['description']; ?></p>
                        <p>Price: $<?php echo $offer['price']; ?></p>
                        
                        <!-- Update the form to open a collapsible form -->
                        <button onclick="toggleBookingForm(<?php echo $offer['offersID']; ?>)">Book Now</button>
                        
                        <!-- Collapsible booking form -->
                        <div class="booking-form-container" id="bookingForm<?php echo $offer['offersID']; ?>">
                            <form method="post" action="">
                                <input type="hidden" name="offer_id" value="<?php echo $offer['offersID']; ?>">
                                <label for="name">Your Name:</label>
                                <input type="text" name="name" required>

                                <label for="email">Your Email:</label>
                                <input type="email" name="email" required>

                                <!-- Add more fields as needed -->

                                <input type="submit" name="submit_booking" value="Submit Booking">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
   
            
    </footer>

   
    <script>
        function toggleBookingForm(offerId) {
            var formContainer = document.getElementById('bookingForm' + offerId);
            formContainer.style.display = (formContainer.style.display === 'none') ? 'block' : 'none';
        }
    </script>
</body>
</html>
