function displayBuses() {
    const busesContainer = document.getElementById('buses-container');

    fetch('http://localhost/inc/api/bus-schedules.php')
        .then(response => response.json())
        .then(data => {

            data.forEach(schedule => {
                console.log(schedule);
                const scheduleElement = document.createElement('div');
                scheduleElement.classList.add('flex', 'justify-between', 'gap-5', 'bg-slate-100', 'py-5', 'px-4', 'rounded-xl', 'mb-4');

                scheduleElement.innerHTML = `
            <h2 class="text-xl font-semibold flex-grow w-1/4 ">${schedule.busName}</h2>
            <p class="text-xl font-semibold flex-grow w-1/4 ">
             ${schedule.departureTime}</p>
            <p class="text-xl font-semibold flex-grow w-1/4 ">
            ${schedule.arrivalTime}</p>
            <p class="text-xl font-semibold flex-grow w-1/4 ">
            ${schedule.numberOfSeats}</p>
            <p class="text-xl font-semibold flex-grow w-1/4 ">
            BDT ${schedule.fare}</p>
            <button onclick="loadBookingPage()" id="view-seats-btn" class="btn bg-[#1DD100] text-white ">View Seats</button>
        `;
                busesContainer.appendChild(scheduleElement);
            });

        })
}

function loadBookingPage(){
    window.location.replace('../seat.html')
}

// const viewSeatsBtnElement = document.getElementById('view-seats-btn');
// viewSeatsBtnElement.addEventListener('click', ()=>{
//     window.location.replace('../booking.html')
// })

displayBuses();


