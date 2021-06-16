<?php
?>
<title>Administrator Dashboard: Comment Management</title>
<a href="<?php echo LINK; ?>/admin/listBook"><- BACK TO LIST BOOK PAGE</a>
<?php
    if ($data)
    {
        ?>
        <div class="admin__layout">
            <h2>Comment Table for Book has id: <?php echo $data[0]["Review"]["book_id"] ?></h2>

            <table>
                <tr>
                    <th>user_id</th>
                    <th>review</th>
                    <th>rating</th>
                    <th>delete</th>
                </tr>
                <?php
                foreach ($data as $email)
                {
                    ?>
                    <tr>
                        <td><?php echo $email["Review"]["client_id"];?></td>
                        <td><?php echo $email["Review"]["review"];?></td>
                        <td><?php echo $email["Review"]["rating"];?></td>
                        <td><a onclick="return confirm('Are you sure you want to delete this comment')" href="<?php echo LINK; ?>/admin/deleteComment/<?php echo $email["Review"]["book_id"];?>/<?php echo $email["Review"]["client_id"];?>"><button>Delete</button></a></td>
                    </tr>
                    <?php
                }
                ?>


            </table>
        </div>
        <?php
    }
    else
    {
        ?>
        <p>This book has no comment yet!</p>
        <?php
    }
?>

