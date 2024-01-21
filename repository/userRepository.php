<?php 
include_once '../database/databaseConnection.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user){
        $conn = $this->connection;

        $fname = $user->getFname();
        $phoneNumber = $user->getPhoneNumber();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (fname,phoneNumber,email,password) VALUES (?,?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$fname,$phoneNumber,$email,$password]);

        echo "<script> alert('User has been inserted successfuly!'); </script>";
    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM user";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM user WHERE id='$id'";

        $statement = $conn->query($sql);
        $user = $statement->fetch();

        return $user;
    }

    function updateUser($fname,$phoneNumber,$email,$password){
         $conn = $this->connection;

         $sql = "UPDATE user SET fname=?, phoneNumber=?, email=?, password=? ";

         $statement = $conn->prepare($sql);

         $statement->execute([$fname,$phoneNumber,$email,$password]);

         echo "<script>alert('update was successful'); </script>";
    }

    // function deleteUser($name){
    //     $conn = $this->connection;

    //     $sql = "DELETE FROM user WHERE id=?";

    //     $statement = $conn->prepare($sql);

    //     $statement->execute([$id]);

    //     echo "<script>alert('delete was successful'); </script>";
    // }
}
?>