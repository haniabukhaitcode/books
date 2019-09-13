<?php
class Tag
{
    // database connection and table title
    private $conn;
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
        tag_id,tag
      FROM
        tags";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}
