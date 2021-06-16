<!-- <label class="filter__by__category__container">
    <p style="display: none;">12</p>
    <p>Category 1</p>
    <input type="checkbox" class="category_checkbox" onclick='changeCheckbox("category_checkbox")'>
    <span class="filter__by__category__checkmark"></span>
</label>
<label class="filter__by__category__container">
    <p style="display: none;">12</p>
    <p>Category 2</p>
    <input type="checkbox" class="category_checkbox" onclick='changeCheckbox("category_checkbox")'>
    <span class="filter__by__category__checkmark"></span>
</label>
<label class="filter__by__category__container">
    <p style="display: none;">12</p>
    <p>Category 3</p>
    <input type="checkbox" class="category_checkbox" onclick='changeCheckbox("category_checkbox")'>
    <span class="filter__by__category__checkmark"></span>
</label> -->

<?php
for($i = 0; $i < count($data); $i++){
echo '<label class="filter__by__category__container"><p style="display: none;">';
echo $data[$i]["Category"]["category_id"];
echo '</p><p>';
echo $data[$i]["Category"]["category_name"];
echo '</p>';
echo '</p><input type="checkbox" class="category_checkbox" onclick=';
echo "'";
echo 'changeCheckbox("category_checkbox")';
echo "'>";
echo '<span class="filter__by__category__checkmark"></span></label>';
}
?>