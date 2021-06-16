// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("navigator")
// var slider = document.getElementsByClassName("block-1");

// Get the offset position of the navbar
var sticky = header.offsetTop+250;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    var main = document.getElementById("main-menu");
    main.style.backgroundColor = "white";
    var sub = document.getElementById("dropdown-content-id");
    sub.style.backgroundColor = "white";
  } else {
    header.classList.remove("sticky");
    var main = document.getElementById("main-menu");
    main.style.backgroundColor = "#fef4f4";
    var sub = document.getElementById("dropdown-content-id");
    sub.style.backgroundColor = "ghostwhite";
  }
}