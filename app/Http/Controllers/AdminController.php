<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $reservationCount = Reservation::whereNotNull('validated_at')->count();
        $events = Event::whereNull('validated_at')->get();
        $organisateurCount = User::whereRole('organisateur')->count();
        $clientCount = User::whereRole('client')->count();
        $eventCount = Event::whereNotNull('validated_at')->count();
        return view('admin.dashboard', compact('users', 'events', 'organisateurCount', 'clientCount', 'eventCount', 'reservationCount'));
    }
    public function category()
    {
            $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function destroyUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->back()->with('delete', 'User Baned Successfully');
    }

    public function acceptEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        $event->validated_at = now();
        $event->save();

        return redirect()->back()->with('success', 'Event Accepted successfully');
    }

    public function declineEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        $event->delete();

        return redirect()->back()->with('success', 'Event Deleted successfully');

    }

    public function destroy($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

    public function update(Request $request,$categoryId)
    {
        $request->validate([
            'newNameCategory' => 'required|min:4',
        ]);

        $category = Category::findOrFail($categoryId);
        $category->name = $request->newNameCategory;
        $category->save();

        // Redirect back to the categories list page
        return redirect()->route('admin.category');
    }

    public function updateForm($categoryId)
    {
        $category = Category::findOrFail($categoryId);

        return view('admin.updateForm', compact('category'));
    }
}
