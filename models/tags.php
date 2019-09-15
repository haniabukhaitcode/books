<?php
class Tag
{
    // database connection and table title
    private $conn;
    private $table_name = "tags";
    // object properties
    public $id;
    public $tag;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // used by select drop-down list
    function read()
    {
        //select all data
        $query = "SELECT
                    id, tag
                FROM
                    " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    function readOne($id)
    {
        $query = "SELECT id, tag FROM tags WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->tag = $row->tag;
    }


    function update($id)

    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $bookQuery = "UPDATE
        " . $this->table_name . "
        SET
            tag = :tag
    
        WHERE
            
        id = :id";
        //statement connection with prepare    
        $stmt = $this->conn->prepare($bookQuery);
        // **Controlling Values From User**
        // remving tags (htmlspecialchars)
        // allowing variables only (strip_tags)
        $this->tag = htmlspecialchars(strip_tags($this->tag));



        // bind values
        $stmt->bindParam(":tag", $this->tag);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: index.php");
    }

    public function delete($id)
    {
        $query = "DELETE FROM tags WHERE id = :id";
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
        $bookQuery = "INSERT INTO " . $this->table_name . "(tag) VALUES(:tag) ";
        $stmt = $this->conn->prepare($bookQuery);
        $this->tag = htmlspecialchars(strip_tags($this->tag));

        // bind values
        $stmt->bindParam(":tag", $this->tag);
        $stmt->execute();
        print_r($stmt->errorInfo());

        // header("Location: index.php");
    }
}
