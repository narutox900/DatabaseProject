<?php
//print("<pre>".print_r($data,true)."</pre>");
?>
<title>Administrator Dashboard: Email Management</title>
<div class="admin__layout">
    <h2>Guest Table</h2>

    <table>
        <tr>
            <th>email</th>
            <th>delete</th>
        </tr>
        <?php
        foreach ($data as $email)
        {
            ?>
            <tr>
                <td><?php echo $email["Subcribelist"]["email"];?></td>

                <td><a onclick="return confirm('Are you sure you want to delete this email')" href="<?php echo LINK; ?>/admin/deleteGuestEmail/<?php echo $email["Subcribelist"]["email"];?>"><button>Delete</button></a></td>
            </tr>
            <?php
        }
        ?>


    </table>
