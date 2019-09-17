<?php
class AuthorBook
{
    private $conn;
    public $id;
    public $authorBook;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

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
        print_r($stmt->errorInfo());

        return $result;
    }

    function readOne($id)
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $query = "SELECT
        books.book_id,
        books.author_id,
        books.title,
        books.book_image,
        authors.id
    FROM
        books
    LEFT JOIN
        authors
    ON
    authors.id = books.book_id
    WHERE
        books.author_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->authorBook = $row->author_id;
        print_r($stmt->errorInfo());
    }
}
