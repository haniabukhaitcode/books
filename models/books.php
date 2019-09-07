<?php
class Book
{

    // database connection and table name
    private $conn;
    private $table_name = "books";

    // object properties
    public $id;
    public $title;
    public $author;
    public $tag_id;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    //**Create**
    function create()
    {
        //sql
        $query = "INSERT INTO " . $this->table_name .
            "SET title=:title, author=:author, tag_id=:tag_id";

        //statement connection with prepare    
        $stmt = $this->conn->prepare($query);

        // **Controlling Values From User**
        // remving tags (htmlspecialchars)
        // allowing variables only (strip_tags)
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->tag_id = htmlspecialchars(strip_tags($this->tag_id));

        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":tag_id", $this->tag_id);

        //check execution
        $stmt->execute() ? true : false;
    }

    //**Read All**
    function readAll($from_record_num, $records_per_page)
    {
        $query = " SELECT * FROM 
            " . $this->table_name . "
           ORDER BY 
           author ASC 
           LIMIT {$from_record_num}, {$records_per_page}";


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
        $this->author = $row['author'];
        $this->tag_id = $row['tag_id'];
    }



    //**Update**
    function update()
    {
        $query = "UPDATE
        " . $this->table_name . "
        SET
            title = :title,
            author = :author,
            tag_id = :tag_id
    
        WHERE
            id = :id";

        $stmt = $this->conn->prepare($query);

        //Control user Values
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->tag_id = htmlspecialchars(strip_tags($this->tag_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bindParam()
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':tag_id', $this->tag_id);
        $stmt->bindParam(':id', $this->id);

        //ternery return 
        $stmtExec = $stmt->execute();

        if ($stmtExec) {
            header("Location: index.php");
        }
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
