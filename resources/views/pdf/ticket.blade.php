@extends('header')
<body>
    <div class="w-[800px] relative bg-cover border-4  border-double border-purple-400 rounded-lg  m-10" style="background-image: url('{{asset('storage/' . $reservation->event->image)}}')">
        <div class="absolute inset-0 bg-black opacity-50 rounded-lg"></div>

        <div class="flex justify-between p-5 z-10">
            <div class="z-10">
                <h1 class="text-5xl font-bold text-pink-200 py-1"> {{ $reservation->event->title }}</h1>
                <p class="text-white"> {{ $reservation->event->description }}</p>
            </div>
            @php
                $eventDate = \Carbon\Carbon::parse($reservation->event->date);
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
                    <h1 class="text-white z-10 font-medium text-xl mt-4">{{$reservation->event->adresse}}</h1>
                </div>
                <div class="flex gap-10">

                    <div class="z-10">
                        <h1 class="text-pink-800 font-bold font-mono mt-2 text-3xl">{{$reservation->event->adresse}}$</h1>
                    </div>
                </div>
            </div>

            <div class="z-10">
                <h1 class="text-white font-medium text-lg">Open Doors</h1>
                <h1 class="text-pink-700 font-bold text-lg">{{ $eventDate->format('H:i') }} Onwards</h1>
            </div>

        </div>

    </div>
</body>
