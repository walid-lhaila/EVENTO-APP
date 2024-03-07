@extends('header')
<body class="bg-cover w-full min-h-screen brightness-125" style="background-image: url('img/client.jpg'); margin: 0;">
<div class="absolute w-full inset-0 bg-black opacity-80" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; overflow-y: auto;">

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

            <div class="w-[800px] relative bg-cover border-4  border-double border-purple-400 rounded-lg  m-10" style="background-image: url('{{asset('storage/' . $event->image)}}')">
                <div class="absolute inset-0 bg-black opacity-50 rounded-lg"></div>

                <div class="flex justify-between p-5 z-10">
                    <div class="z-10">
                        <h1 class="text-5xl font-bold text-pink-200 py-1">{{$event->title}}</h1>
                        <p class="text-white">{{$event->description}}</p>
                    </div>
                    @php
                        $eventDate = \Carbon\Carbon::parse($event->date);
                    @endphp
                    <div class="z-10">
                        <h1 class="text-white text-xl font-mono">{{ $eventDate->format('l') }}</h1>
                        <div class="flex">
                            <h1 class="text-pink-700 text-xl font-bold">{{ $eventDate->format('d') }}\</h1>
                            <span class="text-3xl italic font-bold text-pink-700"> {{ $eventDate->format('M') }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between px-3 z-10">
                    <div class="">
                        <div class="flex gap-2 z-10">
                            <svg class="w-6 h-6 z-10 text-gray-800 mt-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 14h0a7 7 0 1 0-11.5 0h0l.1.3.3.3L12 21l5.1-6.2.6-.7.1-.2Z"/>
                            </svg>
                            <h1 class="text-white z-10 font-medium text-xl mt-4">{{$event->adress}}</h1>
                        </div>
                        <div class="flex gap-10">
                            <div class="py-2 flex gap-3 z-10">
                                <img class="h-8 w-8 mt-1" src="{{url('img/seat.png')}}" alt="">
                                <h1 class="text-white font-bold font-mono text-4xl">{{$event->siege}}</h1>
                            </div>
                            <div class="z-10">
                                <h1 class="text-pink-800 font-bold font-mono mt-2 text-3xl">{{$event->price}}$</h1>
                            </div>
                        </div>
                    </div>

                    <div class="z-10">
                        <h1 class="text-white font-medium text-lg">Open Doors</h1>
                        <h1 class="text-pink-700 font-bold text-lg">{{ $eventDate->format('H:i') }} Onwards</h1>
                    </div>

                </div>

                <div class="flex justify-center py-2">
                    <form action="{{route('reservation.store')}}" method="post" enctype="multipart/form-data" class="z-10" >
                        @csrf
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <input type="hidden" name="person" value="1">

                        <button type="submit"  class="text-white z-10 bg-purple-600 hover:bg-purple-800 duration-300 px-3 py-1 text-xl rounded-md font-medium items-center">
                            Reserve
                        </button>
                    </form>
                </div>

            </div>

        @endforeach





    </div>

                                                        <!--END CARDS-->
</div>

<script src="{{url('js/filter.js')}}"></script>
<script src="{{url('js/reserve.js')}}"></script>
</body>
</html>
