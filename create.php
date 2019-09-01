<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD in PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h1>Create Book</h1>
        </div>

    <?php 
    if($_POST){
try{
        // insert query
        $query= "INSERT INTO booksTable  SET title=:title, tag=:tag, author=:author, action=:action";
        
        //prepare query for execution
        $stmt = $con->prepare($query);

        //posted values
        $title=htmlspecialchars(script_tags($_POST['title']));
        $tag=htmlspecialchars(script_tags($_POST['tag']));
        $author=htmlspecialchars(script_tags($_POST['author']));
        $action=htmlspecialchars(script_tags($_POST['action']));

        //bind the parameters
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':tag',$tag);
        $stmt->bindParam(':author',$author);
        $stmt->bindParam(':action',$action);

        //execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }


}catch(PDOException $exception){
    die("Error " . $exception->getMessage());
}

    }
?>


 <!-- html form to create product will be here -->
 <!-- The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script. -->
 <form acion ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class="table table-hove table-resposive table-bordered">
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" class="form-control" /></td>
        </tr>

        <tr>
            <td>tag</td>
            <td><input type="text" name="tag" class="form-control" /></td>
        </tr>

        <tr>
            <td>Author</td>
            <td><input type="text" name="author" class="form-control" /></td>
        </tr>

        <tr>
            <td>Action</td>
            <td><input type="text" name="action" class="form-control" /></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>

    </table>


</form>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
 
   
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    </div>

</body>
</html>