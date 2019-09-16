<?php
class AuthorBook
{
    private $conn;
    private $table_name = "books";
    public $id;
    public $authorbooks;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    function read()
    {
        $query = "SELECT
                    book_id, title, book_image
                FROM
                    " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function readOne($book_id)
    {
        $query = "SELECT  book_id, title, book_image, author_id FROM books WHERE book_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $book_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->authorbooks = $row->authorbooks;
    }
}
