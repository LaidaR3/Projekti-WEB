<?php 
include './databaseConnection.php';
include './user.php';
class userRepository{
    private $connection;

    function __construct(){
        $conn = new databaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user){
        $conn = $this->connection;

        $ID = $user->getId();
        $name = $user->getFname();
        $phone = $user->getPhoneNumber();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (ID,fname,phoneNumber,email,password) VALUES (?,?,?,?,?)";

        $statement = $conn->prepare($sql);
        $statement->execute([$ID, $name, $phone, $email,$password]);
            
        echo "<script> alert('User has been inserted successfuly!'); </script>";
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
    
        $sql = "SELECT * FROM book_room";
    
        $statement = $conn->query($sql);
        $bookRooms = $statement->fetchAll();
    
        return $bookRooms;
    }
    

    function getUserByIDs($ID, $userID) {
        $conn = $this->connection;
    
        $sql = "SELECT * FROM user WHERE ID = ? AND userID = ?";
    
        $statement = $conn->prepare($sql);
        $statement->execute([$ID, $userID]);
    
        return $statement->fetch();
    

    function updateUser($ID,$fname,$phoneNumber,$email,$password){
         $conn = $this->connection;

         $sql = "UPDATE user SET fname=?, phoneNumber=?, email=?, password=? where ID = ?";

         $statement = $conn->prepare($sql);

         $statement->execute([$fname,$phoneNumber,$email,$password,$ID]);

         echo "<script>alert('Update was successful'); </script>";
    }

    function updateReservation($roomID, $userID, $name, $surname, $email, $guests, $checkin, $checkout) {
        $conn = $this->connection;
    
        $sql = "UPDATE room_reservation SET name=?, surname=?, email=?, guests=?, checkin=?, checkout=? WHERE roomID = ?";
    
        $statement = $conn->prepare($sql);
    
        $statement->execute([$name, $surname, $email, $guests, $checkin, $checkout, $roomID]);
    
        echo "<script>alert('Update was successful');</script>";
    }
    

    function deleteUser($ID) {
        $conn = $this->connection;
    
        $sql = "DELETE FROM user WHERE ID=?";
    
        $statement = $conn->prepare($sql);
    
        $statement->execute([$ID]);
    
        echo "<script>alert('Delete was successful');</script>";
    }
    
    }

?>