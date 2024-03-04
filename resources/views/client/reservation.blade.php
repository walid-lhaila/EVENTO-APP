@extends('header')
<body class="bg-black relative">
<div class="absolute inset-0 z-0">
    <video class="w-full h-full object-cover brightness-100" autoplay loop muted playsinline>
        <source src="{{ asset('img/video.mp4') }}" type="video/mp4">
    </video>
</div>
<div class="flex justify-between py-3 px-5 z-50 relative">
    <div class="relative z-10">
        <h1 class="px-5 font-bold text-4xl italic bg-gradient-to-r from-pink-500 via-purple-800 to-indigo-300 inline-block text-transparent bg-clip-text">E v e n t o</h1>
    </div>
    <div class="flex gap-10 py-1 ml-[-60px]">
        <a href="event"><button class="font-medium text-2xl py-1 text-white duration-300 hover:text-red-400">Event</button></a>
        <a href="reservation"><button class="font-medium text-2xl py-1 text-white duration-300 hover:text-red-400">My Reservation</button></a>
    </div>
    <div class="py-2 px-2">
        <a href="login">
            <svg class="w-9 h-9 text-white hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
            </svg>
        </a>
    </div>
</div>

<div class="flex justify-center mt-10 gap-5 text-center relative text-white z-50 auto-cols-max">
    <div class="flex flex-col p-2 bg-neutral text-2xl rounded-box text-neutral-content">
        <h1 id="hour" class="bg-gradient-to-b from-purple-500  inline-block text-transparent bg-clip-text text-7xl font-bold italic  px-3 py-1"></h1>
    </div>
<span class="text-6xl text-red-300 mt-3">:</span>
    <div class="flex flex-col p-2 bg-neutral text-2xl rounded-box text-neutral-content">
        <h1 id="minute" class="bg-gradient-to-b inline-block text-transparent bg-clip-text from-indigo-500 text-7xl font-bold italic  px-3 py-1"></h1>
    </div>
    <span class="text-6xl text-red-300 mt-3">:</span>
    <div class="flex flex-col p-2 bg-neutral text-2xl rounded-box text-neutral-content ">
        <h1 id="second" class="bg-gradient-to-b inline-block text-transparent bg-clip-text from-pink-500 text-7xl font-bold italic  px-3 py-1"></h1>
    </div>
</div>

<div class="flex flex-wrap gap-5 py-20 px-5">
                                                <!--CARDS RESERVATION-->

<div class="relative grid h-[547px] w-full max-w-[28rem] flex-col items-end justify-center overflow-hidden rounded-xl bg-white bg-clip-border text-center text-gray-700">
    <div class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('img/login.jpg')] brightness-100 bg-cover bg-clip-border bg-center text-gray-700 shadow-none">
        <div class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50"></div>
    </div>
    <div>
        <h1>walid</h1>
    </div>
    <div class="relative p-6 px-6 py-14 md:px-12">
        <h2 class="mb-6 block font-sans text-4xl font-medium leading-[1.5] tracking-normal text-white antialiased">
            How we design and code ?
        </h2>
        <h5 class="block mb-4 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-gray-400">
            Tania Andrew
        </h5>
        <img alt="Tania Andrew"
             src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
             class="relative inline-block h-[74px] w-[74px] !rounded-full border-2 border-white object-cover object-center" />
    </div>
</div>
</div>


<script src="{{url('js/clock.js')}}"></script>

</body>

