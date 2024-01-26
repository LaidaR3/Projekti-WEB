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
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    
    <style>


body {
    margin: 0;
    padding: 0;
    font-family: 'Crimson Text', serif;
    font-weight: 200;
    position: relative; /* Make body a positioning context for pseudo-element */
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: #eeb699;
    filter: blur(5px); /* Adjust the blur amount as needed */
    z-index: -1; /* Send the pseudo-element to the background */
}

main {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 20px;
}

.offer {
    background-color: rgba(255, 255, 255, 0.8);
    flex-basis: 48%; /* Adjusted width to have two offers in one row */
    box-sizing: border-box;
    padding: 30px;
    margin: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
    line-height: 2.5;
}

.offer:hover {
    transform: scale(1.05);
}

.offer h3 {
    margin-bottom: 10px;
}

.offer-details {
    font-size: 14px;
}

.booking-form-container {
    display: none;
    margin-top: 10px;
}

.booking-button {
    width: 120px;
    padding: 20px;
    font-size: 15px;
    border: none;
    background-color: #343536;
    color: #eeb699;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.booking-button:hover {
    background-color: #eeb699;
    color: #343536;
}

.booking-form-container input[type="submit"] {
    width: 150px;
    padding: 20px;
    font-size: 15px;
    border: none;
    background-color: #343536;
    color: #eeb699;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.booking-form-container input[type="submit"]:hover {
    background-color: #eeb699;
    color: #343536;
}

    </style>
       
   
</head>
<body>
    <header>
       
    </header>

    <main>
        <!-- <h2>Available Offers</h2> -->
        <div class="offers-container">
            <?php foreach ($offers as $offer): ?>
                <div class="offer">
                    <h3><?php echo $offer['name']; ?></h3>
                    <div class="offer-details">
                        <p><?php echo $offer['description']; ?></p>
                        <p>Price: $<?php echo $offer['price']; ?></p>
                        
                        <!-- Update the form to open a collapsible form -->
                        <button  class="booking-button" onclick="toggleBookingForm(<?php echo $offer['offersID']; ?>)">Book Now</button>
                        
                        <!-- Collapsible booking form -->
                        <div class="booking-form-container" id="bookingForm<?php echo $offer['offersID']; ?>">
                            <form method="post" action="">
                                <input type="hidden" name="offer_id" value="<?php echo $offer['offersID']; ?>">
                                <label for="name">Your Name:</label>
                                <input type="text" name="name" required>
                                <br>

                                <label for="email">Your Email:</label>
                                <input type="email" name="email" required>
<br>
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
