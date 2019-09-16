<?php

include_once '../config/recordLimit.php';
include_once '../config/database.php';
include_once '../models/authorbooks.php';


$database = new Database();

$db = $database->getConnection();

$authorbook = new AuthorBook($db);


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
                                <th scope="col">Images</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $authorbooks = $authorbook->read();

                            foreach ($authorbooks as $row) :  ?>

                                <tr>
                                    <th scope="row"><?php echo $row['book_id']; ?></th>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['author']; ?></a></td>
                                    <td><?php echo '<img src="/books/uploads/' . $row["book_image"] . '" alt="no_image" style="width:100px;height:100px;"> </img>'; ?></td>
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