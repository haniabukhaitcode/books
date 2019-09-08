<?php
class Book
{

    // database connection and table name
    private $conn;
    private $table_name = "books";

    // object properties
    public $id;
    public $title;
    public $author_id;
    public $tag;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //**Create**
    function create()
    {
        //sql
        $query = "INSERT INTO " . $this->table_name . "(title, author_id, tag) VALUES(:title, :author_id, :tag) ";
        //statement connection with prepare    
        $stmt = $this->conn->prepare($query);
        // **Controlling Values From User**
        // remving tags (htmlspecialchars)
        // allowing variables only (strip_tags)
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->tag = htmlspecialchars(strip_tags($this->tag));
        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":tag", $this->tag);

        $stmt->execute() ? header("Location: index.php") : false;
    }

    //**Read All**
    function readAll()
    {
        $query = " SELECT * FROM 
            " . $this->table_name . "
           ORDER BY 
           tag ASC";


        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //**Count All Paging Books**
    public function countAll()
    {
        $query = "SELECT id FROM " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $totalRows = $stmt->rowCount();
        return $totalRows;
    }
    //**Read One ID**
    function readOne()
    {

        $query = "SELECT *
        FROM " . $this->table_name . "
        WHERE id = ?
        LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->tag = $row['tag'];
        $this->author_id = $row['author_id'];
    }



    //**Update**
    function update()
    {
        $query = "UPDATE
        " . $this->table_name . "
        SET
            title = :title,
            tag = :tag,
            author_id = :author_id
    
        WHERE
            id = :id";

        $stmt = $this->conn->prepare($query);

        //Control user Values
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->tag = htmlspecialchars(strip_tags($this->tag));
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bindParam()
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author_id', $this->author_id);
        $stmt->bindParam(':tag', $this->tag);
        $stmt->bindParam(':id', $this->id);

        //ternery return 
        $stmtExec = $stmt->execute();

        $stmtExec ? header("Location: index.php") : print("Error in books.php update function");
    }

    //**Delete**
    public function delete($id)
    {
        $query = "DELETE FROM books WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        if ($stmt) {
            header("Location: index.php");
        }
    }
}
