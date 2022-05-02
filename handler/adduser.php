<?php

if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    $user = new User(null, $_POST['username'], $_POST['password'], $_POST['email']);
    $status = false;
    $dbUser = User::getByEmail($conn, $user->getEmail());
    if($dbUser->num_rows==0) {
        $status = User::add($conn, $user);
        
        header("Location: index.php");
    } else {
        Util::writeToConsole("Email is already in use");
    }

    if($status) {
        Util::writeToConsole("User created successfully.");
    } else {
        Util::writeToConsole("Error while creating the User.");
    }
}

?>