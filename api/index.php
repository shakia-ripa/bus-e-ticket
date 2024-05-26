<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P Paribahan</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body class="">
    <header class="mx-5 lg:w-[90%] lg:mx-auto">
        <!-- Navbar -->
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
                            <li><a href="./index.html" class="text-[#030712B3] text-lg font-semibold font-raleway">Home</a></li>
                            <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">About</a></li>
                            <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Destination</a></li>
                            <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Search</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-ghost text-2xl md:text-4xl font-extrabold font-raleway">P-Ticket</a>
                </div>
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1">
                        <li><a href="./index.html" class="text-[#030712B3] text-lg font-semibold font-raleway">Home</a></li>
                        <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">About</a></li>
                        <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Destination</a></li>
                        <li><a class="text-[#030712B3] text-lg font-semibold font-raleway">Search</a></li>
                    </ul>
                </div>
                <div class="navbar-end ">
                    <button class="btn text-[#1DD100] bg-[#d2ddd031] border-2 border-[#1DD10066]">Bus <img src="./images/bus-icon.png" alt=""></button>
                </div>
            </div>
        </nav>

        <!-- Banner -->
        <div>
            <div class="hero min-h-96 md:min-h-full lg:min-h-full bg-gradient-to-r from-[#484e5e7f] to-[#979ca9] rounded-3xl md:p-16" style="background-image: url(./images/banner.png); background-size: cover; background-position: center;">
                <div class="hero-content text-center text-neutral-content">
                    <div class=" max-w-max md:max-w-lg lg:max-w-2xl">
                        <h1 class="md:leading-snug leading-tight text-3xl md:text-6xl text-white  font-extrabold font-raleway">
                            End-to-End Travel with<br><span class="text-[#1DD100] ">P Paribahan</span></h1>
                        <p class=" md:mb-6 my-3 font-inter text-sm md:text-lg text-white">Embark on Effortless Journeys
                            with
                            Ease! Book Your Bus Tickets Online Today and Travel with Confidence. Enjoy Convenient
                            Booking,
                            Secure Transactions, and Flexible Options. Your Next Adventure Awaits – Start Planning Now!
                        </p>
                        <button onclick="scrollFunction()" class="btn bg-[#1DD100] border-none text-black text-base md:text-xl font-bold font-raleway ">Buy
                            Tickets</button>
                    </div>

                </div>
            </div>

            <div class=" my-3  md:w-4/5 mx-auto flex flex-col md:flex-row gap-5 md:relative md:-top-5 lg:-top-14">
                <div class="stat bg-white  border-b-2 border-[#1DD100] rounded-3xl flex justify-center items-center">
                    <div class="">
                        <img src="./images/people.png" alt="">
                    </div>
                    <div>
                        <div class="stat-value text-lg md:text-2xl font-bold font-inter">500K+</div>
                        <div class="stat-desc font-inter">Registered users</div>
                    </div>
                </div>
                <div class="stat bg-white border-b-2 border-[#1DD100] rounded-3xl flex justify-center items-center">
                    <div class="">
                        <img src="./images/ticket-cupon.png" alt="">
                    </div>
                    <div>
                        <div class="stat-value text-lg md:text-2xl font-bold font-inter">1.7 lacks</div>
                        <div class="stat-desc font-inter">Tickets sold</div>
                    </div>
                </div>
                <div class="stat bg-white border-b-2 border-[#1DD100] rounded-3xl flex justify-center items-center">
                    <div class="">
                        <img src="./images/stoppage.png" alt="">
                    </div>
                    <div>
                        <div class="stat-value text-lg md:text-2xl font-bold font-inter">80K+</div>
                        <div class="stat-desc font-inter">Rental partners</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>

        <!-- destination -->
        <div id="destination-section" class="my-10 md:mb-20 mx-5 lg:w-[80%] lg:mx-auto">
            <div class="bg-[#7bee6a] px-6 py-10 rounded-2xl ">
                <form action="./api/bus-schedules.php" method="POST" class=" mx-auto flex justify-evenly">
                    <div>
                        <div class="mb-5">
                            <label for="from" class="text-2xl md:text-2xl font-bold text-[#030712] ">Leaving
                                From</label>
                            <br>
                            <select name="from" id="leaving-from" class="w-96 rounded-md py-2 px-3 mt-3">
                                <option value="" disabled selected> Select City</option>
                                <option value="Chattogram">Chattogram</option>
                                <option value="Cox's Bazar">Coxs Bazar</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Sylhet">Sylhet</option>
                            </select>
                        </div>
                        <div>
                            <label for="to" class="text-2xl md:text-2xl font-bold text-[#030712]">Going To</label>
                            <br>
                            <select name="to" id="going-to" class="w-96 rounded-md py-2 px-3 mt-3">
                                <option value="" disabled selected> Select City</option>
                                <option value="Chattogram">Chattogram</option>
                                <option value="Cox's Bazar">Coxs Bazar</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Sylhet">Sylhet</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="departing_date" class="text-2xl md:text-2xl font-bold text-[#030712] ">Departing Date</label>
                        <br>
                        <input type="date" name="departing_date" id="departing-date" class="w-96 rounded-md py-2 px-3 mt-3">
                        <div>
                            <button id="search-btn" type="submit" class="btn w-96 bg-white border-none text-black text-lg md:text-xl font-bold mt-12">Search</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </main>
    <footer class="bg-[#030712] py-8 md:py-10 lg:py-14">
        <div class="mx-5 lg:w-[90%] lg:mx-auto">
            <div class="border-b-2 border-dashed border-[#FFFFFF4D] pb-4 md:pb-10 flex flex-col md:flex-row justify-between">
                <div class="mb-5 md:mb-0">
                    <h1 class="text-3xl font-raleway text-white font-extrabold">P-Ticket</h1>
                    <p class="font-inter text-[#FFFFFFCC] mt-2 md:mt-4">P-Ticket is a digital platform to make
                        your<br>daily commuting better.</p>
                </div>

                <div class="font-raleway text-white">
                    <p class="font-semibold mb-2 md:mb-4">Download our app</p>
                    <div class="flex gap-2 border-2 rounded-md p-1 w-fit md:w-auto">
                        <img src="./images/playstore.png" alt="">
                        <p>GET IT ON
                            <br>
                            <span class="font-bold">Google Play</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row justify-between mt-6">
                <p class="text-[#FFFFFFB2] text-sm mb-3 lg:mb-0">@all rights reserved, P-Ticket services limited.2024
                </p>
                <div class="flex flex-col md:flex-row md:gap-5 lg:justify-between lg:gap-6 font-inter font-medium text-sm text-[#FFFFFF] space-y1 md:space-y-0">
                    <p>Terms & condition</p>
                    <p>Return & refund policy</p>
                    <p>Privacy policy</p>
                </div>
            </div>

        </div>

    </footer>

    <script src="./scripts/script.js"></script>


</body>

</html>