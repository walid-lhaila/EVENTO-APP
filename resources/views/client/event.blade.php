@extends('header')
<body class="bg-cover w-full min-h-screen" style="background-image: url('img/client.jpg'); margin: 0;">
<div class="absolute w-full inset-0 bg-gray-900 opacity-90" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; overflow-y: auto;">

    <div class="flex gap-5 justify-between p-5 z-50">
        <div>
            <h1 class="px-5 font-bold text-4xl italic bg-gradient-to-r from-pink-500 via-purple-800 to-indigo-300 inline-block text-transparent bg-clip-text">E v e n t o</h1>
        </div>
        <div class="flex gap-10 py-1 ml-[-60px]">
            <a href="event"><button class="font-medium text-2xl px-3 py-1 text-white  duration-300 hover:text-red-400">Event</button></a>
            <a href="reservation"><button class="font-medium text-2xl px-3 py-1 text-white duration-300 hover:text-red-400">My Reservation</button></a>
        </div>
        <div class="py-2">
            <a href="login">
                <svg class="w-9 h-9 text-white hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="flex justify-center mt-32 z-50">
        <h1 class=" text-9xl font-serif bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text">E V E N T O</h1>
    </div>
    <div class="flex justify-center  z-50">
        <h1 class=" text-3xl font-serif bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text">I g n i t e <span class="px-2"> </span> Y o u r <span class="px-2"> </span> N i g h t</h1>
    </div>


    <div id="form" class="absolute w-full h-full inset-0 bg-opacity-50 backdrop-filter backdrop-blur-md flex justify-center items-center bg-gradient-to-b from-pink-500 via-pink-400 to-pink-300 scale-0 z-50   duration-300">
        <div class=" bg-purple-500  w-[700px] rounded-md ml-[20px]">
            <form action="" method="post" enctype="multipart/form-data" class="max-w-md mx-auto  bg-purple-500  py-10">
                @csrf <!-- Add this to include the CSRF token -->

                <div class="flex justify-end">
                    <svg id="closeForm" class="w-6 h-6 text-white dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>
                <div class="flex gap-10">

                    <div class="relative z-0 w-full mt-5 mb-5 group">
                        <input type="number" name="person" id="person" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required min="1" />
                        <label for="person" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Number Of Place</label>
                    </div>

                </div>
                <div class="flex justify-center">
                    <button type="submit" class="text-black bg-gray-200 hover:bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>


                                                        <!--SEARCH-->
    <div class="flex justify-center mt-16 z-50">
        <form class="max-w-lg mx-auto">
            <div class="flex w-[550px]">
                <div>
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex w-[140px] items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300  hover:bg-gray-200  focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-b-md shadow w-[140px] dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            @foreach($categories as $category)
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$category->name}}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="relative w-full">
                    <input type="search" id="" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-[42px] text-white bg-indigo-400 rounded-e-lg border border-blue-700 hover:bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-blue-300  duration-500 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

                                                <!--CARDS-->
    <div class=" flex flex-wrap ml-16 mt-10">

        @foreach($events as $event)

            <div class="w-[800px] bg-cover border-4 border-double border-purple-400 rounded-lg brightness-100 m-10" style="background-image: url('{{asset('storage/' . $event->image)}}')">
                <div class="flex justify-between p-5">
                    <div>
                        <h1 class="text-5xl font-bold text-pink-200 py-1">{{$event->title}}</h1>
                        <p class="text-white">{{$event->description}}</p>
                    </div>
                    @php
                        $eventDate = \Carbon\Carbon::parse($event->date);
                    @endphp
                    <div>
                        <h1 class="text-white text-xl font-mono">{{ $eventDate->format('l') }}</h1>
                        <div class="flex">
                            <h1 class="text-pink-700 text-xl font-bold">{{ $eventDate->format('d') }}\</h1>
                            <span class="text-3xl italic font-bold text-pink-700"> {{ $eventDate->format('M') }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between px-3">
                    <div class="">
                        <div class="flex gap-2">
                            <svg class="w-6 h-6 text-gray-800 mt-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 14h0a7 7 0 1 0-11.5 0h0l.1.3.3.3L12 21l5.1-6.2.6-.7.1-.2Z"/>
                            </svg>
                            <h1 class="text-white font-medium text-xl mt-4">{{$event->adress}}</h1>
                        </div>
                        <div class="flex gap-10">
                            <div class="py-2 flex gap-3">
                                <img class="h-8 w-8 mt-1" src="{{url('img/seat.png')}}" alt="">
                                <h1 class="text-white font-bold font-mono text-4xl">{{$event->siege}}</h1>
                            </div>
                            <div>
                                <h1 class="text-pink-800 font-bold font-mono mt-2 text-3xl">{{$event->price}}$</h1>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h1 class="text-white font-medium text-lg">Open Doors</h1>
                        <h1 class="text-pink-700 font-bold text-lg">{{ $eventDate->format('H:i') }} Onwards</h1>
                    </div>


                </div>

                <div class="flex justify-center py-1">
                    <button id="btn" class="text-white bg-purple-600 hover:bg-purple-800 duration-300 px-3 py-1 text-xl rounded-md font-medium items-center">
                        Reserve
                    </button>
                </div>
            </div>
        @endforeach





    </div>

                                                        <!--END CARDS-->
</div>

<script src="{{url('js/filter.js')}}"></script>
<script src="{{url('js/form.js')}}"></script>
</body>
</html>
