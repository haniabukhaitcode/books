<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once '../config/recordLimit.php';
include_once '../config/database.php';
include_once '../models/authorbooks.php';
include_once '../models/books.php';
include_once '../models/authors.php';

$database = new Database();
$db = $database->getConnection();

$authorBook = new AuthorBook($db);

$result = $authorBook->readOne($id);

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


    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <h4 class="col-12 mb-3">All Authors Books </h4>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row no-gutters">
                        <?php
                        foreach ($result as $row) :  ?>

                            <div class="card col">
                                <?php echo '<img class="card-img-top" src="/books/uploads/' . $row["book_image"] . '" alt="no_image";"> </img>'; ?>
                                <div class="card-body">
                                    <p class="card-text">Author Name: <?php echo $row['author']; ?></p>
                                    <p class="card-text">Book Title: <?php echo $row['title']; ?></p>
                                </div>
                            </div>


                        <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>
    </div>

</html>