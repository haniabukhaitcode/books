<?php

include_once 'config/database.php';
include_once 'models/books.php';
include_once 'models/authors.php';
include_once 'models/tags.php';

$database = new Database();
$db = $database->getConnection();

$book = new Book($db);
$author = new Author($db);



if ($_POST) {
    $book->title = $_POST['title'];
    $book->author_id = $_POST['author_id'];
    $book->tag_id = $_POST['tag_id'];
    $book->create() ? true : false;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Books</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul> -->
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>


    <!-- Table -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h4 class="mb-4">Add Books</h4>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter book name">
                        </div>

                        <div class="form-group">
                            <label>Author</label>
                            <div class="mb-3">
                                <select class='form-control' name='author_id'>
                                    <?php
                                    // read the product categories from the database
                                    $stmt = $author->read();
                                    // put them in a select drop-down
                                    while ($row_author = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        extract($row_author);
                                        echo "<option value='{$idG}'>{$author}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <div class="mb-3">
                                <select class='form-control' name='tag_id' multiple='multiple'>
                                    <?php
                                    // read the product categories from the database
                                    $stmt = $tag->read();
                                    // put them in a select drop-down
                                    while ($row_tag = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        extract($row_tag);
                                        echo "<option value='{$idG}'>{$tag}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary" />
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>