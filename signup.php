<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit-form"])) {
            $emri = $_POST['fname'];
            $numritel = $_POST['phoneNumber'];
            $email= $_POST['email'];
            $fjalekalimi = $_POST['password'];
            echo 'Perdoruesi' . $emri;
            header('Location:BookNow.php');
        } else {
            echo 'Ju nuk keni shtypur butonin Submit';
        }
    }
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./style.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
</head>
<body>

    <main>
        <div class="signUp-section">
            <div class="signUp-form">
                <a href="index.php"><img src="./imgs/logo1.png" height="40px"></a><br>
                <form id="myform1" method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">

                    <!-- First Name -->
                    <label for="firstname">Full Name</label>
                    <input type="text" id="fname">
                    <div class="error-message" id="fnameError"></div>
                    
                    <!-- Phone Number -->
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" id="phoneNumber">
                    <div class="error-message" id="phoneError"></div>

                    <!-- Email -->
                    <label for="email">E-mail</label>
                    <input type="text" id="email">
                    <div class="error-message" id="emailError"></div>

                    <!-- Password -->
                    <label for="password">Password</label>
                    <input type="password" id="password">
                    <div class="error-message" id="passwordError"></div>

                    <!-- Password Confirmation-->
                    <label for="passwordConfirm">Confirm Your Password</label>
                    <input type="password" id="passwordConfirm">
                    <div class="error-message" id="passwordConfirmError"></div>

                    <div class="error-message" id="emptyInputsError"></div>
                    <button type="button" id="submit-form" onclick="validateForm()">Sign Up</button>
                </form>
            </div>
            <div class="img-signUp">
                <p id="p-Si">Sign Up</p>
                <p id="p2-si">Already have an account</p>
                <a href="login.php" id="login-a" >Log In</a>
                
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

        let fnameRegex = /^[A-Z][a-z]{1,20}$/;
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,20}$/;
        let phoneRegex = /^\+?\d{1,4}-?\d{1,4}-?\d{1,9}$/;


        function validateForm() {
            let fnameInput = document.getElementById('fname');
            let emailInput = document.getElementById('email');
            let phoneInput = document.getElementById('phoneNumber');
            let passwordInput = document.getElementById('password');
            let passwordConfInput = document.getElementById('passwordConfirm');
    
            let fnameError = document.getElementById('fnameError');
            let emailError = document.getElementById('emailError');
            let phoneError = document.getElementById('phoneError');
            let passwordError = document.getElementById('passwordError');
            let passwordConfirmError = document.getElementById('passwordConfirmError');
            let emptyInputsError = document.getElementById('emptyInputsError');

            fnameError.innerText = '';
            phoneError.innerText = '';
            emailError.innerText = '';
            passwordError.innerText = '';
            passwordConfirmError.innerText = '';
            emptyInputsError.innerText = '';

            
    
            if (!fnameRegex.test(fnameInput.value)) {
                fnameError.innerText = 'Your first and last name should start with a capital letter!';
                return;
            }
    
            if (!emailRegex.test(emailInput.value)) {
                emailError.innerText = 'Invalid email address!';
                return;
            }

            if (!phoneRegex.test(phoneInput.value)) {
            phoneError.innerText = 'Phone number is invalid';
            return;
        }
    
            if (!passwordRegex.test(passwordInput.value)) {
                passwordError.innerText = 'Password must be 8-20 characters long and include at least one lowercase letter, one uppercase letter, and one digit!';
                return;
            }
    
            if (passwordInput.value !== passwordConfInput.value) {
                passwordConfirmError.innerText = 'Passwords do not match!';
                return;
            }


    
            alert('Form submitted successfully!');
        }


    </script>
    


    
</body>
</html>