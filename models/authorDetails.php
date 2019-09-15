<?php
class AuthorDetails
{
    // database connection and table name
    private $conn;
    public $id;
    public $author;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //**Read All**
    function readAll()
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $query = "SELECT
        books.book_id,
        books.title,
        books.book_image,
        authors.author,
    FROM
        books
  Left  JOIN
        authors
    ON
        authors.id = books.author_id

    GROUP BY
        books.book_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
        print_r($stmt->errorInfo());
    }
    //**Count All Paging Books**
    function readOne($id)
    {
        $query = "SELECT id, author FROM authors WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->author = $row->author;
    }
}
