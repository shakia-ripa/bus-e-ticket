

const searchFrom =JSON.parse(localStorage.getItem('searchFrom'))
const searchTo = JSON.parse(localStorage.getItem('searchTo'))

document.getElementById('search-from').innerText= searchFrom
document.getElementById('search-to').innerText= searchTo
document.getElementById('boarding').innerText= searchFrom
document.getElementById('dropping').innerText= searchTo





function transformSeatData(seatArray) {
    console.log(seatArray);
    const seatData = {
        busId: "",
        rows: []
    };

    const rowMap = {};

    seatArray.forEach(seat => {
        const { rowName, seatId, isBooked , busId} = seat;
        
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



    fetch('http://localhost/inc/api/seats.php')
    .then(res=> res.json())
    .then(data=> {
       
       const result =  transformSeatData(data)
      
       distributeSeats(result);
    })




    let bookedSeat = 0;
    let seatLeft = 0;


        function createSeatButton(seat) {
        
            if(seat.isBooked){
                bookedSeat++;
            }
            seatLeft = 40-bookedSeat;
         
            const button = document.createElement('button');
            button.id = seat.id;
            button.textContent = seat.id;
            button.classList.add('seat', 'btn', 'w-auto', 'md:w-[120px]', 'lg:w-[80px]', 'font-semibold', 'text-[#03071280]');
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
                column.forEach(seat => {
                    const seatButton = createSeatButton(seat);
                    columnDiv.appendChild(seatButton);
                });
            });
        }