<title>Administrator Dashboard: Add Movie</title>
<div style="padding:20px;">
  <h1>Admin add movie</h1>
  <form action="addMovieQuery" method="POST">
    <label>Movie title:</label><br>
    <input type="text" id="add_title" name="add_title" onchange='check_pass();'><br>

    <label>Genre:</label><br>
    <select name="add_genre[]" id="add_genre" multiple style="width:160px;">
      <?php
      foreach ($data[0] as $value) {
        echo "<option value='" . $value['Genre']['genre_id'] . "'>" . $value['Genre']['genre_name'] . "</option>";
      };
      ?>
    </select>
    <br><br>
    
    <label>Actor:</label><br>
    <select name="add_actor[]" id="add_actor" multiple style="width:160px;">
      <?php
      foreach ($data[1] as $value) {
        echo "<option value='" . $value['Actor']['actor_id'] . "'>" . $value['Actor']['actor_name'] . "</option>";
      };
      ?>
    </select>
    <br><br>
    
    <label>Director:</label><br>
    <select name="add_director[]" id="add_director" multiple style="width:160px;">
      <?php
      foreach ($data[2] as $value) {
        echo "<option value='" . $value['Director']['director_id'] . "'>" . $value['Director']['director_name'] . "</option>";
      };
      ?>
    </select>
    <br><br>

    <label>Language:</label><br>
    <select name="add_language" id="add_language">
      <?php
      foreach ($data[3] as $value) {
        echo "<option value='" . $value['Movie']['language'] . "'>" . $value['Movie']['language'] . "</option>";
      };
      ?>
    </select>
    <br><br>

    <label>Year:</label><br>
    <input type="number" id="add_year" name="add_year" min="1700" max="2021" onchange='check_pass();'><br><br>

    <label>Rating:</label><br>
    <input type="number" id="add_rating" name="add_rating" min="0" max="10" onchange='check_pass();'><br><br>

    <label>Runtime:</label><br>
    <input type="number" id="add_length" name="add_length" min="0" max="10000" onchange='check_pass();'><br><br>

    <label>Age(18+):</label><br>
    <input type="checkbox" id="add_isadult" name="add_isadult" value="1"><br><br>
    
    <label>Description:</label><br>
    <input type="text" id="add_description" name="add_description" onchange='check_pass();'><br><br>

    <label>Poster:</label><br>
    <input type="text" id="add_poster" name="add_poster" onchange='check_pass();'><br><br>
    <input type="hidden" id="add_movie_id" name="add_movie_id" value="<?php echo $data[4]; ?>">
    <input type="submit" value="submit" id="add_submit" class="detail-button" disabled>
  </form>
</div>

<script>
  function check_pass() {
    if ( document.getElementById('add_title') != '' && document.getElementById('add_description') != '' && document.getElementById('add_year') != '' && document.getElementById('add_rating') != '' && document.getElementById('add_length') != '' && document.getElementById('add_poster') != '') {
        document.getElementById('add_submit').disabled = false;
    } else {
        document.getElementById('add_submit').disabled = true;
    }
}
</script>