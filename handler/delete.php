<?php

if (isset($_POST['remove-btn']) && isset($_POST['id']) && isset($_POST['userid'])) {
    $status = Book::deleteUserBook($conn, $_POST['id'], $_POST['userid']);

    if ($status) {
        Util::writeToConsole("Book deleted successfully.");
    } else {
        Util::writeToConsole("Error while deleting a book.");
    }
}
