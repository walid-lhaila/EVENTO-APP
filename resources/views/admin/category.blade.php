@extends('header')
<body class="relative">
<div class="flex gap-20">
        <aside class="flex">
            <div class="flex flex-col items-center w-16 h-screen py-4 space-y-8 bg-gradient-to-b from-indigo-800 ">
                <a href="#">
                    <img class="w-16 h-22" src="{{url('img/EVENTO.png')}}" alt="">
                </a>

                <a href="{{route('admin.dashboard')}}" class="p-1.5 text-white focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 hover:text-purple-500">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4.5V19c0 .6.4 1 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.2M20 9v3.2"/>
                    </svg>
                </a>

                <a href="{{route('admin.users')}}" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-purple-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </a>

                <a href="{{route('admin.category')}}" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg class="w-6 h-6 hover:text-purple-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Z"/>
                    </svg>
                </a>

                <a href="login" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg class="w-6 h-6 text-white hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                    </svg>
                </a>

            </div>
        </aside>
    <div>

        @if(session('success'))
            <div id="successMessage" class=" flex justify-center ml-[-150px] mt-5 alert alert-success ">
                <div class="bg-green-500 rounded-md px-3  text-white font-medium  text-lg">
                    <h1 class="mt-1">{{ session('success') }}</h1>
                </div>
            </div>
        @endif

        <div class="absolute p-10 flex right-0">
            <button id="btn" class="text-white font-medium text-md bg-gradient-to-t from-indigo-400 via-indigo-300 to-indigo-200 px-3 py-1 border-4 rounded-md border-double border-purple-500 hover:bg-gradient-to-l from-purple-400 via-purple-300 to-purple-200 duration-500">Add Category</button>
        </div>

        <div class="flex flex-wrap gap-5">

            @foreach($categories as $category)
    <div class="relative mt-10 bg-gradient-to-b from-indigo-300 w-[300px] h-[130px] pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow-md rounded-lg overflow-hidden">
        <dt>
            <div class="absolute bg-indigo-500 rounded-md p-3">
                <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M5 3a2 2 0 0 0-2 2v2c0 1.1.9 2 2 2h2a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5Zm0 12a2 2 0 0 0-2 2v2c0 1.1.9 2 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H5Zm12 0a2 2 0 0 0-2 2v2c0 1.1.9 2 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-2Zm0-12a2 2 0 0 0-2 2v2c0 1.1.9 2 2 2h2a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2Z"/>
                    <path fill-rule="evenodd" d="M10 6.5c0-.6.4-1 1-1h2a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1ZM10 18c0-.6.4-1 1-1h2a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1Zm-4-4a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v2c0 .6-.4 1-1 1Zm12 0a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v2c0 .6-.4 1-1 1Z" clip-rule="evenodd"/>
                </svg>

            </div>
        </dt>
        <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
            <p class="text-2xl mt-1 font-semibold text-gray-900">
               {{$category->name}}
            </p>
        </dd>
        <div class="flex justify-center gap-3 items-center">
            <form action="{{route('deleteCategory' , ['categoryId' => $category->id])}}"  method="post">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <svg class="w-8 h-8  dark:text-gray-400 cursor-pointer hover:text-red-600 duration-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                </button>
            </form>
            <form class="mt-3" action="{{ route('updateForm', ['categoryId' => $category->id]) }}" method="get">
                @csrf
                <button type="submit" class="mt-[-12px] z-10">
                    <svg class="w-9 h-9 dark:text-gray-400 cursor-pointer hover:text-blue-600 duration-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M7 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h1m4-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm7.4 1.6a2 2 0 0 1 0 2.7l-6 6-3.4.7.7-3.4 6-6a2 2 0 0 1 2.7 0Z"/>
                    </svg>
                </button>
            </form>

        </div>
    </div>
            @endforeach


        </div>

    </div>

</div>


{{--                                                            FORM ADD EVENT--}}


<div id="form" class="absolute w-full h-full inset-0 bg-opacity-80 backdrop-filter backdrop-blur-md flex justify-center items-center bg-black z-50 scale-0  duration-300">
    <div class="bg-purple-400 w-[700px] rounded-md ml-[20px]">

        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto bg-purple-400  py-10">
            @csrf <!-- Add this to include the CSRF token -->

            <div class="flex justify-end">
                <svg id="closeForm" class="w-6 h-6 text-white dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
            </div>

            <div class="flex justify-center">
                <h1 class="text-white font-bold text-2xl">Add Category</h1>
            </div>

            <div class="relative z-0 w-full mt-5 mb-5 group">
                <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="name" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
            </div>


            <div class="flex justify-center">
                <button type="submit" class="text-black bg-gray-200 hover:bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
</div>



<script src="{{url('js/messages.js')}}"></script>
<script src="{{url('js/form.js')}}"></script>
</body>
