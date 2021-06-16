<?php
for($i = 0; $i < count($data); $i++){
echo '<label class="filter__by__publisher__container"><p>';
echo $data[$i]["Book"]["publisher"];
echo '</p><input type="checkbox" class="publisher_checkbox" onclick=';
echo "'";
echo 'changeCheckbox("publisher_checkbox")';
echo "'>";
echo '<span class="filter__by__publisher__checkmark"></span></label>';
}
?>