<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
         $request->validate([
           'title' => 'required|string',
           'description' => 'required|string',
           'date' => 'required|date',
           'price' => 'required|numeric',
           'siege' => 'required|integer',
           'adress' => 'required|string',
           'type_reserve' => 'required|string',
           'category_id' => 'required',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
         $data = $request->except('image') + ['user_id' => Auth::id()];

         if($request->hasFile('image')){
             $imagePath = $request->file('image')->store('event_images', 'public');
             $data['image'] = $imagePath;
         }
         $event = Event::create($data);

       return redirect()->route('organisateur.home')->with('success', 'Your demand send to administration Successfully');
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteEvent(Event $event)
    {
        $event->delete();

        return redirect()->back()->with('delete', 'Event deleted successfully');
    }
}
