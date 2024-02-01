<?php
    $userId = $_GET['id'];
    include_once '../repository/userRepository.php';
    
    $userRepository = new UserRepository();
    
    $user  = $userRepository->getUserById($userId);

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
                    <input type="text" id="fname"  name="fname">
                    <div class="error-message" id="fnameError"></div>
                    
                    <!-- Phone Number -->
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" id="phoneNumber"  name="phoneNumber">
                    <div class="error-message" id="phoneError"></div>

                    <!-- Email -->
                    <label for="email">E-mail</label>
                    <input type="text" id="email"  name="email">
                    <div class="error-message" id="emailError"></div>

                    <!-- Password -->
                    <label for="password">Password</label>
                    <input type="password" id="password"  name="password">
                    <div class="error-message" id="passwordError"></div>

                    

                    <div class="error-message" id="emptyInputsError"></div>
                    <input type="submit" name="editBtn" value="save">
                </form>
                <?php
                 include_once './registerController.php';?>
            </div>
            <div class="img-signUp">
                <p id="p-Si">Sign Up</p>
                <p id="p2-si">Already have an account</p>
                <a href="login.php" id="login-a" >Log In</a>
                
            </div>

        </div>
    </main>


    <?php 
        if(isset($_POST['editBtn'])){
            $ID = $user['ID'];
            $fname = $_POST['Fname'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];
            $password = $_POST['password'];
           

            $userRepository->updateUser($id,$name,$surname,$email,$username,$password);
            header("location:dashboard.php");
        }
    ?>

</body>
</html>