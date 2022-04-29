<?php

if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['author']) && isset($_POST['pages'])) {
    $book = new Book($_POST['title'], $_POST['author'], $_POST['pages']);
    $status = Book::add($conn, $book);

    if($status) {
        Util::writeToConsole("Book added successfully.");
    } else {
        Util::writeToConsole("Error while adding a book.");
    }
}

?>