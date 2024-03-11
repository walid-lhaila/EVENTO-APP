@extends('header')

<body class="bg-cover relative  w-full min-h-screen brightness-125" style="background-image: url('img/bg.jpg');">
<div class="absolute w-full inset-0 bg-black opacity-90" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; overflow-y: auto;">

    <div class="flex gap-5 justify-between p-5 z-50">
        <div>
            <h1 class="px-5 font-bold text-4xl italic bg-gradient-to-r from-pink-500 via-purple-800 to-indigo-300 inline-block text-transparent bg-clip-text">E v e n t o</h1>
        </div>
        <div class="py-2 flex gap-4">

            <a href="login">
                <svg class="w-9 h-9 text-white hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                </svg>
            </a>
        </div>
    </div>



    <div class="flex justify-center mt-28 z-50">
        <h1 class=" text-9xl font-serif bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text">E V E N T O</h1>
    </div>
    <div class="flex justify-center  z-50">
        <h1 class=" text-3xl font-serif bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text">I g n i t e <span class="px-2"> </span> Y o u r <span class="px-2"> </span> N i g h t</h1>
    </div>


    <div class="flex justify-center mt-20 gap-5 items-center">
        <div>
            <img class="w-96 h-[419px]" src="{{url('img/login.jpg')}}" alt="">
        </div>
        <div class="bg-gradient-to-t from-gray-600 px-10 w-[640px] py-6">
            <h1 class="text-6xl font-bold py-5 font-mono text-white">{{$event->title}}</h1>
            <h1 class="text-3xl font-bold font-mono text-white">{{$event->description}}</h1>
            <div class="w-16 h-[5px]  bg-pink-800"></div>
            <div class="flex py-10 justify-between items-center">
                <div>
                    <div class="flex gap-3">
                        <svg class="w-6 h-6 text-pink-800 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                        </svg>

                        <h1 class="text-white font-medium text-lg ">{{$event->user->fname}} {{$event->user->lname}}</h1>
                    </div>
                    <div class="flex py-4 gap-3">
                        <svg class="w-6 h-6 text-pink-800 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Zm3-7h0v0h0v0Zm4 0h0v0h0v0Zm4 0h0v0h0v0Zm-8 4h0v0h0v0Zm4 0h0v0h0v0Zm4 0h0v0h0v0Z"/>
                        </svg>
                        @php
                            $eventDate = \Carbon\Carbon::parse($event->date);
                        @endphp
                        <h1 class="text-white font-medium text-lg ">{{$eventDate->format(' F j,  H:i') }}</h1>
                    </div>
                    <div class="flex gap-3">
                        <svg class="w-6 h-6 text-pink-800 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 14h0a7 7 0 1 0-11.5 0h0l.1.3.3.3L12 21l5.1-6.2.6-.7.1-.2Z"/>
                        </svg>
                        <h1 class="text-white font-medium text-lg ">{{$event->adress}}</h1>
                    </div>
                </div>
                <div>
                    <div class="flex gap-3">
                        <svg class="w-6 h-6 text-pink-800 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 8v8m0-8h8M8 8H6a2 2 0 1 1 2-2v2Zm0 8h8m-8 0H6a2 2 0 1 0 2 2v-2Zm8 0V8m0 8h2a2 2 0 1 1-2 2v-2Zm0-8h2a2 2 0 1 0-2-2v2Z"/>
                        </svg>
                        <h1 class="text-white font-medium text-lg ">{{$event->category->name}}</h1>
                    </div>
                    <div class="flex py-4 gap-3">
                        <svg class="w-6 h-6 text-pink-800 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16v-5.5C11 8.5 9.4 7 7.5 7m3.5 9H4v-5.5C4 8.5 5.6 7 7.5 7m3.5 9v4M7.5 7H14m0 0V4h2.5M14 7v3m-3.5 6H20v-6a3 3 0 0 0-3-3m-2 9v4m-8-6.5h1"/>
                        </svg>
                        <h1 class="text-white font-medium text-lg ">{{$event->user->email}}</h1>
                    </div>
                    <div class="flex gap-3">
                        <svg class="w-6 h-6 text-pink-800 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                        </svg>
                        <h1 class="text-white font-medium text-lg ">{{$event->price}} $</h1>
                    </div>
                </div>
            </div>
            <div class="flex justify-center ">
                <a href="{{route('client.event')}}">
                    <button class="hover:bg-purple-400 duration-700 bg-gray-200 rounded-lg px-1">
                        <svg class="w-[46px] h-[36px] text-purple-400 hover:text-white duration-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.6" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                        </svg>
                    </button>
                </a>
            </div>

        </div>
    </div>

