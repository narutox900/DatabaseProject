/* 
    This page made by : Youssef Abdelzaher Front-end developer 
*/

/* Start Get Elements  */
let AbdelzaherSlider = document.querySelector(".Abdelzaher-slider");
let items = Array.from(document.querySelectorAll(".Abdelzaher-slider .item"));
let controls = document.querySelector(".Abdelzaher-slider .controls");
// Creat controls spans by items number 
for (let i = 0; i < items.length; i++) {
    let controlsSpan = document.createElement("span");
    controlsSpan.dataset.index = i;
    controls.appendChild(controlsSpan);  
}
let controlsSpans = Array.from(document.querySelectorAll(".Abdelzaher-slider .controls span"));
let controlsButtons = Array.from(document.querySelectorAll(".Abdelzaher-slider .controlsButtons button"));
let audioEffect  = document.querySelector(".sound");
/* End Get Elements  */

/* Start Controls span Function  */
controlsSpans.forEach((span,index) => {
    // Add z-index for spans 
    span.style.zIndex = items.length + 2;

    span.onclick = function(){
        let activeItem = document.querySelector(".Abdelzaher-slider .item.active");
        let activeIndex = items.indexOf(activeItem);
        if (index > activeIndex) {
            startAudio();
            // Cleear Interval function for this Function work without problems
            clearInterval(autoInterval);
            setTimeout(autoTranstion(),5000);
            // Remove and Add class "active" for items to make transform
            activeItem.style.transform = 'translate(-100%)';
            activeItem.classList.remove('active');
            items[index].style.transform = 'translate(0)';
            items[index].classList.add('active');
            // Add this function for transform work good without any problems in the end of transform
            getPosition();
            
        }else if(index < activeIndex) {
            startAudio();
            // Cleear Interval function for this Function work without problems
            clearInterval(autoInterval);
            setTimeout(autoTranstion(),5000);
            // Remove and Add class "active" for items to make transform
            activeItem.style.transform = 'translate(100%)';
            activeItem.classList.remove('active');
            items[index].style.transform = 'translate(0)';
            items[index].classList.add('active');
            // Add this function for transform work good without any problems in the end of transform
            getPosition();
        }

    };
});
/* End Controls span Function  */

/* Start prev and next rules Function */
function getPrevAndNext() {
    let activeItem = document.querySelector(".Abdelzaher-slider .item.active");
    let activeIndex = items.indexOf(activeItem);
    let prevSlide,nextSlide;
    if (activeIndex === items.length - 1) {
        nextSlide = items[0];
    } else {
        nextSlide = items[activeIndex + 1];
    }
    if (activeIndex === 0) {
        prevSlide = items[items.length - 1]
    } else {
        prevSlide = items[activeIndex - 1];
    }
    return[prevSlide,nextSlide];
}
getPrevAndNext();
/* End prev and next rules Function */

/* Start Position function */
function getPosition() {
    let activeItem = document.querySelector(".Abdelzaher-slider .item.active");
    let activeIndex = items.indexOf(activeItem);
    const [prevSlide,nextSlide] = getPrevAndNext();
    items.forEach((item,index)=>{
        if (index === activeIndex) {
            item.style.transform = "translateX(0%)";
        }else if (item === prevSlide) {
            item.style.transform = "translateX(-100%)";
        }else if (item === nextSlide) {
            item.style.transform = "translateX(100%)";
        }else{
            item.style.transform = "translateX(100%)";
        }
        item.addEventListener("transitionend",()=>{
            item.classList.remove("top");
        });
        // Add and remove "active" class for controls spans
        controlsSpans.forEach(span => {
            span.classList.remove("active")
        });
        controlsSpans[activeIndex].classList.add("active");
    });
};
getPosition();
/* End Position function */

// Add events for controls buttons
controlsButtons.forEach(button =>{
    // Add z-index for buttons 
    button.style.zIndex = items.length + 2;
    button.addEventListener("click",()=>{
        if (button.classList.contains("next")) {
            startAudio();
            // Cleear Interval function for this Function work without problems
            clearInterval(autoInterval);
            setTimeout(autoTranstion(),intervalTimeNume);
            getNextSlide();
        }else if (button.classList.contains("prev")) {
            startAudio();
            clearInterval(autoInterval);
            setTimeout(autoTranstion(),intervalTimeNume);
            getPrevSlide();
        }
    });
});

/* Start nextSlide function */
function getNextSlide() {

    let activeItem = document.querySelector(".Abdelzaher-slider .item.active");
    const [prevSlide,nextSlide] = getPrevAndNext();
    if (activeItem.classList.contains("top")) {
        return;
    }
    // Add class "top" to active item to show his transform
    activeItem.classList.add("top");
    nextSlide.classList.add("top");
    // Remove and Add class "active" for items to make transform
    activeItem.classList.remove('active');
    activeItem.style.transform = 'translate(-100%)';
    nextSlide.classList.add('active');
    nextSlide.style.transform = 'translateX(0)';
    // Add this function for transform work good without any problems in the end of transform
    getPosition();
}
/* End nextSlide function */

/* Start prevSlide function */
function getPrevSlide() {

    let activeItem = document.querySelector(".Abdelzaher-slider .item.active");
    const [prevSlide,nextSlide] = getPrevAndNext();
    if (activeItem.classList.contains("top")) {
        return;
    }
    // Add class "top" to active item to show his transform
    activeItem.classList.add("top");
    prevSlide.classList.add("top");
    // Remove and Add class "active" for items to make transform
    activeItem.classList.remove('active');
    activeItem.style.transform = 'translate(100%)';
    prevSlide.classList.add('active');
    prevSlide.style.transform = 'translateX(0)';
    // Add this function for transform work good without any problems in the end of transform
    getPosition();
}
/* Start prevSlide function */

/* Start autoInterval function for change item every 5 secound */
let intervalTimeNume = parseInt(AbdelzaherSlider.dataset.change);
let intervalTimeString = AbdelzaherSlider.dataset.change;
function autoTranstion() {
    autoInterval = setInterval(()=>{
        getNextSlide();
    },intervalTimeNume);
}
autoTranstion();

// Remove autoInterval function 
if (intervalTimeNume === 0 || intervalTimeString === "none") {
    
    clearInterval(autoInterval);

}
/* End autoInterval function for change item every 5 secound */


/* Start sctiveControl function for add and remove "active" class for controls spans */
function activeControl() {
    let activeItem = document.querySelector(".Abdelzaher-slider .item.active");
    let activeIndex = items.indexOf(activeItem);
    controlsSpans.forEach(span => {
        span.classList.remove("active")
    });
    controlsSpans[activeIndex].classList.add("active");
}
activeControl();
/* End sctiveControl function for add and remove "active" class for controls spans */

function startAudio() {
    audioEffect.play();
}	