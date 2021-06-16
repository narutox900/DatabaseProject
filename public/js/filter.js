var filter = {
    category: [],           // empty array means all categories
    publisher: [],          // empty array means all publishers
    author: [],             // empty array means all authors
    rating: 0,              // zero means all ratings
    sort_filter: "old",    // "popularity", "old", "new", "name" 
    search_suggest: ""
};
function getAllFilter(searchSuggest){    // reset when reload
    filter = {
        category: [],           // empty array means all categories
        publisher: [],          // empty array means all publishers
        author: [],             // empty array means all authors
        rating: 0,              // zero means all ratings
        sort_filter: "old",     // "popularity", "old", "new", "name" 
        search_suggest: searchSuggest
    }
    // alert(JSON.stringify(filter));
}
function changeCheckbox(id){
    var n = id.startsWith("all_");
    if(id.includes("category")){
        filter.category = [];
    }
    if(id.includes("author")){
        filter.author = [];
    }
    if(id.includes("publisher")){
        filter.publisher = [];
    }
    if(n===true){
        // id all__checkbox
        var allCheckBox = document.getElementById(id);
        if(allCheckBox.checked==false){
            allCheckBox.checked=true
        }else{
            allCheckBox.checked=true
            var CheckBox = document.getElementsByClassName(id.substring(4));
            for(i = 0; i < CheckBox.length; i++){
                CheckBox[i].checked = false;
            }
        }
    }else{
        // claa __checkbox
        var allCheckBox = document.getElementById("all_"+id);
        var CheckBox = document.getElementsByClassName(id);
        var i;
        var check = 0;
        for(i = 0; i < CheckBox.length; i++){
            if(CheckBox[i].checked == true){
                allCheckBox.checked=false;
                check = 1;
                if(id.includes("category")){
                    filter.category.push(CheckBox[i].parentElement.children[0].innerHTML);
                }
                if(id.includes("author")){
                    filter.author.push(CheckBox[i].parentElement.children[0].innerHTML);
                }
                if(id.includes("publisher")){
                    filter.publisher.push(CheckBox[i].parentElement.children[0].innerHTML);
                   
                }
            }
        }
        if(check==0){
            allCheckBox.checked=true;
        }
    }
    filterAjax();
    // alert(JSON.stringify(filter, null, 2));
}
function filter__by__rating__choice(){
    var choice = document.getElementById("filter__by__rating__choice__div");
    if(choice.classList.contains("filter__by__rating__choice__unshown")){
        choice.classList.remove("filter__by__rating__choice__unshown")
    }else{
        choice.classList.add("filter__by__rating__choice__unshown")
    }
}
function filter__by__rating__choice__button(value){
    filter__by__rating__choice();
    var choice = document.getElementById("filter__by__rating__button");
    choice.value=value
    // alert(value)
    if(value.includes("5")){
        filter.rating=5
    }else if(value.includes("4")){
        filter.rating=4
    }else if(value.includes("3")){
        filter.rating=3
    }else if(value.includes("2")){
        filter.rating=2
    }else if(value.includes("1")){
        filter.rating=1
    }else{
        filter.rating=0
    }
    filterAjax();
    // alert(JSON.stringify(filter));
}
function getOrderFilter(){
    var order = document.getElementById("order_filter");
    // alert(order.value);
    // if(order.value.includes("Popularity")){
    //     filter.sort_filter = "popularity";
    // }else 
    if(order.value.includes("New")){
        filter.sort_filter = "new";
    }else if(order.value.includes("Old")){
        filter.sort_filter = "old";
    }else if(order.value.includes("Name")){
        filter.sort_filter = "name";
    }
    // alert(JSON.stringify(filter));
    filterAjax();
}