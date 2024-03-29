<?php
class AuthorBook
{
    private $conn;
    public $id;
    public $author;

    public function __construct($db)
    {
        $this->conn = $db;
    }



    function fetchAuthorBooks($id)
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $query = "SELECT
        books.id,
        books.author_id,
        books.title,
        books.book_image,
        authors.author author
    FROM
        books
    JOIN
        authors
    ON
    authors.id = books.author_id
    WHERE
        books.author_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        print_r($stmt->errorInfo());
    }
}
