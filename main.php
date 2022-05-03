<?php
require "util/util.php";
require "conn/dbBroker.php";
require "model/book.php";
require "handler/add.php";
require "handler/delete.php";

session_start();

$userId = $_SESSION["user_id"];

$books = Book::getAllUserBooks($conn, $userId);

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
            <h1><?php echo $_SESSION["username"]?>'s Library</h1>
            <div class="logged-user"></div>
        </div>
        <div class="card-container">
        <?php
            while ($book = $books->fetch_array()) :
        ?>
                <div class="card" data-index="<?php echo $book["bookid"]?>">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $book["bookid"]?>">
                        <input type="hidden" name="userid" value="<?php echo $userId?>">
                        <button class="remove-btn" name="remove-btn" type="submit">x</button>
                    </form>
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
            <a href="allbooks.php">Search books</a>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>