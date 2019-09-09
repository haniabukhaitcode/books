<?php

class Tag
{
    // database connection and table title
    private $conn;
    private $table_name = "tags";

    // object properties
    public $id;
    public $author;
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
                    " . $this->table_name . "
                ORDER BY
                    tag";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Read authors by ID

    function readName()
    {

        $query = "SELECT tag FROM " . $this->table_name . " WHERE id = ? limit 0,1   ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->author = $row['tag'];
    }
}
