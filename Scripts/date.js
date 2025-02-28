document.addEventListener("DOMContentLoaded", () => {
    const calendar = document.getElementById("calendar");
    const monthYear = document.getElementById("monthYear");
    const previousMonth = document.getElementById("previousMonth");
    const nextMonth = document.getElementById("nextMonth");

    let date = new Date();
    let currentYear = date.getFullYear();
    let currentMonth = date.getMonth();
    const currentDay = date.getDate();

    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    const renderCalendar = () => {
        monthYear.textContent = `${monthNames[currentMonth]} ${currentYear}`;

        calendar.innerHTML = "";

        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const offset = firstDay === 0 ? 6 : firstDay - 1;

        for (let i = 0; i < offset; i++) {
            const emptyDiv = document.createElement("div");
            calendar.appendChild(emptyDiv);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dateDiv = document.createElement("div");
            dateDiv.classList.add("date");
            dateDiv.textContent = day;

            if (day === currentDay && currentMonth === date.getMonth() && currentYear === date.getFullYear()) {
                dateDiv.classList.add("current-day");
            }

            calendar.appendChild(dateDiv);
        }
    };

    renderCalendar();

    previousMonth.onclick = function() {
        if (currentMonth === 0) {
            currentMonth = 11;
            currentYear--;
        } else {
            currentMonth--;
        }
        renderCalendar(); 
    };

    nextMonth.onclick = function() {
        if (currentMonth === 11) {
            currentMonth = 0;
            currentYear++;
        } else {
            currentMonth++;
        }
        renderCalendar();
    };

    let days = document.querySelectorAll(".date")
    
    days.forEach(day => {
        day.onclick = function() {
            let pressedDay = day.textContent;
            location.replace(`../Website/calendarDay.php?day=${encodeURIComponent(pressedDay)}`);
        };
    });
    
});