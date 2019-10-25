<?php
include_once '../config/connection.php';
include_once '../models/books.php';
include_once '../models/authors.php';
include_once '../models/tags.php';

$database = new Connection();
$db = $database->getConnection();
$book = new Book($db);
$author = new Author($db);
$tag = new Tag($db);

if ($_POST) {
    $book->title = $_POST['title'];
    $book->author_id = $_POST['author_id'];
    $book->tag_id = $_POST['tag_id'];
    $book->book_image = $_FILES['book_image'];
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


    <!-- Table -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h4 class="mb-4">Add Books</h4>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter book name">
                        </div>

                        <div class="form-group">
                            <label>Author</label>
                            <div class="mb-3">
                                <select class='form-control' name='author_id'>
                                    <?php
                                    foreach ($author->fetchAll() as $row) :  ?>
                                        <option value="<?= $row->id ?>"><?= $row->author ?></option>";
                                    <?php endforeach;   ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <div class="mb-3">
                                <select class='form-control' name='tag_id[]' multiple='multiple'>
                                    <?php
                                    foreach ($tag->fetchAll() as $row) : ?>
                                        <option value="<?= $row->id ?>"><?= $row->tag ?></option>";
                                    <?php endforeach;   ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <input type="file" name="book_image" id="book_image">
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