function scrollFunction() {
    console.log();
    const element = document.getElementById("destination-section");
    element.scrollIntoView();
}



function getElement(id) {
    
    const element = document.getElementById(id);
    if (!element) {
        console.error(`Element with ID "${id}" not found.`);
    }
    return element;
}

let searchFrom=''
let searchTo=''
let searchDate='' 
let fare = ''
let departureTime = ''


const departingDate = getElement('departing-date')
const leavingFromElement = getElement('leaving-from')
const goingToElement = getElement('going-to')
const searchButtonElement= getElement('search-btn')


leavingFromElement.addEventListener('change', (e) => {
    searchFrom = e.target.value

});


goingToElement.addEventListener('change', (e) => {
    searchTo = e.target.value
});



departingDate.addEventListener('change', () => {
    searchDate = departingDate.value;
   
});



searchButtonElement.addEventListener('click', async (event) => {
    event.preventDefault();


    console.log({searchFrom},{searchTo});
    const response = await fetch(`http://localhost/inc/api/bus-schedules.php?from=${searchFrom}&to=${searchTo}`);
    const busSchedules = await response.json();

    localStorage.setItem('busSchedules', JSON.stringify(busSchedules));
    localStorage.setItem('searchFrom', JSON.stringify(searchFrom))
    localStorage.setItem('searchTo', JSON.stringify(searchTo))
    localStorage.setItem('searchDate', JSON.stringify(searchDate))



    window.location.href = '../buses.html'; 

});


