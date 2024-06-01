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
                            <li><a href="./contact.php" class="text-[#030712B3] text-lg font-semibold font-raleway">Contact Us</a></li>
                            <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Search</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-ghost text-2xl md:text-4xl font-extrabold font-raleway">P-Ticket</a>
                </div>
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1">
                        <li><a href="./index.php" class="text-[#030712B3] text-lg font-semibold font-raleway">Home</a>
                        </li>
                        <li><a href="./about.php" class="text-[#030712B3] text-lg font-semibold font-raleway">About</a></li>
                        <li><a href="./contact.php" class="text-[#030712B3] text-lg font-semibold font-raleway">Contact Us</a></li>
                        <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Search</a></li>
                    </ul>
                </div>
                <div class="navbar-end ">
                    <button class="btn text-[#1DD100] bg-[#d2ddd031] border-2 border-[#1DD10066]">Bus <img src="../images/bus-icon.png" alt=""></button>
                </div>
            </div>
        </nav>
    </header>


    <main class="my-10  mx-5 lg:w-[92%] lg:mx-auto">
        <h1 class="flex justify-center text-4xl font-semibold">Available Buses</h1>
        <div id="buses-container" class="my-20 ">
            <div class="flex justify-between gap-5 bg-[#1DD100] rounded-xl py-5 px-4 mb-6">
                <h2 class="text-xl font-semibold flex-grow w-1/4 text-center ">Busname</h2>
                <h2 class="text-xl font-semibold flex-grow w-1/4 text-center ">Departure City</h2>
                <h2 class="text-xl font-semibold flex-grow w-1/4 text-center ">Departure Time</h2>
                <h2 class="text-xl font-semibold flex-grow w-1/4 text-center ">Arrival City</h2>
                <h2 class="text-xl font-semibold flex-grow w-1/4 text-center ">Arrival Time</h2>
                <h2 class="text-xl font-semibold flex-grow w-1/4 text-center ">Seat Capacity</h2>
                <h2 class="text-xl font-semibold flex-grow w-1/4 text-center ">Fare</h2>
                <h2 class="text-xl font-semibold flex-grow w-1/4 text-center "></h2>
            </div>
        </div>
    </main>


    <?php
    include 'db-connection.php';

    if (isset($_GET['departureCity']) && isset($_GET['arrivalCity'])) {

        $departureCity = mysqli_real_escape_string($conn, $_GET['departureCity']);
        $arrivalCity = mysqli_real_escape_string($conn, $_GET['arrivalCity']);

        $sql = "SELECT id, busName, departureCity, departureTime, arrivalCity, arrivalTime, numberOfSeats, fare 
            FROM bus_schedules 
            WHERE departureCity = '$departureCity' AND arrivalCity = '$arrivalCity'";
    } else {

        $sql = "SELECT id,busName, departureCity, departureTime, arrivalCity, arrivalTime, numberOfSeats, fare 
            FROM bus_schedules";
    }

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="bus-info w-[92%] mx-auto rounded-xl py-5 px-4 mb-6 flex justify-between items-center  gap-5 bg-slate-100">
                <h2 class="text-xl font-semibold"><?php echo htmlspecialchars($row["busName"]); ?></h2>
                <p class="text-lg font-semibold"><?php echo htmlspecialchars($row["departureCity"]); ?></p>
                <p class="text-lg font-semibold"><?php echo htmlspecialchars($row["departureTime"]); ?></p>
                <p class="text-lg font-semibold"><?php echo htmlspecialchars($row["arrivalCity"]); ?></p>
                <p class="text-lg font-semibold"><?php echo htmlspecialchars($row["arrivalTime"]); ?></p>
                <p class="text-lg font-semibold"><?php echo htmlspecialchars($row["numberOfSeats"]); ?></p>
                <p class="text-lg font-semibold"><?php echo htmlspecialchars($row["fare"]); ?></p>
                <a href="seats.php?busId=<?php echo htmlspecialchars($row["id"]); ?>" class="btn view-seats-btn bg-[#1DD100] text-white">View Seats</a>
            </div>
    <?php
        }
    } else {
        echo '<p class="text-center text-2xl font-semibold">No buses available</p>';
    }

    $conn->close();
    ?>
</body>

</html>