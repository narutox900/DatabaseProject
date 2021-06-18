<?php //print_r($data[4]); ?>

<title>Administrator Dashboard: Edit Movie</title>
<div style="padding:20px;">
  <h1>Admin edit movie</h1>
  <form action="<?php echo LINK; ?>/admin/editMovieQuery" method="POST">
    <label>Movie title:</label><br>
    <input type="text" id="edit_title" name="edit_title" onchange='check_pass();' value="<?php echo $data[4][0]["Movie"]["title"]; ?>"><br>
    <input type="hidden" name="edit_movie_id" id="edit_movie_id" value="<?php echo $data[4][0]["Movie"]["movie_id"]; ?>">
    <label>Genre:</label><br>
    <select name="edit_genre[]" id="edit_genre" multiple style="width:160px;">
      <?php
      foreach ($data[0] as $value) {
        echo "<option value='" . $value['Genre']['genre_id'] . "'>" . $value['Genre']['genre_name'] . "</option>";
      };
      ?>
    </select>
    <br><br>
    
    <label>Actor:</label><br>
    <select name="edit_actor[]" id="edit_actor" multiple style="width:160px;">
      <?php
      foreach ($data[1] as $value) {
        echo "<option value='" . $value['Actor']['actor_id'] . "'>" . $value['Actor']['actor_name'] . "</option>";
      };
      ?>
    </select>
    <br><br>
    
    <label>Director:</label><br>
    <select name="edit_director[]" id="edit_director" multiple style="width:160px;">
      <?php
      foreach ($data[2] as $value) {
        echo "<option value='" . $value['Director']['director_id'] . "'>" . $value['Director']['director_name'] . "</option>";
      };
      ?>
    </select>
    <br><br>

    <label>Language:</label><br>
    <select name="edit_language" id="edit_language">
      <?php
      foreach ($data[3] as $value) {
        echo "<option value='" . $value['Movie']['language'] . "'>" . $value['Movie']['language'] . "</option>";
      };
      ?>
    </select>
    <br><br>

    <label>Year:</label><br>
    <input type="number" id="edit_year" name="edit_year" min="1700" max="2021" value="<?php echo $data[4][0]["Movie"]["year"]; ?>" onchange='check_pass();'><br><br>

    <label>Rating:</label><br>
    <input type="number" id="edit_rating" name="edit_rating" min="0" max="10" value="<?php echo $data[4][0]["Movie"]["rating"]; ?>" onchange='check_pass();'><br><br>

    <label>Runtime:</label><br>
    <input type="number" id="edit_length" name="edit_length" min="0" max="10000" value="<?php echo $data[4][0]["Movie"]["length"]; ?>" onchange='check_pass();'><br><br>

    <label>Age(18+):</label><br>
    <input type="checkbox" id="edit_isadult" name="edit_isadult" value="1"><br><br>
    
    <label>Description:</label><br>
    <input type="text" id="edit_description" name="edit_description" value="<?php echo $data[4][0]["Movie"]["description"]; ?>" onchange='check_pass();'><br><br>

    <label>Poster:</label><br>
    <input type="text" id="edit_poster" name="edit_poster" onchange='check_pass();' value="<?php echo $data[4][0]["Movie"]["poster"]; ?>"><br><br>
    <input type="submit" value="submit" id="edit_submit" class="detail-button">
  </form>
</div>
