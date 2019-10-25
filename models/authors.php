<?php
class Author
{
    private $conn;
    private $table_name = "authors";
    public $id;
    public $author;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function fetchAll()
    {
        $query = "SELECT
                    id, author
                FROM
                    " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function viewOneAuthor($id)
    {
        $query = "SELECT id, author FROM authors WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->author = $row->author;
    }


    function updateAuthor($id)
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $bookQuery = "UPDATE
        " . $this->table_name . "
        SET
            author = :author
    
        WHERE
        id = :id";
        //statement connection with prepare    
        $stmt = $this->conn->prepare($bookQuery);
        // **Controlling Values From User**
        $this->author = htmlspecialchars(strip_tags($this->author));

        // bind values
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: index.php");
    }

    public function deleteAuthor($id)
    {
        $query = "DELETE FROM authors WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        if ($stmt) {
            header("Location: index.php");
        }
    }

    function createAuthor()
    {

        //sql
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $bookQuery = "INSERT INTO " . $this->table_name . "(author) VALUES(:author) ";
        $stmt = $this->conn->prepare($bookQuery);
        $this->author = htmlspecialchars(strip_tags($this->author));

        // bind values
        $stmt->bindParam(":author", $this->author);
        $stmt->execute();
        return $stmt;
        print_r($stmt->errorInfo());

        // header("Location: index.php");
    }
}
