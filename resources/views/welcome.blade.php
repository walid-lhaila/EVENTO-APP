@extends('header')
<body class=" bg-cover w-[740px]" style="background-image: url('img/landing.jpg')">
<div class="h-screen absolute w-full inset-0 bg-gray-900 opacity-80">

    <div class="flex gap-5 justify-end p-5 z-50">
        <a href="login"><button class="font-medium text-md border-double border-4 border-indigo-400 px-3 py-1 rounded-md bg-white text-black hover:text-white hover:bg-pink-600 duration-300">LOGIN</button></a>
        <a href="register"><button class="font-medium text-md border-double border-4 border-indigo-400 px-3 py-1 rounded-md bg-white text-black hover:text-white hover:bg-purple-600 duration-300">SIGN UP</button></a>
    </div>

    <div class="flex justify-center mt-32 z-50">
        <h1 class=" text-9xl font-serif bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text">E V E N T O</h1>
    </div>
    <div class="flex justify-center  z-50">
        <h1 class=" text-3xl font-serif bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text">I g n i t e <span class="px-2"> </span> Y o u r <span class="px-2"> </span> N i g h t</h1>
    </div>
    <div class="flex justify-center mt-20 z-50">
        <h1 class="text-6xl text-white font-mono font-medium">TELL US ... HOW DO YOU <span class="text-pink-700">LIKE IT ?</span></h1>
    </div>
    <div class="flex justify-center gap-5 mt-20 z-50">
        <h2 class="bg-pink-500 text-white font-medium flex justify-center items-center px-[1rem] py-1 text-xl rounded-lg ">Party</h2>
        <h2 class="bg-pink-500 text-white font-medium flex justify-center items-center px-[1rem] py-1 text-xl rounded-lg">Bar</h2>
        <h2 class="bg-pink-500 text-white font-medium flex justify-center items-center px-[1rem] py-1 text-xl rounded-lg">Festival</h2>
        <h2 class="bg-pink-500 text-white font-medium flex justify-center items-center px-[1rem] py-1 text-xl rounded-lg">Pool Party</h2>
        <h2 class="bg-pink-500 text-white font-medium flex justify-center items-center px-[1rem] py-1 text-xl rounded-lg">Live Music</h2>
    </div>
</div>
</body>
</html>
