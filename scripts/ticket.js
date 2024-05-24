console.log('connected');

const column1Seats=[
    {"seatName": "A1", "isBooked": false},
    {"seatName": "B1", "isBooked": true},
    {"seatName": "C1", "isBooked": false},
    {"seatName": "D1", "isBooked": false},
    {"seatName": "E1", "isBooked": false},
    {"seatName": "F1", "isBooked": true},
    {"seatName": "G1", "isBooked": true},
    {"seatName": "H1", "isBooked": false},
    {"seatName": "I1", "isBooked": true},
    {"seatName": "J1", "isBooked": false}
]

// column1Seats.forEach(seat => {
//     console.log(seat);
//     const column1 = getElementById('column-1');
//     const seatElement = document.createElement('button');
//     // seat btn w-auto md:w-[120px] lg:w-[80px] font-semibold text-[#03071280]
//     if(seat.isBooked== true){
//         seatElement.classList.add('bg-red-700', 'cursor-not-allowed', 'disabled');

//     };
//     seatElement.classList.add('seat', 'btn', 'w-auto', 'md:w-[120px]', 'lg:w-[80px]', 'font-semibold', 'text-[#03071280]');
//     seatElement.id = `${seat.seatName}`;
//     seatElement.innerHTML = `
//         ${seat.seatName}
//     `;
//     column1.appendChild(seatElement);
// })

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
    if(element.classList.contains('bg-red-700')){
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

// main js code for seat selection
const seats = document.querySelectorAll('#all-seats .seat');
let count = 0;
for (const seat of seats) {
    seat.addEventListener('click', function (event) {
        const selected = event.target;
        const id = selected.getAttribute('id');
        console.log(id);
        const value = setBGById(id, count);
        console.log(value);
        console.log(count);
        if (count <= 4 && value !== 'error' && value!='selected') {
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
        else if(value == 'selected'){
            console.log("selected");
            alert("This seat is selcted");
        }
        else {
            alert("You Can't Select More Than 4 Seats!");
        }
    });

}

function addSelectedSeatToContainer(className) {
    const selectedSeatContainer = getElementById('selected-seat');
    const div = document.createElement('div');
    div.classList.add('flex', 'justify-between', 'mb-3', `${className}`)
    div.innerHTML = `
                    <p>${className} </p>
                    <p>Economy</p>
                    <p>550</p>
                `;
    selectedSeatContainer.appendChild(div);
}



function romoveUnselectedSeatFromContianer(className) {
    const selectedSeatContainer = document.getElementById('selected-seat');
    const elementToRemove = selectedSeatContainer.querySelector(`.${className}`);
    selectedSeatContainer.removeChild(elementToRemove);
}

function setTotalPrice(count) {
    let price = count * 550;
    setTextById('total-price', price);

}



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