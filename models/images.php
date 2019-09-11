<?php
class Image
{
    // database connection and table title
    private $conn;
    private $table_name = "images";
    // object properties
    public $id;
    public $image;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // used by select drop-down list
    function read()
    {
        //select all data
        $query = "SELECT
                    id, image
                FROM
                    " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}
