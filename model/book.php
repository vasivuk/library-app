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
}

?>