<?php 
include './databaseConnection';
include './user.php';
class userRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user){
        $conn = $this->connection;

        $id = $user->getID();
        $name = $user->getFname();
        $phone = $user->getPhoneNumber();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (ID,fname,phoneNumber,email,password) VALUES (?,?,?,?,?)";

        $statement = $conn->prepare($sql);
        $statement->execute([$id, $name, $phone, $email,$password]);
            
        echo "<script> alert('User has been inserted successfuly!'); </script>";
    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM user";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById($ID){
        $conn = $this->connection;

        $sql = "SELECT * FROM user WHERE ID='$ID'";

        $statement = $conn->query($sql);
        $user = $statement->fetch();

        return $user;
    }

    function updateUser($ID,$fname,$phoneNumber,$email,$password){
         $conn = $this->connection;

         $sql = "UPDATE user SET name=?, phone=?, email=?, password=? ";

         $statement = $conn->prepare($sql);

         $statement->execute([$ID,$fname,$phoneNumber,$email,$password]);

         echo "<script>alert('update was successful'); </script>";
    }

    function deleteUser($fname){
        $conn = $this->connection;

        $sql = "DELETE FROM user WHERE ID=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$ID]);

        echo "<script>alert('delete was successful'); </script>";
    }
}
?>