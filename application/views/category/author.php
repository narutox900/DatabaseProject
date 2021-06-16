<?php
for($i = 0; $i < count($data); $i++){
echo '<label class="filter__by__author__container"><p>';
echo $data[$i]["Book"]["author"];
echo '</p><input type="checkbox" class="author_checkbox" onclick=';
echo "'";
echo 'changeCheckbox("author_checkbox")';
echo "'>";
echo '<span class="filter__by__author__checkmark"></span></label>';
}
?>