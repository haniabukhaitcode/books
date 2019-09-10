<?php
class Book
{
    // database connection and table name
    private $conn;
    private $table_name = "books";
    // object properties
    public $book_id;
    public $title;
    public $author_id;
    public $tag_id;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    //**Create**
    function create()
    {
        //sql
        $query = "INSERT INTO " . $this->table_name . "(title, author_id, tag_id) VALUES(:title, :author_id, :tag_id) ";
        //statement connection with prepare    
        $stmt = $this->conn->prepare($query);
        // **Controlling Values From User**
        // remving tags (htmlspecialchars)
        // allowing variables only (strip_tags)
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->tag_id = htmlspecialchars(strip_tags($this->tag_id));
        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":tag_id", $this->tag_id);
        $stmt->execute() ? header("Location: index.php") : false;
    }
    //**Read All**
    function readAll()
    {
        $query = " SELECT * FROM 
            " . $this->table_name . "
           ORDER BY 
           tag_id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    //**Count All Paging Books**
    public function countAll()
    {
        $query = "SELECT book_id FROM " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $totalRows = $stmt->rowCount();
        return $totalRows;
    }
    //**Read One ID**
    function readOne()
    {
        $query = "SELECT *
        FROM " . $this->table_name . "
        WHERE book_id = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->book_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->title = $row['title'];
        $this->author_id = $row['author_id'];
        $this->tag_id = $row['tag_id'];
    }
    //**Update**
    function update()
    {
        $query = "UPDATE
        " . $this->table_name . "
        SET
            title = :title,
            author_id = :author_id
            tag_id = :tag_id,
    
        WHERE
            book_id = :book_id";
        $stmt = $this->conn->prepare($query);
        //Control user Values
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->tag_id = htmlspecialchars(strip_tags($this->tag_id));
        $this->book_id = htmlspecialchars(strip_tags($this->book_id));
        //bindParam()
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author_id', $this->author_id);
        $stmt->bindParam(':tag_id', $this->tag_id);
        $stmt->bindParam(':book_id', $this->book_id);
        //ternery return 
        $stmtExec = $stmt->execute();
        $stmtExec ? header("Location: index.php") : print("Error in books.php update function");
    }
    //**Delete**
    public function delete($book_id)
    {
        $query = "DELETE FROM books WHERE book_id = :book_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":book_id", $book_id);
        $stmt->execute();
        if ($stmt) {
            header("Location: index.php");
        }
    }
}
