function scrollFunction() {
    console.log();
    const element = document.getElementById("destination-section");
    element.scrollIntoView();
}

document.addEventListener('DOMContentLoaded', () => {
    console.log("connected");

    // utility
    


    let leavingFrom = '';
    let goingTo = '';
    let departingDate = '';
    function getElement(id) {
        const element = document.getElementById(id);
        if (!element) {
            console.error(`Element with ID "${id}" not found.`);
        }
        return element;
    }

    const leavingFromElement = getElement('leaving-from');
    const goingToElement = getElement('going-to');
    const dateInput = getElement('departing-date');
    const searchBtn = getElement('search-btn');

    if (leavingFromElement) {
        leavingFromElement.addEventListener('change', () => {
            leavingFrom = leavingFromElement.value;
            console.log('Leaving From:', leavingFrom);
        });
    }

    if (goingToElement) {
        goingToElement.addEventListener('change', () => {
            goingTo = goingToElement.value;
            console.log('Going To:', goingTo);
        });
    }

    if (dateInput) {
        dateInput.addEventListener('change', () => {
            departingDate = dateInput.value;
            console.log('Selected date:', departingDate);
        });
    }

    if (searchBtn) {
        searchBtn.addEventListener('click', () => {
            if (leavingFrom && goingTo && departingDate) {
                console.log('Search Criteria:', leavingFrom, goingTo, departingDate);
                window.location.replace("../buses.html");

                // Assuming these functions are defined elsewhere
                setTextById('from', leavingFrom);
                setTextById('to', goingTo);
                setTextById('boarding', leavingFrom);
                setTextById('dropping', goingTo);
            } else {
                console.log('Please fill in all fields.');
            }
        });
    }

});