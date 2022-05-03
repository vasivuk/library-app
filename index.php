<?php

require "util/util.php";
require "dbBroker.php";
require "model/user.php";
require "handler/adduser.php";

session_start();

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $u = new User(null, $user, $pass, null);

    $loggedUser = User::login($u, $conn);

    if($loggedUser->num_rows==1) {
        $_SESSION["user_id"] = $loggedUser->fetch_array()["userid"];
        
        header("Location: main.php");
        exit();
    } else {

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<body>
    <div class="login-container">
        <form action="#" method="POST">
            <label for="username">Username:</label>
            <input
                type="text"
                name="username"
                id="username"
            >

            <label for="password">Password:</label>
            <input
                type="password"
                name="password"
                id="password"
            >

            <button type="">Login</button>
        </form>
        <a href="createAccount.php">Create Account</a>
    </div>
</body>
</html>