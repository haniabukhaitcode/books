<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
include_once '../config/database.php';
include_once '../models/books.php';
include_once '../models/authors.php';
include_once '../models/tags.php';
$database = new Database();
$db = $database->getConnection();
$book = new Book($db);
$author = new Author($db);
$tag = new Tag($db);
$book->readOne($id);
if ($_POST) {
    $book->title = $_POST['title'];
    $book->author_id = $_POST['author_id'];
    $book->tag_id = $_POST['tag_id'];
    $book->book_image = $_FILES['book_image'];
    $book->update($id) ? true : false;
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
                    <h4 class="mb-4">Edit Books</h4>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <label>Title</label>
                            <input type='text' name='title' value='<?php echo $book->title; ?>' class='form-control' /></label>
                        </div>
                        <div class="mt-3">
                            <label>Author</label>
                            <select class=' form-control' name='author_id'>
                                <?php
                                // read the product categories from the database
                                $result = $author->read();
                                // put them in a select drop-down

                                foreach ($result as $row) {
                                    if ($book->author_id == $row['id'])
                                        echo "<option selected value='{$row['id']}'>{$row['author']}</option>";
                                    else
                                        echo "<option value='{$row['id']}'>{$row['author']}</option>";
                                }

                                ?>

                            </select>
                        </div>
                        <div class="mt-3">
                            <label>Tag</label>
                            <select class=' form-control' name='tag_id[]' multiple='multiple'>
                                <?php
                                // read the product categories from the database
                                $result = $tag->read();
                                // put them in a select drop-down

                                foreach ($result as $row) {

                                    if (in_array($row['tag_id'], $book->tagIds))
                                        echo "<option selected value='{$row['tag_id']}'>{$row['tag']}</option>";
                                    else
                                        echo "<option value='{$row['tag_id']}'>{$row['tag']}</option>";
                                }

                                ?>
                            </select>
                            <div>
                                <div class="mt-3">
                                    <label>Image</label>
                                    <input type="file" name="book_image" id="book_image">
                                    <?php
                                    if (!empty($book->book_image)) {
                                        echo "<td>";
                                        echo '<img src="images/' . $book->book_image . '" alt="no_image"> </img>';
                                        echo "</td>";
                                    }
                                    ?>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                    </form>

                </div>
            </div>
        </div>

</body>

</html>