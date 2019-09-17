<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once '../config/recordLimit.php';
include_once '../config/database.php';
include_once '../models/authorbooks.php';



$database = new Database();
$db = $database->getConnection();
$authorbook = new AuthorBook($db);

$authorbook->readOne($id);

if ($_POST) {
    $authorbook->title = $_POST['title'];
    $authorbook->book_image = $_POST['book_image'];
    $authorbook->author_id = $_POST['author_id'];
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <?php include('../navbar.html'); ?>


    <!-- Table -->

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
        <?php

        $authorbooks = $authorbook->read();

        foreach ($authorbooks as $row) :  ?>
            <tr>
                <th scope="row"><?php echo $row['book_id']; ?></th>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['author_id']; ?></td>
                <td><?php echo '<img src="/books/uploads/' . $row["book_image"] . '" alt="no_image" style="width:100px;height:100px;"> </img>'; ?></td>
                </td>
            </tr>
        <?php endforeach; ?>


    </form>



</body>

</html>