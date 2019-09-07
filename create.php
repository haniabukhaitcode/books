<?php


require_once 'config/database.php';
require_once 'models/books.php';
require_once 'models/tags.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$book = new Books($db);
$tags = new Tags($db);

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $tag = $_POST['tag'];
    $author = $_POST['author'];


    $fields = [
        'title' => $title,
        'tag' => $tag,
        'author' => $author
    ];

    $books = new books();
    $books->insert($fields);
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
                            <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Enter book name">
                        </div>
                        <div class="form-group">
                            <label for="tag">Tag</label>
                            <input type="text" name="tag" class="form-control" placeholder="Tag">
                        </div>
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" name="author" class="form-control" placeholder="Author name">
                        </div>


                        <input type="submit" name="submit" class="btn btn-primary" />
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>