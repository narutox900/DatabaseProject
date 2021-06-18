<title>Administrator Dashboard: Movie manager</title>
<h1>List Movie</h1>
<?php
//    var_dump($data);

?>

<div class="admin__layout">
    <h2>Movie Table</h2>

    <table>
        <tr>
            <th>movie_id</th>
            <th>title</th>
            <th>language</th>
            <th>description</th>
            <th>year</th>
            <th>rating</th>
            <th>length</th>
            <th>isAdult</th>
            <th>poster</th>
            <th>editButton</th>
            <th>deleteButton</th>
        </tr>
        <?php
        foreach ($data as $movie)
        {
//            var_dump($book["Book"]);
        ?>
        <tr>
            <td><?php echo $movie["Movie"]["movie_id"];?></td>
            <td><?php echo $movie["Movie"]["title"];?></td>
            <td><?php echo $movie["Movie"]["language"];?></td>
            <td><?php echo $movie["Movie"]["description"];?></td>
            <td><?php echo $movie["Movie"]["year"];?></td>
            <td><?php echo $movie["Movie"]["rating"];?></td>
            <td><?php echo $movie["Movie"]["length"];?></td>
            <td><?php echo $movie["Movie"]["isAdult"];?></td>
            <td><?php echo $movie["Movie"]["poster"];?></td>
            <td><a href="<?php echo LINK; ?>/admin/editMovie/<?php echo $movie["Movie"]["movie_id"];?>"><button>Edit</button></a></td>
            <td><a onclick="return confirm('Are you sure you want to delete this movie')" href="<?php echo LINK; ?>/admin/deleteBook/<?php echo $movie["Movie"]["movie_id"];?>"><button>Delete</button></a></td>
        </tr>
        <?php
        }
        ?>


    </table>

</div>
