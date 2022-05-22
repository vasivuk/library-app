<?php
require "util/util.php";
require "connection/dbBroker.php";
require "model/book.php";
require "handler/add.php";

session_start();
$userId = $_SESSION["user_id"];

$books = Book::getAllBooks($conn);
$booksInLibrary = Book::getAllUserBooks($conn, $userId);

$myBooks = $booksInLibrary->fetch_all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="css/style.css">
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Public Library</h1>
            <div class="logged-user"></div>
        </div>

        <input type="text" class="search" placeholder="Search a book...">
        
        <div class="card-container">
        <?php
            while ($book = $books->fetch_array()) :
        ?>
                <div class="card" data-index="<?php echo $book["bookid"]?>" data-user="
                    <?php
                       foreach ($myBooks as $myBook) {
                           if ($myBook[1] == $book["bookid"]) {
                               echo 1;
                               break;
                           }
                       }
                       
                    ?>">
                    <p class="author"><?php echo $book["author"]?></p>
                    <h1><?php echo $book["title"] ?></h1>
                    <p class="pages"><?php echo $book["pages"]?> pages</p>
                </div>
        <?php
        endwhile;
        ?>
        </div>

        <div class="buttons">
            <button class="add-btn">Add a New Book</button>
            <button class="add-library-btn">Add Books to Library</button>
            <a href="main.php">Back</a>
        </div>

        <!-- MODAL CONTENT -->
        <div class="new-book-modal" id="new-book-modal">
            <div class="modal-content">
                <button class="close">X</button>
                <form class="modal-form" method="post" action="">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" required>
                    <label for="author">Author:</label>
                    <input type="text" name="author" id="author" required>
                    <label for="pages">Pages:</label>
                    <input type="number" name="pages" id="pages" required>
                    <button type="submit" class="submit" name="submit">Add a Book</button>
                </form>
            </div>
        </div>


    </div>
    <script src="js/main.js"></script>
    <script src="js/allbooks.js"></script>
</body>
</html>