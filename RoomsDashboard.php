
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<header class="headerContainer">
    <div class="logo">
        <a href="index.php"><img src="imgs/logo1.png" alt="Logo"></a>
    </div>
    
</header>
<body>
    <table class="userDashboard">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>EMAIL</th>
            <th>GUESTS</th>
            <th>CHECK IN</th>
            <th>CHECK OUT</th>
            <th>EDIT USER</th>
            <th>DELETE USER</th>
        </tr>

        <?php 
             include './userRepository.php';

             
             

             
             $userRepository = new userRepository();

             $users = $userRepository->getAllUsers();

             foreach($users as $user){
                echo 
            "
                <tr>
                    <td>{$book_room['userID']}</td>
                    <td>{$book_room['nameb']}</td>
                    <td>{$book_room['surnameb']}</td>
                    <td>{$book_room['emailb']}</td>
                    <td>{$book_room['guests']}</td>
                    <td>{$book_room['checkin']}</td>
                    <td>{$book_room['checkout']}</td>
                    <td><a href='edit.php?id=$book_room[ID]'>Edit</a></td>
                    <td><a href='delete.php?id=$book_room[ID]'>Delete</a></td>
                </tr>
            ";
             }
             ?>



    </table>
</body>
</html>