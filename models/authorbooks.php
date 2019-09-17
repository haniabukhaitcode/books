<?php
class AuthorBook
{
    private $conn;
    private $table_name = "books";
    public $book_id;
    public $title;
    public $author_id;
    public $book_image;
    public $authorbooks;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        $query = "SELECT
        books.book_id,
        books.title,
        books.book_image,
        authors.author,
    FROM
        books
    LEFT JOIN
        authors
    ON
    authors.id = books.author_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function readOne($id)
    {
        $query = "SELECT
        books.book_id,
        books.title,
        books.book_image,
        authors.author,
        authors.id
    FROM
        books
    LEFT JOIN
        authors
    ON
        authors.id = books.author_id
    WHERE
        author_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->title = $row->title;
        $this->author_id = $row->author;
        $this->book_image = $row->book_image;
    }
}