<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once '../config/recordLimit.php';
include_once '../config/database.php';
include_once '../models/authorbooks.php';



$database = new Database();
$db = $database->getConnection();
$authorbooks = new AuthorBook($db);

$authorbooks->readOne($id);

if ($_POST) {
    $authorbooks->title = $_POST['title'];
    $authorbooks->book_image = $_POST['book_image'];
    $authorbooks->author_id = $_POST['author_id'];
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

        <div class="mt-3">
            <label>Author</label>
            <div name='author_id'>
                <?php
                $result = $authorbooks->read();
                foreach ($result as $row) :  ?>
                    <div><?php echo $row['author']; ?></div>

                <?php endforeach; ?>

            </div>
        </div>
        <div class="mt-3">
            <label>Title</label>
            <div name='author_id'>
                <?php
                $result = $authorbooks->read();
                foreach ($result as $row) :  ?>
                    <div><?php echo $row['title']; ?></div>

                <?php endforeach; ?>

            </div>
        </div>
        <div class="mt-3">
            <label>book_image</label>

            <?php
            $result = $authorbooks->read();
            foreach ($result as $row) :  ?>
                <div name='book_image'>
                    <div><?php echo $row['book_image']; ?></div>
                </div>
                <div name='title'>
                    <div><?php echo $row['title']; ?></div>
                </div>
                <div name='author'>
                    <div><?php echo $row['author']; ?></div>
                </div>
            <?php endforeach; ?>


        </div>



    </form>



</body>

</html>