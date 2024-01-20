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

        $name = $user->getName();
        $phone = $user->getPhone();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (name,phone,email,,password) VALUES (?,?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$name,$phone,$email,$password]);

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

    function updateUser($name,$phone,$email,$password){
         $conn = $this->connection;

         $sql = "UPDATE user SET name=?, phone=?, email=?, password=? ";

         $statement = $conn->prepare($sql);

         $statement->execute([$name,$phone,$email,$password]);

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