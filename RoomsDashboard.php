
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

             $users = $userRepository->getAllBookRooms();

             foreach($users as $bookroom){
                echo "
                    <tr>
                        <td>{$bookroom['roomID']}</td>
                        <td>{$bookroom['nameb']}</td>
                        <td>{$bookroom['surnameb']}</td>
                        <td>{$bookroom['emailb']}</td>
                        <td>{$bookroom['guests']}</td>
                        <td>{$bookroom['checkin']}</td>
                        <td>{$bookroom['checkout']}</td>
                        <td><a href='edit.php?id={$bookroom['userID']}'>Edit</a></td>
                        <td><a href='delete.php?id={$bookroom['userID']}'>Delete</a></td>
                    </tr>
                ";
             }
             ?>

    </table>
</body>
</html>
