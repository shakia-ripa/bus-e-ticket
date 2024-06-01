<?php
include 'db-connection.php';

if (isset($_GET['busId'])) {

    $busId = $_GET['busId'];

    $sql1 = "SELECT * FROM seats WHERE busId = $busId";

    $sql2 = "SELECT id, busName, departureCity, departureTime, arrivalCity, arrivalTime, numberOfSeats, fare 
            FROM bus_schedules 
            WHERE  id = $busId";

    // Execute the query
    $result = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    $row = $result2->fetch_assoc();

    if ($row) {
        $id = $row['id'];
        $busname = $row['busName'];
        $departureCity = $row['departureCity'];
        $departureTime = $row['departureTime'];
        $arrivalCity = $row['arrivalCity'];
        $arrivalTime = $row['arrivalTime'];
        $numberOfSeats = $row['numberOfSeats'];
        $fare = $row['fare'];
    } else {
        // Handle case where no rows were returned
    }



    // Check if there are any schedules available for the busId
    if ($result->num_rows > 0) {
        // Start displaying the schedules using HTML
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
            <script src="https://cdn.tailwindcss.com"></script>
            <link rel="stylesheet" href="./styles/style.css">

        </head>

        <body>
            <header>
                <nav class="my-2">
                    <div class="navbar bg-base-100">
                        <div class="navbar-start">
                            <div class="dropdown">
                                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                                    </svg>
                                </div>
                                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                                    <li><a href="./index.php" class="text-[#030712B3] text-lg font-semibold font-raleway">Home</a></li>
                                    <li><a href="./about.php" class="text-[#030712B3] text-lg font-semibold font-raleway">About</a></li>
                                    <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Contact Us</a></li>
                                    <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Search</a></li>
                                </ul>
                            </div>
                            <a class="btn btn-ghost text-2xl md:text-4xl font-extrabold font-raleway">P-Ticket</a>
                        </div>
                        <div class="navbar-center hidden lg:flex">
                            <ul class="menu menu-horizontal px-1">
                                <li><a href="./index.php" class="text-[#030712B3] text-lg font-semibold font-raleway">Home</a></li>
                                <li><a href="./about.php" class="text-[#030712B3] text-lg font-semibold font-raleway">About</a></li>
                                <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Contact Us</a></li>
                                <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Search</a></li>
                            </ul>
                        </div>
                        <div class="navbar-end ">
                            <button class="btn text-[#1DD100] bg-[#d2ddd031] border-2 border-[#1DD10066]">Bus <img src="../images/bus-icon.png" alt=""></button>
                        </div>
                    </div>
                </nav>
            </header>
            <main>
                <div id="tickets-section" class="bg-[#F7F8F8] rounded-3xl border-t-2 border-[#1DD100] py-14 md:py-20 lg:py-28">
                    <div class="mx-5 lg:w-[90%] lg:mx-auto">
                        <div class="text-center">
                            <h2 class="font-raleway font-bold text-3xl md:text-4xl">P Paribahan</h2>
                            <p class="font-inter text-sm md:text-lg text-[#03071299] md:w-3/5 mx-auto mt-6 mb-10">
                                Enjoy hassle-free reservations, secure transactions, and flexible options tailored to your
                                travel needs, all at your fingertips.
                            </p>
                        </div>


                        <div class="bg-white my-5 flex flex-col md:flex-row items-center rounded-3xl">

                            <div class="w-full md:w-auto flex-1 p-6">


                                <div class="flex flex-col md:flex-row md:justify-between items-center mb-6">
                                    <div class="flex items-center gap-1 mb-3 md:mb-0">
                                        <img class="w-[50px] h-[40px] lg:w-[60px] lg:h-[50px]" src="../images/bus-logo.png" alt="">
                                        <div>
                                            <h4 class="text-xl md:text-2xl lg:text-3xl font-bold font-raleway">P Paribahan
                                            </h4>
                                            <p class=" text-xs md:text-sm  lg:text-base font-inter text-[#03071299]">
                                                Coach-009-WEB ! AC_Business</p>
                                        </div>
                                    </div>
                                    <button class="btn text-[#1DD100] bg-[#1DD10026] border-2 border-[#1DD10066] w-full md:w-auto"><span id="seat-left">40</span> Seats left
                                        <img src="../images/seat-green.png" alt=""></button>
                                </div>

                                <div class="w-full md:w-auto bg-[#F7F8F8] rounded-3xl p-6 space-y-3">
                                    <p class="flex justify-between border-dotted border-b-2 border-[#03071233] pb-3">
                                        <span>Route</span>
                                        <span id="search-from"><?php echo htmlspecialchars($departureCity); ?></span>
                                        <span id="search-to"><?php echo htmlspecialchars($arrivalCity); ?></span>
                                    </p>
                                    <p class="flex justify-between border-dotted border-b-2 border-[#03071233] pb-3">
                                        <span>Departure Time</span><span id="departing-time"><?php echo htmlspecialchars($departureTime); ?></span>
                                    </p>
                                    <p class="flex flex-col lg:flex-row justify-between  gap-2 space-y-4 lg:space-y-0">
                                        <Button class="btn">Boarding Point - <span id="boarding"><?php echo htmlspecialchars($departureCity); ?></span></Button>
                                        <Button class="btn">Dropping Point - <span id="dropping"><?php echo htmlspecialchars($arrivalCity); ?></span></Button>

                                    </p>
                                </div>
                            </div>
                            <div>
                                <img class="hidden md:block " src="../images/info-devider.png" alt="">
                            </div>
                            <div class="w-full md:w-1/5 flex flex-row md:flex-col justify-center items-center gap-4 md:space-y-1 mb-4 md:mb-0">
                                <img class="w-[40px]" src="../images/fare.png" alt="">
                                <h1 id="seat-fare" class="text-xl md:text-2xl font-bold font-raleway text-[#030712]"><?php echo htmlspecialchars($fare); ?></h1>
                                <p class="text-base md:text-lg font-medium font-raleway text-[#0307127F]">Per Seat</p>
                            </div>
                        </div>


                        <div class="p-8 bg-white rounded-3xl flex flex-col justify-between lg:flex-row ">

                            <div class="w-full lg:w-7/12 lg:pr-6 lg:border-r-2 lg:border-dotted lg:border-[#0307124D]">
                                <div>
                                    <h4 class="font-raleway font-semibold text-xl">Select Your Seat</h4>
                                    <div class="flex justify-between my-6 border-dotted border-y-2 border-[#03071233] py-3">
                                        <p class="flex gap-1"><img src="../images/seat-gray.png" alt=""><span class=" font-inter font-medium text-[#0307127F]">Available</span></p>

                                        <p class="flex gap-1"><img src="../images/seat-green-filled.png" alt=""><span class="font-inter font-medium text-[#1DD100]">Selected</span></p>
                                    </div>
                                    <div class="w-full text-right mb-4">
                                        <button class="btn">
                                            <img class="bg-none" src="../images/steering-wheel.svg" alt="">
                                        </button>
                                    </div>
                                </div>


                                <div class="flex font-inter">

                                    <div class="grid grid-cols-1 justify-items-center place-items-center gap-5 w-1/6 font-inter font-semibold text-[#03071280]">
                                        <p class="h-[42px]">A</p>
                                        <p class="h-[42px]">B</p>
                                        <p class="h-[42px]">C</p>
                                        <p class="h-[42px]">D</p>
                                        <p class="h-[42px]">E</p>
                                        <p class="h-[42px]">F</p>
                                        <p class="h-[42px]">G</p>
                                        <p class="h-[42px]">H</p>
                                        <p class="h-[42px]">I</p>
                                        <p class="h-[42px]">J</p>
                                    </div>
                                    <div id="all-seats" class="flex justify-between gap-6 w-full ">
                                        <!-- left column -->
                                        <div class="flex flex-row justify-between items-center gap-4 ">


                                            <div class="grid grid-cols-4 gap-10 ">
                                                <?php
                                                while ($row = $result->fetch_assoc()) {

                                                ?>

                                                    <button id="<?php echo htmlspecialchars($row['seatId']); ?>" class="seat btn w-auto md:w-[120px] lg:w-[80px] font-semibold text-[#03071280]" data-is-booked="<?php echo htmlspecialchars($row['isBooked']); ?>">
                                                        <?php echo htmlspecialchars($row['seatId']); ?>
                                                    </button>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="w-full mt-6 lg:mt-0 lg:w-2/5 lg:pl-6">
                                <h4 class="font-raleway font-semibold pb-6 text-xl border-b-2 border-dotted border-[#0307124D]">
                                    Selected Seat</h4>


                                <div class="bg-[#F7F8F8] rounded-3xl p-6 my-6">
                                    <div class="flex justify-between font-medium">
                                        <p>Seat <span id="seats-count" class="bg-[#1DD100] px-2 rounded-3xl text-sm text-white font-inter font-bold">0</span>
                                        </p>
                                        <p>Class</p>
                                        <p>Price</p>
                                    </div>
                                    <div id="selected-seat" class="border-b-2 border-t-2 border-dotted border-[#0307124D] py-2 my-2 text-[#03071299]">



                                    </div>
                                    <div class="flex justify-between font-medium">
                                        <p>Total Amount</p>
                                        <p>BDT <span id="total-price">0</span></p>
                                    </div>

                                </div>


                                <div>
                                    <label class="form-control w-full max-w-xs mb-5">
                                        <span class="label-text font-inter font-semibold mb-3">Passenger Name*</span>
                                        <input id="name" type="text" placeholder="Enter your name" class="input input-bordered w-full max-w-xs p-4 font-inter" required />
                                    </label>
                                    <label class="form-control w-full max-w-xs mb-5">
                                        <span class="label-text font-inter font-semibold mb-3">Phone Number*</span>
                                        <input id="phone" type="tel" placeholder="Enter your phone number" class="input input-bordered w-full max-w-xs p-4 font-inter" required />
                                    </label>
                                    <label class="form-control w-full max-w-xs mb-5">
                                        <span class="label-text font-inter font-semibold mb-3">Email ID*</span>
                                        <input id="email" type="email" placeholder="Enter your email id" class="input input-bordered w-full max-w-xs p-4 font-inter" />
                                    </label>

                                    <button id="next-btn" class="btn btn-disabled bg-[#1DD100] w-full md:w-1/2 lg:w-full text-white font-raleway font-extrabold" onclick="my_modal_5.showModal(); setData();">Next</button>


                                    <dialog id="my_modal_5" class="modal modal-center sm:modal-middle">
                                        <div class="modal-box bg-[#FFFFFF] md:py-10 md:px-20 md:h-[90%] font-roboto flex flex-col justify-center items-center space-y-4 md:space-y-7s">
                                            <img src="../images/success.png" alt="">
                                            <h3 class="font-bold text-2xl font-roboto text-[#27AE60]">SUCCESS</h3>
                                            <div class="">
                                                <p class="text-center font-medium text-xl text-[#4A4A4A] mb-2">Thank you for Booking
                                                    Our
                                                    Bus Seats.</p>
                                                <div id="user-info">

                                                </div>
                                                <p class="text-center font-light text-xl text-[#4A4A4A]">Shortly you will find a
                                                    confirmation
                                                    in your email.</p>
                                            </div>
                                            <div class="modal-action">
                                                <button class="btn w-full rounded-3xl bg-[#27AE60] font-semibold text-lg text-white px-20"><a href="./index.php">Close</a></button>
                                            </div>
                                        </div>
                                    </dialog>
                                </div>

                                <!-- policy -->
                                <div class="flex justify-between w-full lg:w-full md:w-1/2 mt-6">
                                    <p class="text-[#2f333d99] font-inter text-sm border-b-2 border-[#68718599]"><a href="">Terms and Conditions</a></p>
                                    <p class="text-[#2f333d99] font-inter text-sm border-b-2 border-[#68718599]"><a href="">Cancellation Policy</a></p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </main>

            <script>
                let count = 0;

                // utility code
                function scrollFunction() {
                    const element = document.getElementById("tickets-section");
                    element.scrollIntoView();
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

                function setBGById(elementID, count) {
                    const element = document.getElementById(elementID);
                    console.log(element);
                    if (element.classList.contains('bg-red-700')) {
                        return 'selected';
                    } else if (element.classList.contains('bg-[#1DD100]', 'text-white')) {
                        console.log("Its green");
                        element.classList.remove('bg-[#1DD100]', 'text-white');
                    } else {
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
                let bookedSeat = 0;
                let seatLeft = 0;

                const seats = document.querySelectorAll('#all-seats .seat');

                for (const seat of seats) {
                    console.log(seat);
                    const isBooked = seat.dataset.isBooked;
                    console.log(isBooked);
                    if (isBooked == 1) {
                        seat.classList.add('bg-red-700');
                        bookedSeat++;
                    }
                    seatLeft = 40 - bookedSeat;

                    seat.addEventListener('click', function(event) {


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
                            } else {
                                count--;
                                currSeatLeft += 1;
                                setTextById('seat-left', currSeatLeft);
                                setTextById('seats-count', count);

                                romoveUnselectedSeatFromContianer(`${selected.innerText}`);
                                setTotalPrice(count);
                                enableOrDisableNextButton();
                            }
                        } else if (value == 'selected') {
                            console.log("selected");
                            alert("This seat is selcted");
                        } else {
                            alert("You Can't Select More Than 4 Seats!");
                        }

                    });
                    const seatLeftElement = document.getElementById('seat-left');
                    seatLeftElement.innerText = seatLeft;

                }


                function addSelectedSeatToContainer(className) {
                    const fare = Number(document.getElementById('seat-fare').innerText);
                    const selectedSeatContainer = getElementById('selected-seat');
                    const div = document.createElement('div');
                    div.classList.add('flex', 'justify-between', 'mb-3', `${className}`)
                    div.innerHTML = `
                    <p>${className} </p>
                    <p>Economy</p>
                    <p>${fare}</p>
                `;
                    selectedSeatContainer.appendChild(div);
                }

                function romoveUnselectedSeatFromContianer(className) {
                    const selectedSeatContainer = document.getElementById('selected-seat');
                    const elementToRemove = selectedSeatContainer.querySelector(`.${className}`);
                    selectedSeatContainer.removeChild(elementToRemove);
                }

                function setTotalPrice(count) {
                    const fare = Number(document.getElementById('seat-fare').innerText);
                    let price = count * fare;
                    setTextById('total-price', price);
                    setTextById('grand-total-price', price);
                    const couponContainer = document.getElementById('coupon-container');
                    couponContainer.classList.remove('hidden');
                }

                function enableOrDisableApplyButton(count) {
                    const applyBtn = getElementById('coupon-btn');
                    if (count === 4) {
                        applyBtn.classList.remove("btn-disabled");
                    } else {
                        applyBtn.classList.add("btn-disabled");
                        setTotalPrice(count);
                        setTextById('discount-amount', 0)
                    }
                }


                document.getElementById('phone').addEventListener('keyup', enableOrDisableNextButton);

                function enableOrDisableNextButton() {
                    const nextBtn = getElementById('next-btn');
                    const phoneField = getElementById('phone');
                    const phoneValue = phoneField.value;
                    console.log(phoneValue);
                    if (count && phoneValue !== "") {
                        nextBtn.classList.remove('btn-disabled');
                    } else {
                        nextBtn.classList.add('btn-disabled')
                    }
                }

                function setData() {

                    const userInfoDiv = document.getElementById('user-info');
                    const seats = document.getElementById('selected-seat').innerText;
                    const name = document.getElementById('name').value;
                    const email = document.getElementById('email').value;
                    const phone = document.getElementById('phone').value;
                    const paid = document.getElementById('total-price').innerText;
                    console.log(name, email);



                    // Data object to be sent to the backend
                    const data = {
                        name: name,
                        email: email,
                        phone: phone,
                        paid: paid
                    };

                    if (Object.keys(data).length > 0) {
                        // Fetch API POST request
                        fetch('./post-data.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(data)
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.text();
                            })
                            .then(data => {
                                console.log('Data sent:', data);
                                // Handle response from the backend if needed
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }
                    userInfoDiv.classList.add('text-center', 'font-medium', 'text-xl', 'text-[#4A4A4A]', 'mb-2', 'border-1', 'border-gray', 'rounded-xl')

                    userInfoDiv.innerHTML = `
                        <p>Name: ${name}</p>
                        <p>Email: ${email}</p>
                        <p>Phone: ${phone}</p>
                        <p>Total Paid: ${paid}</p>
                    `
                }
            </script>


        </body>

        </html>
<?php
    } else {
        echo '<html>
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="./styles/style.css">

    </head>
    <main>
         <header>
        <nav class="my-2">
            <div class="navbar bg-base-100">
                <div class="navbar-start">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden p-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="./index.php" class="text-[#030712B3] text-lg font-semibold font-raleway">Home</a></li>
                            <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">About</a></li>
                            <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Destination</a></li>
                            <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Search</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-ghost text-2xl md:text-4xl font-extrabold font-raleway">P-Ticket</a>
                </div>
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1">
                        <li><a href="./index.php" class="text-[#030712B3] text-lg font-semibold font-raleway">Home</a></li>
                        <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">About</a></li>
                        <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Destination</a></li>
                        <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Search</a></li>
                    </ul>
                </div>
                <div class="navbar-end ">
                    <button class="btn text-[#1DD100] bg-[#d2ddd031] border-2 border-[#1DD10066]">Bus <img src="../images/bus-icon.png" alt=""></button>
                </div>
            </div>
        </nav>
    </header>
        <p style="font-weight: 600; text-align: center; font-size: 28px; margin-top:60px;">
        No schedules available for this bus</p>
        </main>
        </html>
        ';
    }
} else {

    echo 'Error: Missing busId parameter';
}

$conn->close();
?>