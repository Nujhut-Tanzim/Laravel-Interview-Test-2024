<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StateController extends Controller
{
    public function statePage()
    {
        $user_id = Auth::id();
        $activities = Activity::where("user_id", $user_id)->with('user')->latest()->get();
        $unreadCount = Activity::where('read', false)->count();
        return view("stateTable", compact('activities', 'unreadCount'));
    }
    public function index(Request $request)
    {
        $data = State::with("country")->get();
        $query = $request->input('search');

        $country = Country::where("country_name", $query)->first();

        if (!empty($query)) {
            if (!empty($country)) {
                $data = State::with('country')
                    ->where('state_name', 'LIKE', '%' . $query . '%')
                    ->orWhere('area', 'LIKE', '%' . $query . '%')
                    ->orWhere('country_id', 'LIKE', '%' . $country->id . '%')->get();
            } else {
                $data = State::with("country")->where('state_name', 'LIKE', '%' . $query . '%')
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
        return view('components.states.create', compact('activities', 'unreadCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'state_name' => 'required|string',
            'area' => 'nullable|string',
            'country_id' => 'required'
        ]);



        $data = State::create([
            'state_name' => $request->input("state_name"),
            'area' => $request->input("area"),
            'country_id' => $request->input('country_id')
        ]);

        Activity::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'entity_type' => 'state',
            'entity_id' => $data->id,
        ]);

        return response()->json([
            'success' => true,
            "message" => "State add successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = State::with('country')->findOrFail($id);

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

        return view("components.states.update", compact('id', 'activities', 'unreadCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        State::where("id", $id)->update([
            'state_name' => $request->input("updated_state_name"),
            'area' => $request->input("updated_area"),
            'country_id' => $request->input('country_id')
        ]);

        Activity::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'entity_type' => 'state',
            'entity_id' => $id,
        ]);


        return response()->json([
            'success' => true,
            "message" => "State details updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $State = State::findOrFail($id);
        $State->delete();

        return response()->json([
            "success" => true,
            "message" => 'State deleted successfully.'
        ]);
    }
}
