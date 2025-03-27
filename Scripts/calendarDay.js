addEvent = document.getElementById("addEventBtn");
addEventCancel = document.getElementById("closeEvent");
addEventSlide = document.querySelector(".addEvent");

addEvent.onclick = function() {
    addEventSlide.style.right = "0px";
}
addEventCancel.onclick = function() {
    addEventSlide.style.right = "-400px";
}

document.addEventListener("DOMContentLoaded", function() {
    let currentHour = new Date().getHours();

    const hours = document.querySelectorAll('.hour');
    hours.forEach(hour => {
        hour.classList.remove('highlight');
    });

    const currentHourElement = document.getElementById(`hour-${currentHour}`);
    if (currentHourElement) {
        currentHourElement.classList.add('highlight');
    }
});
