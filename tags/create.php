<?php
include_once '../config/database.php';
include_once '../models/tags.php';

$database = new Database();
$db = $database->getConnection();
$tag = new Tag($db);

if ($_POST) {
    $tag->tag = $_POST['tag'];
    $tag->create() ? true : false;
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
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h4 class="mb-4">Add tags</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="tag" class="form-control" placeholder="Enter tag name">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>