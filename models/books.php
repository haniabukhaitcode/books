<?php

class books extends database
{
    public function select()
    {
        $sql = "SELECT * FROM booksTable";
        $result = $this->connect()->query($sql);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function insert($fields)
    {
        //implode is a php method joins array elements with a string 
        $implodeColumns = implode(', ', array_keys($fields));

        $implodePlaceholder = implode(", :", array_keys($fields));

        //INSERT INTO booksTable (title, tag, author) VALUES(:title, :tag, :author)
        $sql = "INSERT INTO booksTable ($implodeColumns) VALUES(:" . $implodePlaceholder . ")";

        $stmt = $this->connect()->prepare($sql);

        foreach ($fields as $key => $value) {
            $stmt->bindValue(":" . $key, $value);
        }

        $stmtExec = $stmt->execute();

        if ($stmtExec) {
            header('Location: index.php');
        }
    }

    public function selectOne($id)
    {

        $sql = "SELECT * FROM booksTable WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function update($fields, $id)
    {
        $st = "";
        $counter = 1;
        $total_fields = count($fields);

        foreach ($fields as $key => $value) {

            if ($counter === $total_fields) {
                $set = "$key =:" . $key;
                $st = $st . $set;
            } else {
                $set = "$key =:" . $key . ", ";
                $st = $st . $set;
                $counter++;
            }
        }
        $sql = "";
        $sql .= "UPDATE booksTable SET " . $st;
        $sql .= "WHERE id = " . $id;
        $stmt = $this->connect()->prepare($sql);

        foreach ($fields as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        $stmtExec = $stmt->execute();

        if ($stmtExec) {
            header("Locaion: index.php");
        }
    }
}
