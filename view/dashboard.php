
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
             <tr>
                <th>ID</th>
                 <th>NAME</th>
                 <th>PHONE</th>
                 <th>EMAIL</th>
                 <th>PASSWORD</th>
                 <!-- <th>Edit</th>
                 <th>Delete</th> -->
             </tr>

             <?php 
             include 'C:\xampp\htdocs\Projekti-WEB\repository\userRepository.php';
              
             
             $userRepository = new userRepository();

             $users = $userRepository->getAllUsers();

             foreach($users as $user){
                echo 
              "
        <tr>
            <td>{$user['ID']}</td>
            <td>{$user['fname']}</td>
            <td>{$user['phoneNumber']}</td>
            <td>{$user['email']}</td>
            <td>{$user['password']}</td>
            <!--  <td><a href='edit.php?id={$user['ID']}'>Edit</a></td>
            <td><a href='delete.php?id={$user['ID']}'>Delete</a></td> -->
        </tr>
    ";
             }
             ?>
    </table>
</body>
</html>