@extends('header')
<div id="update" class="absolute w-full h-full inset-0 bg-opacity-80 backdrop-filter backdrop-blur-md flex justify-center items-center bg-black z-50 duration-300">
    <div class="bg-purple-400 w-[700px] rounded-md ml-[20px]">

        <form action="{{ route('updateCategory', ['categoryId' => $category->id]) }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto bg-purple-400  py-10">
            @csrf
            <div class="flex justify-end">
                <a href="{{route('admin.category')}}">
                    <svg class="w-6 h-6 text-white dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </a>
            </div>

            <div class="flex justify-center">
                <h1 class="text-white font-bold text-2xl">Update Category</h1>
            </div>

            <div class="relative z-0 w-full mt-5 mb-5 group">
                <input type="text" name="newNameCategory" id="newNameCategory" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{$category->name}}"    required />
                <label for="newNameCategory" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
            </div>
            <input type="hidden" name="categoryId" value="{{ $category->id }}">

            <div class="flex justify-center">
                <button type="submit" class="text-black bg-gray-200 hover:bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
</div>
