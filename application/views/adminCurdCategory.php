<?php
//print("<pre>".print_r($data,true)."</pre>");
?>
<title>Administrator Dashboard: Category Management</title>
<div style="width: 50%; float: left">
    Update and Delete category
    <table>
        <tr>
            <th>id</th>
            <th>Category name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        foreach ($data[0] as $category)
        {
//            var_dump($book["Book"]);
            ?>
            <tr>
                <td><?php echo $category["Category"]["category_id"];?></td>
                <td><?php echo $category["Category"]["category_name"];?></td>
                <td><a href="<?php echo LINK; ?>/admin/crudCategory/<?php echo $category["Category"]["category_id"]?>"><button>Edit</button></a></td>
                <td><a onclick="return confirm('Are you sure you want to delete this category')" href="<?php echo LINK; ?>/admin/deleteCategory/<?php echo $category["Category"]["category_id"];?>"><button>Delete</button></a></td>
            </tr>
            <?php
        }
        ?>

    </table>
</div>
<div style="width: 50%; float: left">
    Add category
    <form action="<?php echo LINK; ?>/admin/addCategory" method="post">
        <label>New category name:</label><br>
        <input type="text" id="category_name" name="category_name" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
        if ($data[1] != NULL)
        {
            ?>
            <form action="<?php echo LINK; ?>/admin/editCategory/<?php echo $data[1][0]["Category"]["category_id"] ?>" method="post">
                <label>Edit category has id "<?php echo $data[1][0]["Category"]["category_id"] ?>":</label><br>
                <input type="text" id="category_name" name="category_name" value="<?php echo $data[1][0]["Category"]["category_name"] ?>" required><br><br>
                <input type="submit" value="Submit">
            </form>
            <?php
        }
    ?>
</div>