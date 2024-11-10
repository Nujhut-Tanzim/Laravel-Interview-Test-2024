<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;


use App\Models\Country;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user_id = Auth::id();

        $totalCountries = Country::count();

        $totalstates = State::count();


        $totalCities = City::count();



        $countries = Country::with('states.cities')->get();

        $activities = Activity::where("user_id", $user_id)->with('user')->latest()->get();
        $unreadCount = Activity::where('read', false)->count();

        return view('index', compact('totalCountries', 'totalstates', 'totalCities', 'countries', 'activities','unreadCount'));
    }

    public function markAsRead($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->update(['read' => true]);

        return redirect()->route('dashboard');
    }
}
