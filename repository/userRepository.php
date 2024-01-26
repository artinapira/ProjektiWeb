<?php 
include __DIR__ . '/../database/databaseConnection.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }


    function insertUser($user){

        $conn = $this->connection;

        $id = $user->getId();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $userType = 'user';

        $sql = "INSERT INTO users (id,username,email,password, user_type) VALUES (?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$id,$username,$email,$password,$userType]);

        echo "<script> alert('User has been inserted successfuly!'); </script>";

        header("location:login.php");

    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM users";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM users WHERE id='$id'";

        $statement = $conn->query($sql);
        $user = $statement->fetch();

        if ($user && isset($user['user_type'])) {
            $user['user_type'] = trim($user['user_type'], "'");
        }

        return $user;
    }

    function updateUser($id,$username,$email,$password){
        $conn = $this->connection;

        $sql = "UPDATE users SET username=?, email=?, password=? WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$username,$email,$password,$id]);

        echo "<script>alert('update was successful'); </script>";
    } 

    function deleteUser($id){
        $conn = $this->connection;

        $sql = "DELETE FROM users WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        echo "<script>alert('delete was successful'); </script>";
   } 

   function userExists($username, $password) {
        $conn = $this->connection;

        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$username, $password]);

        // Fetch the user data
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists
        return ($user !== false);
    }

}

//  $userRepo = new UserRepository;

//  $userRepo->updateUser('1111','SSS','SSS','SSS','SSS','SSS');

?>