let searchFrom = '';
let searchTo = '';
let searchDate = '';

function getElement(id) {

    const element = document.getElementById(id);
    if (!element) {
        console.error(`Element with ID "${id}" not found.`);
    }
    return element;
}

const departingDate = getElement('departing-date');
const leavingFromElement = getElement('leaving-from');
const goingToElement = getElement('going-to');
const searchButtonElement = getElement('search-btn');


function scrollFunction() {
    const element = document.getElementById("destination-section");
    element.scrollIntoView();
}

leavingFromElement.addEventListener('change', (e) => {
    searchFrom = e.target.value;

});


goingToElement.addEventListener('change', (e) => {
    searchTo = e.target.value;
});

departingDate.addEventListener('change', () => {
    searchDate = departingDate.value;
    console.log(searchDate);
});


searchButtonElement.addEventListener('click', async (event) => {
    event.preventDefault();

    const response = await fetch(`http://localhost/inc/api/bus-schedules.php?from=${searchFrom}&to=${searchTo}`);
    const busSchedules = await response.json();

    localStorage.setItem('busSchedules', JSON.stringify(busSchedules));
    localStorage.setItem('searchFrom', JSON.stringify(searchFrom))
    localStorage.setItem('searchTo', JSON.stringify(searchTo))
    localStorage.setItem('searchDate', JSON.stringify(searchDate))

    window.location.href = '../buses.html';

});


