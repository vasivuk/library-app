<?php
require "../dbBroker.php";
require "../util/util.php";
require "../model/book.php";

if (isset($_POST['booksToAdd'])) {
    $booksToAdd = $_POST['booksToAdd'];
    $bookArray =  json_decode(stripslashes($booksToAdd), true);
    foreach($bookArray as $bookId) {
        echo $bookId;
        $status = Book::addToUser($conn, $bookId, 1);
        if($status) {
            Util::writeToConsole("Book added successfully.");
        } else {
            Util::writeToConsole("Error while adding a book.");
        }
    }
}

?>