<?php 
include './databaseConnection.php';
include './user.php';
class userRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user){
        $conn = $this->connection;

        $ID = $user->getID();
        $name = $user->getFname();
        $phone = $user->getPhoneNumber();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (ID,fname,phoneNumber,email,password) VALUES (?,?,?,?,?)";

        $statement = $conn->prepare($sql);
        $statement->execute([$ID, $name, $phone, $email,$password]);
            
        echo "<script> alert('User has been inserted successfuly!'); </script>";
    }
    function getUserByEmail($email) {
        $conn = $this->connection;

        $sql = "SELECT * FROM user WHERE email = ?";

        $statement = $conn->prepare($sql);
        $statement->execute([$email]);

        return $statement->fetch();
    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM user";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getAllBookRooms(){
        $conn = $this->connection;
    
        $sql = "SELECT * FROM bookroom";
    
        $statement = $conn->query($sql);
        $bookRooms = $statement->fetchAll();
    
        return $bookRooms;
    }
    

    function getUserById($ID) {
        $conn = $this->connection;

        $sql = "SELECT * FROM user WHERE ID = ?";

        $statement = $conn->prepare($sql);
        $statement->execute([$ID]);

        return $statement->fetch();
    }

    function getUserByRoomID($roomID) {
        $conn = $this->connection;

        $sql = "SELECT * FROM bookroom WHERE roomID = ?";

        $statement = $conn->prepare($sql);
        $statement->execute([$roomID]);

        return $statement->fetch();
    }

    function updateUser($ID,$fname,$phoneNumber,$email,$password){
         $conn = $this->connection;

         $sql = "UPDATE user SET fname=?, phoneNumber=?, email=?, password=? where ID = ?";

         $statement = $conn->prepare($sql);

         $statement->execute([$fname,$phoneNumber,$email,$password,$ID]);

         echo "<script>alert('Update was successful'); </script>";
    }

    function updateReservation($roomID, $userID, $name, $surname, $email, $guests, $checkin, $checkout) {
        $conn = $this->connection;
    
        $sql = "UPDATE bookroom SET nameb=?, surnameb=?, emailb=?, guests=?, checkin=?, checkout=? WHERE roomID = ?";
    
        $statement = $conn->prepare($sql);
    
        $statement->execute([$name, $surname, $email, $guests, $checkin, $checkout, $roomID]);;
    
        echo "<script>alert('Update was successful');</script>";
    }
    

    function deleteUser($ID) {
        $conn = $this->connection;
    
        $sql = "DELETE FROM user WHERE ID=?";
    
        $statement = $conn->prepare($sql);
    
        $statement->execute([$ID]);
    
        echo "<script>alert('User was deleted was successfully');</script>";
    }
    




    function deleteRoomReservation($roomID) {
    $conn = $this->connection;

    $sql = "DELETE FROM bookroom WHERE roomID=?";

    $statement = $conn->prepare($sql);

    $statement->execute([$roomID]);

    echo "<script>alert('Your reservation was deleted successfully');</script>";
}
}
?>