addEvent = document.getElementById("addEventBtn");
addEventCancel = document.getElementById("closeEvent");
addEventSlide = document.querySelector(".addEvent");

addEvent.onclick = function() {
    addEventSlide.style.right = "0px";
}
addEventCancel.onclick = function() {
    addEventSlide.style.right = "-400px";
}
