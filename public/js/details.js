function book_detail_section_2(section){
    var buttons = document.getElementsByClassName("book_detail_button_section2");
    for(i = 0 ; i < buttons.length; i++){
        buttons[i].classList.remove("book_detail_description_button_chose");
    }
    var button = document.getElementById("book_detail_"+section+"_button");
    button.classList.add("book_detail_description_button_chose")

    var items = document.getElementsByClassName("book_detail_section_2_item");
    for(i = 0 ; i < items.length; i++){
        items[i].classList.remove("book_detail_section_2_item_show");
    }
    var item = document.getElementById("book_detail_2_"+section);
    item.classList.add("book_detail_section_2_item_show")
}