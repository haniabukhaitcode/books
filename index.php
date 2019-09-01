<html>
    <head>
        <title>CRUD: CReate, Update, Delete PHP MySQL</title>
    </head>
    <body>
        <form method="post" action="server.php" >
            <div >
                <label type="text" name="id" value="">id</label>
             
            </div>
            <div class="input-group">
                <label>title</label>
                <input type="text" name="title" value="">
            </div>
            <div class="input-group">
                <label>tag</label>
                <input type="text" name="tag" value="">
            </div>
            <div class="input-group">
                <label>author</label>
                <input type="text" name="author" value="">
            </div>
            <div class="input-group">
                <label>action</label>
                <input type="text" name="action" value="">
            </div>

            <div class="input-group">
                <button class="btn" type="submit" name="save" >Save</button>
            </div>
        </form>
    </body>
</html>