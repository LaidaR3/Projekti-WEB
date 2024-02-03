    <?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    if ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'user') {
        header("Location: login.php");
        exit();
    }
    $conn = new mysqli("localhost", "root", "", "monvellidb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $offers = mysqli_query($conn, "SELECT * FROM offers");
    $offers = mysqli_fetch_all($offers, MYSQLI_ASSOC);


    if (isset($_POST['submit_booking'])) {
        
        $offer_id = $_POST['offer_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];


        $insertQuery = "INSERT INTO bookings (user_id, offer_id, name, email) VALUES ('{$_SESSION['user_id']}', '$offer_id', '$name', '$email')";
        if (mysqli_query($conn, $insertQuery)) {
            
            $successMessage = "Booking submitted successfully!";
        } else {
        
            $successMessage = "Error submitting booking. Please try again.";
        }
    }


    $bookings = mysqli_query($conn, "SELECT * FROM bookings WHERE user_id = '{$_SESSION['user_id']}'");
    $bookings = mysqli_fetch_all($bookings, MYSQLI_ASSOC);


    mysqli_close($conn);
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
                position: relative;
            }
        

            body::before {
                content: "";
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-color: #eeb699;
                filter: blur(5px);
                z-index: -1;
            }

            main {
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
                padding: 20px;
            }

            .offer {
        background-color: rgba(255, 255, 255, 0.8);
        max-width: 700px; 
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

            .offers-container{
                text-align:center;
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
            <div class="offers-container">
                <?php foreach ($offers as $offer): ?>
                    <div class="offer" id="offer<?php echo $offer['offersID']; ?>">
                        <h3><?php echo $offer['name']; ?></h3>
                        <?php
                            // Display the image if available
                            if (!empty($offer['image'])) {
                                $baseUrl = "http://localhost/Projekti-WEB"; 
                                $imagePath = $offer['image'];
                                $imageUrl = $baseUrl . '/' . $imagePath;
                                echo '<img src="' . $imageUrl . '" alt="Offer Image" style="max-width: 50%;" >';
                            }
                        ?>
                        <div class="offer-details">
                            <p><?php echo $offer['description']; ?></p>
                            <p>Price: $<?php echo $offer['price']; ?></p>
                            
                            <button class="booking-button" onclick="toggleBookingForm(<?php echo $offer['offersID']; ?>)">Book Now</button>
                            
                            <div class="booking-form-container" id="bookingForm<?php echo $offer['offersID']; ?>">
                                <form method="post" action="">
                                    <input type="hidden" name="offer_id" value="<?php echo $offer['offersID']; ?>">
                                    <label for="name">Your Name:</label>
                                    <input type="text" name="name" required>
                                    <br>

                                    <label for="email">Your Email:</label>
                                    <input type="email" name="email" required>
                                    <br>

                                    <input type="submit" name="submit_booking" value="Submit Booking">
                                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                                    <a href="delete_offer.php?offer_id=<?php echo $offer['offersID']; ?>" class="delete-button">Delete Offer</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                                    <a href="edit_offer.php?offer_id=<?php echo $offer['offersID']; ?>" class="edit-button">Edit Offer</a>
                                    <?php endif; ?>
                                    
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
