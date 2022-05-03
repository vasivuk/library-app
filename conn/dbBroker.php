<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "library";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_errno) {
    exit("Neuspesno povezivanje sa bazom: ". $conn->connect_error);
}

?>