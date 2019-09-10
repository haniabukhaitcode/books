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
}
