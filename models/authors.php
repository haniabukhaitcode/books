<?php
class Author
{
    // database connection and table title
    private $conn;
    private $table_name = "authors";
    // object properties
    public $id;
    public $author;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // used by select drop-down list
    function read()
    {
        //select all data
        $query = "SELECT
                    id, author
                FROM
                    " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    function readOne($id)
    {
        $query = "SELECT id, author FROM authors WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->author = $row->author;
    }


    function update($id)

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
        // remving tags (htmlspecialchars)
        // allowing variables only (strip_tags)
        $this->author = htmlspecialchars(strip_tags($this->author));



        // bind values
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: index.php");
    }

    public function delete($id)
    {
        $query = "DELETE FROM authors WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        if ($stmt) {
            header("Location: index.php");
        }
    }
    function create()
    {

        //sql
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $bookQuery = "INSERT INTO " . $this->table_name . "(author) VALUES(:author) ";
        $stmt = $this->conn->prepare($bookQuery);
        $this->author = htmlspecialchars(strip_tags($this->author));

        // bind values
        $stmt->bindParam(":author", $this->author);
        $stmt->execute();
        print_r($stmt->errorInfo());

        // header("Location: index.php");
    }
}
