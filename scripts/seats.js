const from = JSON.parse(localStorage.getItem('searchFrom'))
const to = JSON.parse(localStorage.getItem('searchTo'))
const departingTime = JSON.parse(localStorage.getItem('departureTime'))
const seatFare = JSON.parse(localStorage.getItem('fare'))
const busId = JSON.parse(localStorage.getItem('busId'))

document.getElementById('search-from').innerText = from;
document.getElementById('search-to').innerText = to;
document.getElementById('boarding').innerText = from;
document.getElementById('dropping').innerText = to;
document.getElementById('departing-time').innerText = departingTime;
document.getElementById('seat-fare').innerText = seatFare;

function transformSeatData(seatArray) {
    // console.log(seatArray);
    const seatData = {
        busId: "",
        rows: []
    };

    const rowMap = {};

    seatArray.forEach(seat => {
        const { rowName, seatId, isBooked, busId } = seat;

        if (!rowMap[rowName]) {
            rowMap[rowName] = {
                name: rowName,
                seats: []
            };
            seatData.busId = busId
            seatData.rows.push(rowMap[rowName]);
        }

        rowMap[rowName].seats.push({
            id: seatId,
            isBooked: isBooked === "1"
        });
    });

    return seatData;
}

function getElementById(elementID) {
    const element = document.getElementById(elementID);
    return element;
}

function getTextById(elementID) {
    const element = document.getElementById(elementID);
    const text = element.innerText;
    return text;
}

function setTextById(elementID, text) {
    const element = document.getElementById(elementID);
    element.innerText = text;
}

// changing the seat color after selection
function setBGById(elementID, count) {
    const element = document.getElementById(elementID);
    console.log(element);
    if (element.classList.contains('bg-red-700')) {
        return 'selected';
    }
    else if (element.classList.contains('bg-[#1DD100]', 'text-white')) {
        console.log("Its green");
        element.classList.remove('bg-[#1DD100]', 'text-white');
    }
    else {
        if (count == 4) {
            console.log("More thn four");
            return "error";
        }
        if (count < 4) {
            console.log("change color to green");
            element.classList.add('bg-[#1DD100]', 'text-white');
            return true;
        }
    }
}

function addSelectedSeatToContainer(className) {
    const selectedSeatContainer = getElementById('selected-seat');
    const div = document.createElement('div');
    div.classList.add('flex', 'justify-between', 'mb-3', `${className}`)
    div.innerHTML = `
                    <p>${className} </p>
                    <p>Economy</p>
                    <p>${seatFare}</p>
                `;
    selectedSeatContainer.appendChild(div);
}


function romoveUnselectedSeatFromContianer(className) {
    const selectedSeatContainer = document.getElementById('selected-seat');
    const elementToRemove = selectedSeatContainer.querySelector(`.${className}`);
    selectedSeatContainer.removeChild(elementToRemove);
}

function setTotalPrice(count) {
    let price = count * seatFare;
    setTextById('total-price', price);

}

let count = 0;
let currSeatLeft = 0;

document.getElementById('phone').addEventListener('keyup', enableOrDisableNextButton);

function enableOrDisableNextButton() {
    const nextBtn = getElementById('next-btn');
    const phoneField = getElementById('phone');
    const phoneValue = phoneField.value;
    console.log(phoneValue);
    if (count && phoneValue !== "") {
        nextBtn.classList.remove('btn-disabled');
    }
    else {
        nextBtn.classList.add('btn-disabled')
    }
}

console.log(busId);

fetch(`http://localhost/inc/api/seats.php?busId=${busId}`)
    .then(res => res.json())
    .then(data => {
        console.log(data);
        const result = transformSeatData(data)
        distributeSeats(result);
    })

let bookedSeat = 0;
let seatLeft = 0;

function createSeatButton(seat) {

    if (seat.isBooked) {
        bookedSeat++;
    }
    seatLeft = 40 - bookedSeat;

    const button = document.createElement('button');
    button.id = seat.id;
    button.textContent = seat.id;
    button.classList.add('seat', 'btn', 'w-auto', 'md:w-[120px]', 'lg:w-[80px]', 'font-semibold', 'text-[#03071280]');
    button.addEventListener('click', function (event) {
        const selected = event.target;
        const id = selected.getAttribute('id');
        console.log(id);
        const value = setBGById(id, count);
        console.log(value);
        console.log(count);
        if (count <= 4 && value !== 'error' && value != 'selected') {
            console.log("entered");
            const seatLeftText = getTextById('seat-left');
            console.log(seatLeftText);
            const seatLeft = parseInt(seatLeftText);
            let currSeatLeft = seatLeft;
            if (selected.classList.contains('bg-[#1DD100]', 'text-white')) {
                count++;
                currSeatLeft--;
                setTextById('seat-left', currSeatLeft);
                setTextById('seats-count', count);
                addSelectedSeatToContainer(`${selected.innerText}`)
                setTotalPrice(count);
                enableOrDisableNextButton();
            }
            else {
                count--;
                currSeatLeft += 1;
                setTextById('seat-left', currSeatLeft);
                setTextById('seats-count', count);

                romoveUnselectedSeatFromContianer(`${selected.innerText}`);
                setTotalPrice(count);
                enableOrDisableNextButton();
            }
        }
        else if (value == 'selected') {
            console.log("selected");
            alert("This seat is selcted");
        }
        else {
            alert("You Can't Select More Than 4 Seats!");
        }
    });

    if (seat.isBooked) {
        button.classList.add('bg-red-700', 'cursor-not-allowed');
        // button.disabled = true;
    } else {
        button.classList.add('text-[#03071280]');
    }
    const seatLeftElement = document.getElementById('seat-left');
    seatLeftElement.innerText = seatLeft;

    return button;
}

function distributeSeats(seatData) {
    const columns = [[], [], [], []];
    seatData.rows.forEach(row => {
        row.seats.forEach((seat, index) => {
            columns[index].push(seat);
        });
    });

    columns.forEach((column, columnIndex) => {
        const columnDiv = document.getElementById(`column-${columnIndex + 1}`);
        // console.log(columnDiv);
        column.forEach(seat => {
            const seatButton = createSeatButton(seat);
            columnDiv.appendChild(seatButton);
        });
    });
}