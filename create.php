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