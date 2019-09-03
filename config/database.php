<?php

class database
{

    protected function connect()
    {
        try {
            // --
            $conn = new PDO("mysql:host=localhost;dbname=myBookStore", 'root', 'root');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            // --
        }
        //--
        catch (PDOException $err) {
            echo "Connection Error: " . $err->getMessage();
            //--
        }
    }
}
