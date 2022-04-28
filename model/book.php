<?php

class Book {
    private $bookId;
    private $title;
    private $author;
    private $pages;

    public function __construct($id=null,$username=null,$password=null,$pages=null)
    {
        $this->bookId = $id;
        $this->title = $username;
        $this->author = $password;
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
}

?>