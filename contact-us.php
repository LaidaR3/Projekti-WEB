<?php
session_start();

$conn = new mysqli("localhost", "root", "", "monvellidb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

   
    try {
        
        $sql = "INSERT INTO usermessage (fname, lname, email, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $fname, $lname, $email, $message);

        if ($stmt->execute()) {
            
            echo "Form submitted successfully!";
        } else {
           
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } catch (Exception $e) {
       
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    <title>Contact Us - Monvelli</title>
</head>
<body>
    <header class="headerContainer">
        <div class="logo">
            <img src="imgs/logo1.png" alt="Logo">
        </div>
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="rooms.php">Rooms</a></li>
            <li><a href="poolAndSpa.php">Pool & Spa</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
            <li><a href="BookNow.php" target="_blank">Book Now</a></li>
        </ul>
        
    </header>

    <main>

        <div class="mainIMG-c">
            <p id="title-c">Contact Us</p>
        </div>

        

        <div class="firstSection-c">
            <div class="left-part">
                <p id="p1-left">ABOUT OUR RESORT</p>
                <p id="p2-left">FAQs and House Rules</p>

                <!-- Collapsible part -->
                <button type="button" class="collapsibleCU">Check-in and Check-out time<span class="plus-icon">&#43;</span></button>
                <div class="contentCU">
                    <p>Check-in at our Resort is from 2:00 PM, and check-out is until 12:00 PM.</p>
                </div>
                <hr>
        
                <button type="button" class="collapsibleCU">Children & Extra Beds<span class="plus-icon">&#43;</span></button>
                <div class="contentCU">
                    <p>Children (0-12years) are welcome, free of charge, 0 - 3 years - Crib upon request free,
                        3+ years - Extra bed upon request € 20 per night
                    </p>
                </div>
                <hr class="collapsibleHR">
        
                <button type="button" class="collapsibleCU">When is Breakfast and Dinner served<span class="plus-icon">&#43;</span></button>
                <div class="contentCU">
                    <p>Breakfast is served from 7am until 10am whereas Dinner is served from 6pm until 8pm</p>
                </div>
                <hr class="collapsibleHR">
        
                <button type="button" class="collapsibleCU">Transportation from and to the airport<span class="plus-icon">&#43;</span></button>
                <div class="contentCU">
                    <p>For more information please contact us</p>
                </div>
                <hr class="collapsibleHR">
        
                <button type="button" class="collapsibleCU">Are pets allowed?<span class="plus-icon">&#43;</span></button>
                <div class="contentCU">
                    <p>Pets are not allowed</p>
                </div >

            </div>
            <div class="form-part">
                <p id="p1-left">CONTACT FORM</p>
                <p id="p2-left">Write us a message</p>
                <div class="icons-c">
                    <img src="imgs/mail.png" alt="Mail icon">
                    <p>info@monvelliresort.com</p>
                    <img src="imgs/old-typical-phone.png" alt="Phone icon">
                    <p>+30 33 3455 6667</p>
                </div>
           
                    <form name="myForm" action="" method="POST" onsubmit="return validateForm()">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname">
                        <div class="error-message" id="nameError"></div>

                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname">
                        <div class="error-message" id="lnameError"></div>

                        
                        <label for="femail">E-mail</label>
                        <input type="text" id="email" name="email">
                        <div class="error-message" id="emailError"></div>

                        
                        <label for="femail">Your message</label>
                        <input type="text" id="message" name="message">
                        <input type="hidden" id="userID" name="userID" value="<?php echo isset($_SESSION['userID']) ? $_SESSION['userID'] : ''; ?>">
                        <button type="submit" id="submit-form" name="submit-form">Submit</button>

                       </form>
        
            </div>
        </div>


    </main>


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

        function validateForm() {

            let fnameInput = document.getElementById('fname');
            let lnameInput = document.getElementById('lname');
            let emailInput = document.getElementById('email');

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

            // Collpasible

            var collapsible = document.getElementsByClassName("collapsibleCU");
            var i;

            for (i = 0; i < collapsible.length; i++) {
                collapsible[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            }

 
    </script>

    
</body>
</html>
