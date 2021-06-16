<title>Administrator Dashboard: Edit book</title>
<h1>Admin edit book</h1>
<?php
//var_dump($data[0]['Book']);
//print("<pre>".print_r($data,true)."</pre>");
?>

<h1>TODO</h1>
<form action=" <?php echo LINK?>/admin/editBookQuery" method="POST" enctype="multipart/form-data">
    <label>Book title:</label><br>
    <input type="text" id="title" name="title" value="<?php echo $data[0][0]['Book']['title'] ?>"><br>
    <label>Author:</label><br>
    <input type="text" id="author" name="author" value="<?php echo $data[0][0]['Book']['author'] ?>"><br><br>
    <label>Description:</label><br>
    <input type="text" id="description" name="description" value="<?php echo $data[0][0]['Book']['description'] ?>" ><br><br>
    <label>Publisher:</label><br><br>
    <input type="text" id="publisher" name="publisher" value="<?php echo $data[0][0]['Book']['publisher'] ?>"><br><br>
    <label>Category:</label><br>
    <select name="add-book-category[]" id="add-book-category" multiple>
        <?php
        foreach($data[1] as $value){
            echo "<option value='".$value['Category']['category_id']."'>".$value['Category']['category_name']."</option>";
        };
        ?>
    </select>

    <label>Thumbnail:</label><br>
    <input type="file" id="thumbnail" name="thumbnail"><br><br>
    <?php  if(isset($_GET['retry']) && $_GET['retry'] == "thumbnail"){echo "<p style='color:red'>Wrong thumbnail file extension!</p>";} ?>
    <label>PDF:</label><br>
    <input type="file" id="bookPDF" name="bookPDF"><br><br>
    <input type="hidden" name="oldBookThumbnail" value="<?php echo $data[0][0]['Book']['thumbnail_address'] ?>">
    <input type="hidden" name="oldBookPDF" value="<?php echo $data[0][0]['Book']['bookPDF'] ?>">
    <input type="hidden" name="book_id" value="<?php echo $data[0][0]['Book']['book_id'] ?>">
    <input type="hidden" id="actionID" name="actionID" value="1"><br><br>
    <?php  if(isset($_GET['retry']) && $_GET['retry'] == "bookPDF"){echo "<p style='color:red'>Wrong PDF file extension!</p>";} ?>
    <input type="submit" value="Submit">
</form>
