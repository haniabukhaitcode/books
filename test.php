<?php
class AuthorBook
{
    private $conn;
    public $id;
    public $authorbook;
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
        authors.id,
        GROUP_CONCAT(authors.author SEPARATOR ',') authors
    FROM
        books
    Left  JOIN
        authors
    ON
        authors.id = books.author_id

    WHERE authors.id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        print_r($stmt->errorInfo());

        return $result;
    }


    function readOne($id)
    {
        $query = "SELECT id, author FROM authors WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->authorbook = $row->authorbook;
    }
}
