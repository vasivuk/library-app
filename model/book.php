<?php

class Book {
    private $bookId;
    private $title;
    private $author;
    private $pages;

    public function __construct($title=null,$author=null,$pages=null)
    {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
    }

    function getBookId() {
        return $this->bookId;
    }

    function setBookId($bookId) {
        $this->bookId = $bookId;
    }

    function getTitle() {
        return $this->title;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function getAuthor() {
        return $this->author;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function getPages() {
        return $this->pages;
    }

    function setPages($pages) {
        $this->pages = $pages;
    }

    public static function getAllUserBooks(mysqli $conn, $id) {
        $query = "SELECT * FROM userbooks AS b1 INNER JOIN book AS b2 ON(b1.bookid = b2.bookid) WHERE userid=$id";
        return $conn->query($query);
    }

    public static function add(mysqli $conn, Book $book) {
        $query = "INSERT INTO book(title, author, pages) VALUES('$book->title', '$book->author', '$book->pages')";
        Util::writeToConsole($query);
        return $conn->query($query);
    }

}

?>