<?php

class Book
{
    private $bookId;
    private $title;
    private $author;
    private $pages;


    public function __construct($title=null, $author=null, $pages=null)
    {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
    }

    public function getBookId()
    {
        return $this->bookId;
    }

    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function setPages($pages)
    {
        $this->pages = $pages;
    }

    public static function getAllUserBooks(mysqli $conn, $id)
    {
        $query = "SELECT * FROM userbooks AS b1 INNER JOIN book AS b2 ON(b1.bookid = b2.bookid) WHERE userid=$id";
        return $conn->query($query);
    }

    public static function getAllBooks(mysqli $conn)
    {
        $query = "SELECT * FROM book";
        return $conn->query($query);
    }

    public static function getAllBooksFiltered(mysqli $conn, $filter)
    {
        $query = "SELECT * FROM book WHERE title LIKE'%$filter%'";
        return $conn->query($query);
    }

    public static function add(mysqli $conn, Book $book)
    {
        $query = "INSERT INTO book(title, author, pages) VALUES('$book->title', '$book->author', '$book->pages')";
        return $conn->query($query);
    }

    public static function deleteUserBook(mysqli $conn, $bookId, $userId)
    {
        $query = "DELETE FROM userbooks WHERE bookid=$bookId AND userid=$userId";
        return $conn->query($query);
    }
    
    public static function addToUser(mysqli $conn, $bookId, $userId)
    {
        $query = "INSERT INTO userbooks(userid, bookid) VALUES('$userId', '$bookId')";
        return $conn->query($query);
    }
}
