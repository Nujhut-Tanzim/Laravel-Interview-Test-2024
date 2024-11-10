<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function cityPage()
    {
        $user_id = Auth::id();
        $activities = Activity::where("user_id", $user_id)->with('user')->latest()->get();
        $unreadCount = Activity::where('read', false)->count();
        return view("cityTable", compact('activities', 'unreadCount'));
    }
    public function index(Request $request)
    {
        $data = City::with("state")->get();
        $query = $request->input('search');

        $state = State::where("state_name", $query)->first();

        if (!empty($query)) {
            if (!empty($state)) {
                $data = City::with('state')
                    ->where('city_name', 'LIKE', '%' . $query . '%')
                    ->orWhere('population', 'LIKE', '%' . $query . '%')
                    ->orWhere('area', 'LIKE', '%' . $query . '%')
                    ->orWhere('state_id', 'LIKE', '%' . $state->id . '%')->get();
            } else {
                $data = City::with("state")->where('city_name', 'LIKE', '%' . $query . '%')
                    ->orWhere('population', 'LIKE', '%' . $query . '%')
                    ->orWhere('area', 'LIKE', '%' . $query . '%')->get();
            }
        }
        return response()->json($data);
    }


    public function create()
    {
        $user_id = Auth::id();
        $activities = Activity::where("user_id", $user_id)->with('user')->latest()->get();
        $unreadCount = Activity::where('read', false)->count();
        return view('components.cities.create', compact('activities', 'unreadCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_name' => 'required|string',
            'population' => 'nullable|integer',
            'area' => 'nullable|numeric',
            'state_id' => 'required'
        ]);



        $data = City::create([
            'city_name' => $request->input("city_name"),
            'population' => $request->input("population"),
            'area' => $request->input("area"),
            'state_id' => $request->input('state_id')
        ]);

        Activity::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'entity_type' => 'city',
            'entity_id' => $data->id,
        ]);

        return response()->json([
            'success' => true,
            "message" => "City add successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = City::with('state')->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user_id = Auth::id();
        $activities = Activity::where("user_id", $user_id)->with('user')->latest()->get();
        $unreadCount = Activity::where('read', false)->count();
        return view("components.cities.update", compact('id', 'activities', 'unreadCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        City::where("id", $id)->update([
            'City_name' => $request->input("updated_city_name"),
            'population' => $request->input("updated_population"),
            'area' => $request->input("updated_area"),
            'state_id' => $request->input('state_id')
        ]);

        Activity::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'entity_type' => 'city',
            'entity_id' => $id,
        ]);


        return response()->json([
            'success' => true,
            "message" => "City details updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $City = City::findOrFail($id);
        $City->delete();

        return response()->json([
            "success" => true,
            "message" => 'City deleted successfully.'
        ]);
    }
}
