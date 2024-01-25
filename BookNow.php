<?php
session_start();

include 'databaseConnection.php';
$databaseConnection = new DatabaseConnection();
$pdo = $databaseConnection->startConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitbtn'])) {
    $userID = $_SESSION['userID'];
    $nameb = $_POST['nameb'];
    $surnameb = $_POST['surnameb'];
    $emailb = $_POST['emailb'];
    $guests = $_POST['guests'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Prepare the statement
    $stmt = $pdo->prepare("INSERT INTO bookroom (userID, nameb, surnameb, emailb, guests, checkin, checkout) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bindParam(1, $userID);
    $stmt->bindParam(2, $nameb);
    $stmt->bindParam(3, $surnameb);
    $stmt->bindParam(4, $emailb);
    $stmt->bindParam(5, $guests);
    $stmt->bindParam(6, $checkin);
    $stmt->bindParam(7, $checkout);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2]; // Display the error message
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now - Monvelli</title>
    <link rel="stylesheet" href="./style.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
</head>
<body>
    <div id="overlay" class="overlay"></div>
<header class="headerContainer-book">
        <div class="list-book">
            <ul>
                 <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                        
                        <li><a href="./offers.php">Add offers</a></li>
                     <?php endif; ?> 
                    <li><a href="logout.php">Logout</a></li>
                 <?php else: ?> 
                    <li><a href="login.php" target="_blank">Log-in</a></li>
                    <li><a href="signUp.php" target="_blank">Sign-up</a></li>
                 <?php endif; ?> 
                <li><a href="view_offers.php">View Offers</a></li>
            </ul>
        </div>
        <div class="logo-book">
            <a href="index.php"><img src="imgs/logo1.png" alt="Logo"></a>
        </div>
    </header>


    <main>

        <div class="hr-b">
            <hr>
        </div>
        
         <div class="check-in-form" id="checkInForm">

            <form id="bookingForm"  class="booking-form" >
                <div class="name-b">
                    <label for="name-b">Name</label>
                    <input type="text" id="name-b" name="nameb">
                   

                    <label for="surname-b">Surname</label>
                    <input type="text" id="surname-b" name="surnameb">
                        
                </div>
                <div class = "errors">
                    <div class="error-message" id="nameError"></div>
                    <div class="error-message" id="lnameError"></div>
                </div>
                <div class="e-mail-guest">
                    <label for="e-mail">Email</label>
                    <input type="text" id="e-mail" name="emailb">
                    

                    <label for="guests">Guests</label>
                    <input type="number" id="guests" name="guests">
                </div>
                <div class = "errors">
                    <div class="error-message" id="emailError"></div>
                    <div class="error-message" id="guestError"></div>
                </div>
                <div class="checkIN">
                    <label for="checkin">Check-in</label>
                    <input type="date" id="checkin" name="checkin">
                    <label for="checkout">Check-out</label>
                    <input type="date" id="checkout" name="checkout">
                </div>
                
                <div class="submitBTN">
                    <input type="submit" id="openBookingForm" onclick="validateFormBook()" name="submitbtn">
                </div>
                <div class="closeBTN">
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                </div>
            </form>
        </div>

        

        <div class="rooms-book">
            <div class="title-Book"><p>Book Now One of our Marvellous Rooms</p></div>
            <div class="avalaible">

                
                <a><img src="./imgs/hotel bedroom5.jpg" style="height: 150px;"></a>
                <p>Dec 5,2023-Dec 7,2023<br>
                Junior Room</p>
                <div class="cmimi">
                    <p>$90.90</p>
                    <p>Including taxes and fees</p>
                </div>
                <div class="searchDates"> 
                    <button class="openBtn" onclick="openForm()" id="bR">Book Room</button> 
                </div> 
            </div>
            <div class="avalaible2">
                <a><img src="./imgs/dhoma2.jpeg" style="height: 150px;"></a>
                <p>Dec 6,2023-Dec 9,2023<br>
                Deluxe Room</p>
                <div class="cmimi">
                    <p>$100.90</p>
                    <p>Including taxes and fees</p>
                </div>
                <div class="searchDates"> 
                    <button class="openBtn" onclick="openForm()" id="bR">Book Room</button>
                </div> 
            </div>
            <div class="avalaible2">
                <a><img src="./imgs/dhoma22.jpeg" style="height: 150px;"></a>
                <p>Dec 3,2023-Dec 9,2023<br>
                Twin Room</p>
                <div class="cmimi">
                    <p>$120.90</p>
                    <p>Including taxes and fees</p>
                </div>
                <div class="searchDates"> 
                    <button class="openBtn" onclick="openForm()" id="bR">Book Room</button> 
                </div> 
            </div>
            <div class="avalaible2">
                <a><img src="./imgs/dhoma33.jpeg" style="height: 150px;"></a>
                <p>Dec 4,2023-Dec 6,2023<br>
                Twin Room</p>
                <div class="cmimi">
                    <p>$80.90</p>
                    <p>Including taxes and fees</p>
                </div>
                <div class="searchDates"> 
                    <button class="openBtn" onclick="openForm()" id="bR">Book Room</button> 
                </div> 
            </div>
        </div>
        

        <footer>

            <div class="footer">
                <div class="logo-f">
                    <img src="imgs/logowhite.png" alt="logo">
                </div>
                <div class="info-f">
                    <p id="info-f">Info</p>
                    <p>Rhodes, Greece</p>
                    <br>
                    <p>Tel: +30 455 333 2221</p>
                    <p>info@monvelliresort.com</p>
                    <br>
                    <p id="info-f">Follow Us</p>
                    <p>@monvelliresort</p>
                </div>
                <div >
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51358.392032854514!2d28.180502895363386!3d36.43581272682968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14956193e10aff61%3A0x6913d088bdbf8893!2sRhodes%2C%20Greece!5e0!3m2!1sen!2s!4v1700336965991!5m2!1sen!2s" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            </div>
            <div class="hr-f">
                <hr>
            </div>
            <div class="c">
                
                <p> &copy; Monvelli</p>
            </div>
            
        </footer>

        <script>
            // Pop Up form
            function openForm() {
              document.getElementById("checkInForm").style.display = "block";
            }
            
            function closeForm() {
              document.getElementById("checkInForm").style.display = "none";
            }


            //Validimi

            function validateFormBook() {

            let fnameInput = document.getElementById('name-b');
            let lnameInput = document.getElementById('surname-b');
            let emailInput = document.getElementById('e-mail');
            let guestInput = document.getElementById('guest');

            let nameError = document.getElementById('nameError');
            let lnameError = document.getElementById('lnameError');
            let emailError = document.getElementById('emailError');

            nameError.innerText = '';
            lnameError.innerText = '';
            emailError.innerText = '';
        

            let fnameRegex = /^[A-Z][a-z]{1,20}$/;
            let lnameRegex = /^[A-Z][a-z]{1,20}$/;
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            

            if (!fnameRegex.test(fnameInput.value)) {
                nameError.innerText = 'First name should start with a capital letter and be 1-8 characters long.';
                return;
            }

            if (!lnameRegex.test(lnameInput.value)) {
                lnameError.innerText = 'Last name should start with a capital letter and be 1-20 characters long.';
                return;
            }

            if (!emailRegex.test(emailInput.value)) {
                emailError.innerText = 'Invalid email address.';
                return;
            }

           

            alert('Form submitted successfully!');
            }
        </script>
            




    
        

    </main>

</body>
</html>