<?php
require "util/util.php";
require "dbBroker.php";
require "model/book.php";
require "handler/add.php";

session_start();
$userId = $_SESSION["user_id"];

$books = Book::getAllBooks($conn, $userId);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="css/style.css">
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
                <div class="card" data-index="<?php echo $book["bookid"]?>">
                    <!-- <button class="remove-btn">x</button> -->
                    <p class="author"><?php echo $book["author"]?></p>
                    <h1><?php echo $book["title"] ?></h1>
                    <p class="pages"><?php echo $book["pages"]?> pages</p>
                </div>
        <?php
        endwhile;
        ?>
        </div>
        <!-- <div class="legend">
            <div class="box"></div>
            <p>: read</p>
        </div> -->
        <div class="buttons">
            <button class="add-btn">Add a Book</button>
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
                    <!-- <div class="radio"><input type="radio" name="read" id="isRead">Read</div>
                    <div class="radio"><input type="radio" name="read" id="isNotRead">Not read</div> -->
                    <button type="submit" class="submit" name="submit">Add a Book</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>