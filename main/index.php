<?php

include_once '../config/connection.php';
include_once '../models/books.php';
include_once '../models/authors.php';
include_once '../models/tags.php';


$database = new Connection();

$db = $database->getConnection();

$book = new Book($db);


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
                                <th scope="col">Tag</th>
                                <th scope="col">Images</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($book->fetchAll() as $row) : ?>
                                <tr>
                                    <th scope="row"><?= $row->id; ?></th>
                                    <td><?= $row->title; ?></td>
                                    <td><a href="/books/authorBooks/index.php?id=<?= $row->author_id; ?>"><?= $row->author; ?></a></td>
                                    <td><?= $row->tags; ?></td>
                                    <td><?= '<img style="width:100px; height:100px;" class="card-img-top" src="/books/uploads/' . $row->book_image . '" alt="no_image";"/>'; ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?= $row->id; ?>">Edit</a> &nbsp; <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row->id ?>">Delete</a></td>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>