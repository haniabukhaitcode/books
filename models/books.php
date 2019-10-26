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
    public $tagIds;
    public $book_image;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    //**Create**

    function create()
    {

        //sql
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $lastId = "select max(id) id from " . $this->table_name . "";
        $bookQuery = "INSERT INTO " . $this->table_name . "(title, author_id, book_image) VALUES(:title, :author_id, :book_image) ";

        $tagQuery = "INSERT INTO  books_tags (book_id, tag_id) VALUES(:inserted_id, :tag_id) ";
        //statement connection with prepare    
        $stmt = $this->conn->prepare($bookQuery);

        $imageName = $this->uploadPhoto()["name"];
        // **Controlling Values From User**

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));

        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":book_image", $imageName);

        $stmt->execute();
        $sth = $this->conn->query($lastId);

        $insertedId = $sth->fetchAll();
        $bookId =  $insertedId[0]["id"];

        foreach ($this->tag_id as $tag) {

            $tagStmnt = $this->conn->prepare($tagQuery);
            $tagStmnt->bindParam(":tag_id", $tag);
            $tagStmnt->bindParam(":inserted_id", $bookId);
            $tagStmnt->execute();
        }
        if ($stmt) {
            header("Location: index.php");
        }
        return $stmt;
        header("Location: index.php");
    }

    //**Read All**
    function fetchAll()
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $query = "SELECT
        books.id,
        books.title,
        books.book_image,
        authors.author,
        authors.id AS author_id,
        GROUP_CONCAT(tags.tag SEPARATOR ',') tags
    FROM
        books
  Left  JOIN
        authors
    ON
        authors.id = books.author_id
  Left  JOIN
        books_tags
    ON
        books_tags.book_id = books.id
   Left JOIN
        tags
    ON
        tags.id = books_tags.tag_id

    GROUP BY
        books.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
        print_r($stmt->errorInfo());
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
    function readOne($id)
    {
        $query = "SELECT
        books.id,
        books.title,
        books.book_image,
        authors.id author,
        GROUP_CONCAT(tags.id SEPARATOR ',') tags
        
    FROM
        books
    JOIN
        authors
    ON
        authors.id = books.author_id
    JOIN
        books_tags
    ON
        books_tags.book_id = books.id
    JOIN
        tags
    ON
        tags.id = books_tags.tag_id

    WHERE books.id = ?

    GROUP BY
        books.id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->title = $row->title;
        $this->author_id = $row->author;
        $this->book_image = $row->book_image;
        $this->tagIds =  explode(",", $row->tags);
    }
    //**Update**
    function update($id)
    {
        //sql
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $deleteTags = "delete from books_tags where book_id = " . $id . "";
        $bookQuery = "UPDATE
        " . $this->table_name . "
        SET
            title = :title,
            author_id = :author_id,
            book_image = :book_image
        WHERE
            id = :id";

        $tagQuery = "INSERT INTO  books_tags (book_id, tag_id) VALUES(:book_id, :tag_id) ";

        //statement connection with prepare    
        $stmt = $this->conn->prepare($bookQuery);
        $delStmt = $this->conn->prepare($deleteTags);
        // **Controlling Values From User**
        $imageName = $this->uploadPhoto()["name"];
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":book_image", $imageName);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $id = (int) $id;
        $delStmt->execute();


        foreach ($this->tag_id as $tag) {
            $tagStmnt = $this->conn->prepare($tagQuery);
            $tagStmnt->bindParam(":tag_id", $tag);
            $tagStmnt->bindParam(":book_id", $id);
            $tagStmnt->execute();
        }

        if ($stmt) {
            header("Location: index.php");
        }
        return $stmt;
        // print_r($stmt->errorInfo());
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
        return $stmt;
    }
    function uploadPhoto()
    {
        $path = date('mdYHis');
        $result_message = "";

        // now, if image is not empty, try to upload the image
        if ($this->book_image) {
            // sha1_file() function is used to make a unique file name

            $target_directory = $_SERVER['DOCUMENT_ROOT'] . "//uploads/";
            $target_file = $target_directory .  $path .   $this->book_image["name"];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);


            // error message is empty
            $file_upload_error_messages = "";
            // make sure that file is a real image
            $check = getimagesize($this->book_image["tmp_name"]);
            if ($check !== false) {
                // submitted file is an image
            } else {
                $file_upload_error_messages .= "<div>Submitted file is not an image.</div>";
            }

            // make sure certain file types are allowed
            $allowed_file_types = array("jpg", "jpeg", "png", "gif");
            if (!in_array($file_type, $allowed_file_types)) {
                $file_upload_error_messages .= "<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            }

            // make sure file does not exist
            if (file_exists($target_file)) {
                $file_upload_error_messages .= "<div>Image already exists. Try to change file name.</div>";
            }

            // make sure submitted file is not too large, can't be larger than 1 MB
            if ($this->book_image['size'] > (99999999999999999999)) {
                $file_upload_error_messages .= "<div>Image must be less than 1 MB in size.</div>";
            }
        }

        return array(
            "err" => $file_upload_error_messages,
            "name" => $this->book_image["name"]
        );
    }
}
