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
    public $image_id;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    //**Create**

    function create()
    {

        //sql
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $lastId = "select max(book_id) book_id from " . $this->table_name . "";
        $bookQuery = "INSERT INTO " . $this->table_name . "(title, author_id, image_id) VALUES(:title, :author_id, :image_id) ";
        $tagQuery = "INSERT INTO  books_tags (book_id, tag_id) VALUES(:inserted_id, :tag_id) ";
        //statement connection with prepare    
        $stmt = $this->conn->prepare($bookQuery);
        // **Controlling Values From User**
        // remving tags (htmlspecialchars)
        // allowing variables only (strip_tags)
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->image_id = htmlspecialchars(strip_tags($this->image_id));



        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":image_id", $this->image_id);

        $stmt->execute();
        $sth = $this->conn->query($lastId);

        $insertedId = $sth->fetchAll();
        $bookId =  $insertedId[0]["book_id"];

        foreach ($this->tag_id as $tag) {

            $tagStmnt = $this->conn->prepare($tagQuery);
            $tagStmnt->bindParam(":tag_id", $tag);
            $tagStmnt->bindParam(":inserted_id", $bookId);
            $tagStmnt->execute();
        }

        header("Location: index.php");
    }
    //**Read All**
    function readAll()
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $query = "SELECT
        books.book_id,
        books.title,
        authors.author,
      images.image,
        GROUP_CONCAT(tags.tag SEPARATOR ',') tags
    FROM
        books
    JOIN
        authors
    ON
        authors.id = books.author_id
    JOIN
        books_tags
    ON
        books_tags.book_id = books.book_id
    JOIN
        tags
    ON
        tags.tag_id = books_tags.tag_id
    JOIN
        images
    ON
        images.id = books.image_id

    GROUP BY
        books.book_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
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
        books.book_id,
        books.title,
        authors.id author,
        GROUP_CONCAT(tags.tag_id SEPARATOR ',') tags
    FROM
        books
    JOIN
        authors
    ON
        authors.id = books.author_id
    JOIN
        books_tags
    ON
        books_tags.book_id = books.book_id
    JOIN
        tags
    ON
        tags.tag_id = books_tags.tag_id
    WHERE books.book_id = ?
    GROUP BY
        books.book_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->title = $row->title;
        $this->author_id = $row->author;
        $this->tagIds =  explode(",", $row->tags);
        // $this->tag_id = $row['tag_id'];
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
            image_id = :image_id
    
        WHERE
            book_id = :book_id";
        $tagQuery = "INSERT INTO  books_tags (book_id, tag_id) VALUES(:book_id, :tag_id) ";
        //statement connection with prepare    
        $stmt = $this->conn->prepare($bookQuery);
        $delStmt = $this->conn->prepare($deleteTags);
        // **Controlling Values From User**
        // remving tags (htmlspecialchars)
        // allowing variables only (strip_tags)
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->image_id = htmlspecialchars(strip_tags($this->image_id));



        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":image_id", $this->image_id);
        $stmt->bindParam(":book_id", $id);

        $stmt->execute();
        $id = (int) $id;




        $delStmt->execute();


        foreach ($this->tag_id as $tag) {

            $tagStmnt = $this->conn->prepare($tagQuery);
            $tagStmnt->bindParam(":tag_id", $tag);
            $tagStmnt->bindParam(":book_id", $id);
            $tagStmnt->execute();
        }

        header("Location: index.php");
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
