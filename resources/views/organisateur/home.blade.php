@extends('header')

<body class="bg-cover relative  w-full min-h-screen brightness-125" style="background-image: url('img/bg.jpg');">
<div class="absolute w-full inset-0 bg-black opacity-80" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; overflow-y: auto;">





        <div class="flex gap-5 justify-between p-5 z-50">
            <div>
                <h1 class="px-5 font-bold text-4xl italic bg-gradient-to-r from-pink-500 via-purple-800 to-indigo-300 inline-block text-transparent bg-clip-text">E v e n t o</h1>
            </div>

            @if(session('success'))
                <div id="successMessage" class=" flex justify-center ml-[-150px] alert alert-success ">
                    <div class="bg-green-500 rounded-md px-3  text-white font-medium  text-lg">
                        <h1 class="mt-3">{{ session('success') }}</h1>
                    </div>
                </div>
            @endif
            @if(session('delete'))
            <div id="deleteMessage" class=" flex justify-center ml-[-150px] alert alert-success ">
                <div class="bg-green-700 rounded-md px-3  text-white font-medium  text-lg">
                    <h1 class="mt-3">{{session('delete')}}</h1>
                </div>
            </div>
            @endif
            <div class="flex gap-10 py-1 ml-[-150px]">
                <a href="home"><button class="font-medium text-2xl px-3 py-1 text-white  duration-300 hover:text-red-400">Home</button></a>
            </div>


            <div class="py-2 flex gap-4">

                <div id="btnNotify" class="relative">
                    <h1 class="bg-red-500 flex justify-center ml-[-5px] mt-[-5px] absolute items-center rounded-full w-[20px] h-[20px] text-white">{{$notification}}</h1>
                    <svg class="w-8 h-8 cursor-pointer dark:text-white hover:text-purple-600 cursor-pointerz" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.4V3m0 2.4a5.3 5.3 0 0 1 5.1 5.3v1.8c0 2.4 1.9 3 1.9 4.2 0 .6 0 1.3-.5 1.3h-13c-.5 0-.5-.7-.5-1.3 0-1.2 1.9-1.8 1.9-4.2v-1.8A5.3 5.3 0 0 1 12 5.4ZM8.7 18c.1.9.3 1.5 1 2.1a3.5 3.5 0 0 0 4.6 0c.7-.6 1.3-1.2 1.4-2.1h-7Z"/>
                    </svg>

                </div>
                <a href="login">
                    <svg class="w-9 h-9 text-white hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                    </svg>
                </a>

            </div>
        </div>

    <div id="notify" class="absolute right-0 scale-0 duration-300" >
        <div class="w-[503px] rounded border-4 border-double border-white shadow-md ">
            <h1 class="text-white font-bold text-xl underline py-1 flex justify-center items-center font-mono">Reservation</h1>
        </div>
        <div class="flex flex-col px-3 py-5 border-4 h-[300px]  px-5 border-double border-white shadow-md" style="overflow-y:scroll;">

            @foreach($reservations as $reservation)
            <div class="flex gap-24 py-3 mb-2 rounded bg-gradient-to-r from-white px-2">
                <div>
                    @php
                        $createdDate = \Carbon\Carbon::parse($reservation->created_at);
                        $timeAgo = $createdDate->diffForHumans();
                    @endphp
                    <h1 class="font-bold text-md text-black">Mr : {{$reservation->user->fname}} {{$reservation->user->lname}}</h1>
                    <h1 class="font-bold text-md text-black">Reserved At : {{ $timeAgo }}</h1>
                </div>
               <div class="mt-1 flex gap-3">
                   <form action="{{route('organisateur.acceptReservation', ['reservationId' => $reservation->id])}}" method="post">
                       @csrf
                       <button>
                           <svg class="w-8 h-8  dark:text-gray-100 hover:text-blue-600 duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                               <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm13.7-1.3a1 1 0 0 0-1.4-1.4L11 12.6l-1.8-1.8a1 1 0 0 0-1.4 1.4l2.5 2.5c.4.4 1 .4 1.4 0l4-4Z" clip-rule="evenodd"/>
                           </svg>
                       </button>
                   </form>
                   <form action="{{route('organisateur.declineReservation', ['reservationId' => $reservation->id])}}" method="post">
                       @csrf
                       @method('DELETE')
                       <button>
                           <svg class="w-8 h-8 dark:text-gray-100 hover:text-red-600 duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                               <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                           </svg>
                       </button>
                   </form>
               </div>
            </div>
            @endforeach

            <div>
            </div>
        </div>
    </div>

        <div>

                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div>
                        <h3 class="text-3xl leading-6 font-medium text-gray-100">
                            Statistique
                        </h3>
                        <dl class="mt-10 flex justify-center gap-10">

                            <div class="px-4 py-5 bg-gradient-to-r from-purple-500 shadow w-[500px] rounded-lg overflow-hidden sm:p-6">
                                <dt class="text-lg font-medium text-gray-200 truncate">
                                   Event
                                </dt>
                                <dd class="mt-1 text-3xl font-semibold text-white">
                                    {{$countValidatedEvents}}
                                </dd>
                            </div>

                            <div class="px-4 py-5 bg-gradient-to-r from-pink-500 shadow w-[500px] rounded-lg overflow-hidden sm:p-6">
                                <dt class="text-lg font-medium text-gray-200 truncate">
                                    Reservation
                                </dt>
                                <dd class="mt-1 text-3xl font-semibold text-white">
                                    {{$reservationCount}}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>


                <div id="form" class="absolute w-full h-full inset-0 bg-opacity-80 backdrop-filter backdrop-blur-md flex justify-center items-center bg-black z-50 scale-0  duration-300">
                    <div class="bg-purple-400 w-[700px] rounded-md ml-[20px]">
                        <form action="{{route('events-store')}}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto bg-purple-400 py-10">
                            @csrf <!-- Add this to include the CSRF token -->

                            <div class="flex justify-end">
                                <svg id="closeForm" class="w-6 h-6 text-white dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </div>

                            <div class="flex justify-center">
                                <h1 class="text-white font-bold text-2xl">Add Event</h1>
                            </div>

                            <div class="flex gap-10">

                                <div class="relative z-0 w-full mt-5 mb-5 group">
                                    <input type="text" name="title" id="title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="title" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
                                </div>

                                <div class="relative z-0 w-full mt-5 mb-5 group">
                                    <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                                    <label for="description" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                                </div>

                            </div>

                            <div class="relative z-0 w-full mt-5 mb-5 group">
                                <input type="text" name="adress" id="adress" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                                <label for="adress" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adress</label>
                            </div>

                            <div class="flex gap-10">

                                <div class="relative z-0 w-full mt-5 mb-5 group">
                                    <input type="number" name="price" id="price" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required min="1" value="1" />
                                    <label for="price" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                                </div>

                                <div class="relative z-0 w-full mt-5 mb-5 group">
                                    <input type="datetime-local" name="date" id="date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                                    <label for="date" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date</label>
                                </div>

                            </div>

                            <div class="flex gap-10">

                                <div class="relative z-0 w-full mt-5 mb-5 group">
                                    <input type="number" name="siege" id="siege" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required min="10" value="10" />
                                    <label for="siege" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Siège</label>
                                </div>

                                <div class="relative z-0 w-full mt-5 mb-5 group">
                                    <select  class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" name="type_reserve" id="">

                                        <option class="text-black" value="automatic">Automatic</option>
                                        <option class="text-black" value="manual">Manual</option>
                                    </select>
                                    <label for="Type-Reservation" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type-Reservation</label>

                                </div>

                            </div>

                            <div class="flex gap-10">
                                <div class="">
                                    <div class="flex justify-center">
                                        <label for="dropzone-file" class="flex items-center px-3 py-2 w-[205]  mx-auto mt-4 text-center bg-transparent border-0 border-b-2 border-gray-300  cursor-pointer dark:border-white ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                            </svg>
                                            <h2 class="mx-3 text-white">Event Image</h2>
                                            <input id="dropzone-file" name="image" type="file" class="hidden"  />
                                        </label>
                                    </div>
                                </div>
                                <div class="relative z-0 w-full mt-4 mb-5 group">
                                    <select  class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" name="category_id" id="">
                                        @foreach($categories as $category)
                                            <option class="text-black" value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="Type-Reservation" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category</label>

                                </div>

                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="text-black bg-gray-200 hover:bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>




                <div class="flex mt-10 justify-center">
                    <h3 class="text-4xl leading-6 px-5 font-medium text-gray-100">
                        All Events
                    </h3>
                </div>
                    <div class="flex justify-end px-10 mt-5">
                        <button id="btn" class="bg-gradient-to-l from-indigo-600 duration-700 hover:bg-gradient-to-r from-indigo-600  text-white text-xl font-bold rounded-md shadow-lg border-4 border-double border-pink-600 px-4 py-2">
                            Add Event
                        </button>
                    </div>

                    <div class="flex flex-wrap mt-10 gap-10 justify-center">
                        @foreach($events as $event)
                            <div class="w-[800px] relative bg-cover border-4 border-double border-purple-400 rounded-lg  " style="background-image: url('{{asset('storage/' . $event->image)}}')">
                                <div class="absolute inset-0 bg-black opacity-50 rounded-lg"></div>

                                <div class="flex justify-between p-5 relative z-10">
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
                                <div class="flex justify-between px-3 relative z-10">
                                    <div class="">
                                        <div class="flex gap-2">
                                            <svg class="w-6 h-6 text-gray-800 mt-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 14h0a7 7 0 1 0-11.5 0h0l.1.3.3.3L12 21l5.1-6.2.6-.7.1-.2Z"/>
                                            </svg>
                                            <h1 class="text-white font-medium text-xl mt-4">{{$event->adress}}</h1>
                                        </div>
                                        <div class="flex gap-5">
                                            <div class="py-2 flex gap-3">
                                                <img class="h-8 w-8 mt-1" src="{{url('img/seat.png')}}" alt="">
                                                <h1 class="text-white font-bold font-mono text-4xl">{{$event->siege}}</h1>
                                            </div>
                                            <div class="w-[4px] bg-white h-[30px] mt-4"></div>
                                            <div>
                                                <h1 class="text-pink-300 font-bold font-mono mt-3 text-3xl">{{$event->price}}$</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <h1 class="text-white font-medium text-lg">Open Doors</h1>
                                        <h1 class="text-pink-700 font-bold text-lg">{{ $eventDate->format('H:i') }} Onwards</h1>
                                    </div>


                                </div>
                                <div class="flex justify-center py-2 relative z-10">

                                    <div class="flex justify-center gap-5 bg-indigo-600 h-12 w-20 w-[50px] rounded-md">

                                            <!-- Show the delete button if no reservations exist -->
                                            <form action="{{route('organisateur.deleteEvent', ['event' => $event->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="mt-2">
                                                    <svg class="w-8 h-8 hover:text-red-600 duration-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                    </svg>
                                                </button>
                                            </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                <div class="mt-4 flex  justify-center">
                    {{ $events->links() }}
                </div>

            </div>


        </div>

</div>
<script>
    // Get the current local time in the format required by datetime-local input
    var currentDate = new Date().toISOString().slice(0, 16);

    // Set the min attribute of the date input
    document.getElementById('date').min = currentDate;
</script>

<script src="{{url('js/form.js')}}"></script>
<script src="{{url('js/messages.js')}}"></script>
<script src="{{url('js/notification.js')}}"></script>

</body>

