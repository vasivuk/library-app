<?php

require "util/util.php";
require "dbBroker.php";
require "model/user.php";
require "handler/adduser.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<body>
    <div class="login-container">
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="username">Username:</label>
            <input
                type="text"
                name="username"
                id="username"
                required
            >

            <label for="password">Password:</label>
            <input
                type="password"
                name="password"
                id="password"
                required
            >

            <button type="submit" name="submit">Create Account</button>
        </form>
    </div>
</body>
</html>