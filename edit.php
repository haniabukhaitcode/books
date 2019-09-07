<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require_once 'config/database.php';
require_once 'models/books.php';
require_once 'models/tags.php';

$database = new Database();
$db = $database->getConnection();

$book = new Book($db);
$tag = new Tag($db);

$book->id = $id;
$book->readOne();

if ($_POST) {
    $book->title = $_POST['title'];
    $book->author = $_POST['author'];
    $book->tag_id = $_POST['tag_id'];
    $book->update() ? true : false;
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

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post">

                        <div>
                            <label>Title</label>
                            <input type='text' name='title' value='<?php echo $book->title; ?>' class='form-control' /></label>
                        </div>

                        <div>
                            <label>Author</label>
                            <input type='text' name='author' value='<?php echo $book->author; ?>' class='form-control' /></label>
                        </div>

                        <div>
                            <label>Tag</label>

                            <!-- categories select drop-down will be here -->
                            <div class="mb-3">
                                <?php
                                $stmt = $tag->read();

                                // put them in a select drop-down
                                echo "<select class='form-control' name='tag_id'>";

                                echo "<option>Please select...</option>";
                                while ($row_tag = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row_tag);

                                    // current category of the book must be selected
                                    if ($book->tag_id == $id) {
                                        echo "<option value='$id' selected>";
                                    } else {
                                        echo "<option value='$id'>";
                                    }

                                    echo "$tag</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>