<?php

    session_start();
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
    <header class="headerContainer-book">
        <div class="list-book">

            <ul>
            <?php
                
                if (isset($_SESSION['user_id'])):
                ?>
                
                <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                
                <li><a href="login.php" target="_blank">Log-in</a></li>
                <?php endif; ?>
                <li><a href="signUp.php" target="_blank">Sign-up</a></li>
                <li><a href="login.php" target="_blank">Log-in</a></li>
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
         <div class="check-in-form">
            <form action="">
            <div class="checkIN">
                    <label for="checkin">Check-in</label>
                   <input type="date" id="checkin" name="checkin"> 
            </div>
            <div class="guests">
                    <label for="guests">Guests</label>
                    <input type="number" id="guests" name="guests">
            </div>              
            <div class="checkOUT">
                   <label for="checkout">Check-out</label>     
                <input type="date" id="checkout" name="checkout" >
                
            </div>
                    
            </form>

        </div>

        <div class="avalaible">
            <a><img src="./imgs/hotel bedroom5.jpg" style="height: 150px;"></a>
            <p>Dec 5,2023-Dec 7,2023<br>
            Junior Room</p>
            <div class="cmimi">
                <p>$90.90</p>
                <p>Including taxes and fees</p>
            </div>
            <div class="searchDates"> 
                <button id="sd">Search Dates</button> 
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
                <button id="sd">Search Dates</button> 
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
                <button id="sd">Search Dates</button> 
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
                <button id="sd">Search Dates</button> 
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





    
        

    </main>

</body>
</html>