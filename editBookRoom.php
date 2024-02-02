
<?php
  
    $userId = $_GET['id'];
    include 'userRepository.php';

    
    
    $userRepository = new UserRepository();
    
    $user  = $userRepository->getUserById($userId);

    if(isset($_POST['editBtn'])){
        $id=$user['id'];
        $userID= $user['userID'];
        $nameb = $_POST['nameb'];
        $surnameb = $_POST['surnameb'];
        $emailb = $_POST['emailb'];
        $guests = $_POST['guests'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
       

        $userRepository->updateUser($roomID,$userID,$nameb,$surnameb,$emailb,$guests,$checkin,$checkout);
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

            <form id="bookingForm"  class="booking-form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
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
                <div class="submitbtn-edit">
                    <input type="submit" name="editBtn" value="save" id="submitbtn">
                </div>
            </form>
        </div>

    </main>

</body>
</html>

