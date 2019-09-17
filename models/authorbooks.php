<?php
class AuthorBook
{
    private $conn;

    public $book_id;
    public $title;
    public $author_id;
    public $tag_id;
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
        authors.author
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
        authors.id author
    FROM
        books
    LEFT JOIN
        authors
    ON
        authors.id = books.author_id
    WHERE
    books.book_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->title = $row->title;
        $this->author_id = $row->author;
        $this->book_image = $row->book_image;
    }
}
