@extends('header')
<body>
<div class="flex gap-10 w-full">

    <aside class="">
        <div class="flex flex-col items-center w-16 h-screen py-4 space-y-8 bg-gradient-to-b from-indigo-800 ">
            <a href="#">
                <img class="w-16 h-22" src="{{url('img/EVENTO.png')}}" alt="">
            </a>

            <a href="{{route('admin.dashboard')}}" class="p-1.5 text-white focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 hover:text-purple-500">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4.5V19c0 .6.4 1 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.2M20 9v3.2"/>
                </svg>
            </a>

            <a href="#" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
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



    <div class="w-full px-10 mt-20">
        <table id="table">
            <thead class="bg-gradient-to-t from-indigo-600">
            <th class="text-lg">Full Name</th>
            <th class="text-lg">Phone</th>
            <th class="text-lg">Email</th>
            <th class="text-lg">Role</th>
            <th class="text-lg">Created At</th>
            <th class="text-lg">Action</th>
            </thead>
            @foreach($users as $user)
            <tbody  class="bg-indigo-200 text-lg font-medium">
                <td>{{$user->fname}} {{$user->lname}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <form action="{{route('deleteUser', ['userId' => $user->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <svg class="w-8 h-8 hover:text-red-600 duration-300 cursor-pointer dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                            </svg>
                        </button>
                    </form>
                </td>

            </tbody>
            @endforeach
        </table>
    </div>
</div>





</body>
