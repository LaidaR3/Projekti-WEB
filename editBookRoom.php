
<?php
  
    $roomID = $_GET['id'];
    include 'userRepository.php';

    
    
    $userRepository = new UserRepository();
    
    $bookroom  = $userRepository->getUserByRoomID($roomID);

    if(isset($_POST['edit-Btn'])){
        $userID= $bookroom['roomID'];
        $nameb = $_POST['nameb'];
        $surnameb = $_POST['surnameb'];
        $emailb = $_POST['emailb'];
        $guests = $_POST['guests'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
       

        $userRepository->updateReservation($roomID, $userID, $nameb, $surnameb, $emailb, $guests, $checkin, $checkout);

        header("location:RoomsDashboard.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now - Monvelli</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
</head>
<body>

    <main>
        <div class="check-in-form-edit" id="checkInForm-edit">

            <form id="bookingForm"  class="booking-form" method="POST" >
                <div class="name-b">
                    <label for="name-b">Name</label>
                    <input type="text" id="name-b" name="nameb" value="<?=$bookroom['nameb']?>">
                   

                    <label for="surname-b">Surname</label>
                    <input type="text" id="surname-b" name="surnameb" value="<?=$bookroom['surnameb']?>">
                        
                </div>
                <div class = "errors">
                    <div class="error-message" id="nameError"></div>
                    <div class="error-message" id="lnameError"></div>
                </div>
                <div class="e-mail-guest">
                    <label for="e-mail">Email</label>
                    <input type="text" id="e-mail" name="emailb" value="<?=$bookroom['emailb']?>">
                    

                    <label for="guests">Guests</label>
                    <input type="number" id="guests" name="guests"value="<?=$bookroom['guests']?>">
                </div>
                <div class = "errors">
                    <div class="error-message" id="emailError"></div>
                    <div class="error-message" id="guestError"></div>
                </div>
                <div class="checkIN">
                    <label for="checkin">Check-in</label>
                    <input type="date" id="checkin" name="checkin" value="<?=$bookroom['checkin']?>">
                    <label for="checkout">Check-out</label>
                    <input type="date" id="checkout" name="checkout"value="<?=$bookroom['checkout']?>">
                </div>
                <div class="submitbtn-edit">
                    <input type="submit" name="edit-Btn" value="save" id="submitbtn">
                </div>
            </form>
        </div>

    </main>

</body>
</html>

