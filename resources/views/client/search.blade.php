@extends('header')
<body class="bg-cover w-full min-h-screen brightness-125" style="background-image: url('img/client.jpg'); margin: 0;">
<div class="absolute w-full inset-0 bg-black opacity-80" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; overflow-y: auto;">

    <div class="flex gap-5 justify-between p-5 z-50">
        <div>
            <h1 class="px-5 font-bold text-4xl italic bg-gradient-to-r from-pink-500 via-purple-800 to-indigo-300 inline-block text-transparent bg-clip-text">E v e n t o</h1>
        </div>
        <div class="py-2">
            <a href="login">
                <svg class="w-9 h-9 text-white hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                </svg>
            </a>
        </div>
    </div>

    <a href="{{route('client.event')}}"><button class=" absolute ml-5 mt-5 hover:bg-purple-400 duration-700 bg-gray-200 rounded-lg px-1">
            <svg class="w-[46px] h-[36px] text-purple-400 hover:text-white duration-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.6" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
            </svg>
        </button></a>
                                                        <div class="flex justify-center items-center  mt-10">

                                                            <h1 class="text-white text-3xl font-mono font-bold">Your Search Result !!</h1>
                                                        </div>
<div class=" flex flex-wrap justify-center ml-16 mt-10">

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
                            <h1 class="text-white font-bold font-mono text-4xl">{{$event->remainingSeats()}}</h1>
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
                @if($event->remainingSeats() > 0)
                    <form action="{{route('reservation.store')}}" method="post" enctype="multipart/form-data" class="z-10" >
                        @csrf
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <input type="hidden" name="person" value="1">

                        <button type="submit"  class="text-white z-10 bg-purple-600 hover:bg-purple-800 duration-300 px-3 py-1 text-xl rounded-md font-medium items-center">
                            Reserve
                        </button>
                    </form>
                @else
                    <p class="text-white z-10 bg-red-500 px-2 rounded font-medium mt-4">Oops! All seats for this event have been taken.</p>
                @endif

            </div>

        </div>

    @endforeach





</div>
</body>
