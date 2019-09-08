<?php

include_once 'config/recordLimit.php';
include_once 'config/database.php';
include_once 'models/books.php';
include_once 'models/authors.php';


$database = new Database();
$db = $database->getConnection();

$book = new Book($db);
$author = new Author($db);




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
                    <div class="row">
                        <h4 class="col-12 mb-3">All Books</h4>
                        <a type="submit" class="btn btn-success col-2 mb-4 ml-3 p-1" href="create.php">Insert a book</a>
                    </div>

                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $books = $book->readAll();

                            foreach ($books as $row) :  ?>

                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['title']; ?></td>
                                    <?php echo "<td>";
                                        $author->id = $row['author_id'];
                                        $author->readName();
                                        echo $author->author;
                                        echo "</td>";
                                        ?>
                                    <td><?php echo $row['tag']; ?></td>

                                    <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> &nbsp; <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>