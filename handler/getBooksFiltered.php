<?php

include "../connection/dbBroker.php";
include "../model/book.php";

session_start();
$userId = $_SESSION["user_id"];

if (!isset($_GET["filter"])) {
    echo "Filter not sent!";
} else {
    $pom=$_GET["filter"];
    $books = Book::getAllBooksFiltered($conn, $pom);
    $booksInLibrary = Book::getAllUserBooks($conn, $userId);

    $booksArr = $booksInLibrary->fetch_all(); ?>
    <?php
        while ($book = $books->fetch_array()) :
    ?>  
            <div class="card" data-index="<?php echo $book["bookid"]?>" data-user="
                <?php
                   foreach ($booksArr as $b1) {
                       if ($b1[1] == $book["bookid"]) {
                           echo 1;
                           break;
                       }
                   } ?>">
                <p class="author"><?php echo $book["author"]?></p>
                <h1><?php echo $book["title"] ?></h1>
                <p class="pages"><?php echo $book["pages"]?> pages</p>
            </div>
    <?php
    endwhile; ?>
    <?php
}

?>