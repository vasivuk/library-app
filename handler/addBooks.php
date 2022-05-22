<?php
require "../connection/dbBroker.php";
require "../util/util.php";
require "../model/book.php";

session_start();

if (isset($_POST['booksToAdd'])) {
    $booksToAdd = $_POST['booksToAdd'];
    $bookArray =  json_decode(stripslashes($booksToAdd), true);
    foreach ($bookArray as $bookId) {
        $status = Book::addToUser($conn, $bookId, $_SESSION["user_id"]);
        if ($status) {
            echo "Book added successfully!\n";
        } else {
            echo "Error while adding a book.\n";
        }
    }
}
