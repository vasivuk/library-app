<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Library</h1>
        <div class="card-container"></div>
        <div class="legend">
            <div class="box"></div>
            <p>: read</p>
        </div>
        <button class="add-btn">Add a Book</button>
        
        <!-- MODAL CONTENT -->
        <div class="new-book-modal" id="new-book-modal">
            <div class="modal-content">
                    <button class="close">X</button>
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title">
                    <label for="author">Author:</label>
                    <input type="text" name="author" id="author">
                    <label for="pages">Pages:</label>
                    <input type="number" name="pages" id="pages">
                    <div class="radio"><input type="radio" name="read" id="isRead">Read</div>
                    <div class="radio"><input type="radio" name="read" id="isNotRead">Not read</div>
                    <button class="submit">Add a Book</button>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>