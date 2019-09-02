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
}
