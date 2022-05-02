<?php 

class User {
    private $userId;
    private $username;
    private $password;
    private $email;

    public function __construct($userId=null, $username=null, $password=null, $email=null)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public static function login($user, mysqli $conn) {
        $q = "SELECT * FROM user WHERE username='$user->username' and password='$user->password'";
        return $conn->query($q);
    }

    public static function add(mysqli $conn, $user) {
        $q = "INSERT INTO user(username, password, email) VALUES ('$user->username', '$user->password', '$user->email')";
        return $conn->query($q);
    }

    public static function getAll(mysqli $conn) {
        $q = "SELECT * FROM user";
        return $conn->query($q);
    }

    public static function getByEmail(mysqli $conn, $email) {
        $q = "SELECT * FROM user WHERE email='$email'";
        return $conn->query($q);
    }
}

?>