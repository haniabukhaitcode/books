<?php
class Tag
{

    // database connection and table title
    private $conn;
    private $table_title = "tags";

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
                    " . $this->table_title . "
                ORDER BY
                    tag";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Read tags name by ID
    function readName()
    {

        $query = "SELECT tag FROM " . $this->table_title . " WHERE id = ? limit 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['tag'];
    }
}
