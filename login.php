    <?php 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit-form'])){
        $perdoruesi = $_POST['email'];
        $fjalekalimi = $_POST['password'];
        echo 'Perdoruesi' . $perdoruesi . 'Fjalekalimi:' . $fjalekalimi;
        exit();
    } else {
        echo 'Ju nuk e keni shtyp butonin RUAJ';
    }
}

    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In - Monvelli</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="containerLogIn">
            <div id="mainIMG-Login">
                <p id="p1-Login">Welcome back</p>
                <a href="./signup.php"><button type="button" class="signUp-button">Sign Up</button></a>
                
            </div>

        <div class="loginforma">
            <form id="formLogIn" method="POST"  action="<?php echo $_SERVER["PHP_SELF"];?>">
                <a href="index.php"><img src="./imgs/logo1.png" height="40px"></a><br>
                <p id="log-in">Log In</p>
                <label for="email">E-mail</label>
                            <input type="text" id="email" name="email">
                            <div class="errorMessage" id="emailError"></div>

                <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                            <div class="errorMessage" id="passwordError"></div>


                            <button type="button" id="submit-form" onclick="validateForm2()">Log in</button>
                            


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
            function validateForm2() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}\-{|[\]\\:";'<>?,./]).{8,}$/;
        let emailInput = document.getElementById('email');
        let passwordInput = document.getElementById('password');

        let emailError = document.getElementById('emailError');
        let passwordError = document.getElementById('passwordError');

        passwordError.innerText = '';
        emailError.innerText = '';

        if (!emailRegex.test(emailInput.value)) {
            emailError.innerText = 'Forma e emailit tuaj eshte invalide';
            return;
        }
        if (!passwordRegex.test(passwordInput.value)) {
            passwordError.innerText = 'Invalid password';
            return;
        }
        window.location.href = 'BookNow.php';
        alert('You have logged in successfully');
    }


        </script>
    </body>
    </html>