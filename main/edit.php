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
    <?php include('../navbar.html'); ?>

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
                                $result = $author->fetchAuthors();
                                // put them in a select drop-down
                                foreach ($result as $row) :
                                    if ($book->author_id == $row['id']) :
                                        ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['author'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['author'] ?></option>
                                <?php endif;
                                endforeach; ?>

                            </select>
                        </div>
                        <div class="mt-3">
                            <label>Tag</label>
                            <select class=' form-control' name='tag_id[]' multiple='multiple'>
                                <?php
                                // read the product categories from the database
                                $result = $tag->read();
                                // put them in a select drop-down
                                foreach ($result as $row) :
                                    if (in_array($row['id'], $book->tagIds)) : ?>
                                        <option selected value=<?= $row['id'] ?>><?= $row['tag'] ?></option>
                                    <?php else : ?>
                                        <option value=<?= $row['id'] ?>><?= $row['tag'] ?></option>
                                <?php endif;
                                endforeach; ?>

                            </select>
                            <div>
                                <div class="mt-3">
                                    <label>Image</label>
                                    <input type="file" name="book_image" id="book_image">
                                    <?php
                                    if (!empty($book->book_image)) : ?>
                                        <td>
                                            <img src="/books/uploads/' . $book->book_image . '" alt="" />
                                        </td>
                                    <?php endif; ?>
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