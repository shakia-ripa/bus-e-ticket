<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>

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
                        <li><a href="./index.php" class="text-[#030712B3] text-lg font-semibold font-raleway">Home</a></li>
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
    <main>
        <div class="bg-[#F7F8F8] rounded-3xl mb-5 border-t-2 border-b-2 border-[#1DD100] ">
            <div class="mt-5 mx-5 lg:w-[90%] lg:mx-auto">
                <div class="flex justify-between mb-5 p-5 rounded-xl">
                    <div class="">
                        <h1 class="text-[#1DD100] mb-5 font-semibold text-3xl">Head Office</h1>
                        <p class="font-medium mb-2 text-[#030712B3]">9/2, Rajarbagh, Dhaka – 1217</p>
                        <p class="font-medium mb-2 text-[#030712B3]">TEL : +88 02 *******</p>
                        <p class="font-medium mb-2 text-[#030712B3]">Fax : +088-02-*******</p>
                        <p class="font-medium mb-2 text-[#030712B3]">Email : pparibahan@gmail.com</p>
                    </div>
                    <div>
                        <h1 class="text-[#1DD100] mb-5 font-semibold text-3xl">Call Center</h1>
                        <p class="font-medium mb-3 text-[#030712B3]">MOB : 096133*****</p>
                        <p class="font-medium mb-3 text-[#030712B3]">TEL : +88 02 *******</p>
                    </div>

                </div>

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
                        <img src="../images/playstore.png" alt="">
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
</body>

</html>