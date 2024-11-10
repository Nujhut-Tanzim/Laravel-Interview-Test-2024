<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Activity;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{

    public function countryPage()
    {
        $user_id = Auth::id();
        $activities = Activity::where("user_id", $user_id)->with('user')->latest()->get();
        $unreadCount = Activity::where('read', false)->count();
        return view("countryTable",compact('activities','unreadCount'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Country::all();


        $query = $request->input('search');

        if (!empty($query)) {
            $data = Country::where('country_name', 'LIKE', '%' . $query . '%')
                ->orWhere('code', 'LIKE', '%' . $query . '%')->get();
        }
        return response()->json($data);
    }


    public function create()
    {
        $user_id = Auth::id();
        $activities = Activity::where("user_id", $user_id)->with('user')->latest()->get();
        $unreadCount = Activity::where('read', false)->count();
        return view('components.countries.create',compact('activities','unreadCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string|unique:countries,country_name',
            'code' => 'required|string|max:3|unique:countries,code',
            'flag_image' => 'nullable'
        ]);

        $img_url = null;

        // Check if the flag_image file is present
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";

            $img->move(public_path('uploads'), $img_name);
        }

        $data = Country::create([
            'country_name' => $request->input("country_name"),
            'flag_image' => $img_url,
            'code' => $request->input('code')
        ]);

        Activity::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'entity_type' => 'country',
            'entity_id' => $data->id,
        ]);

        return response()->json([
            'success' => true,
            "message" => "Country add successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Country::findOrFail($id);
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

        return view("components.countries.update", compact('id','activities','unreadCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile("img")) {
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";

            $img->move(public_path('uploads'), $img_name);

            $filePath = $request->input("file_path");
            if ($filePath != "") {
                File::delete($filePath);
            }


            Country::where("id", $id)->update([
                'country_name' => $request->input("updated_country_name"),
                'flag_image' => $img_url,
                'code' => $request->input('updated_code')
            ]);
        } else {
            Country::where("id", $id)->update([
                'country_name' => $request->input("updated_country_name"),
                'code' => $request->input('updated_code')
            ]);
        }

        Activity::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'entity_type' => 'country',
            'entity_id' => $id,
        ]);

        return response()->json([
            'success' => true,
            "message" => "Country details updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return response()->json([
            "success" => true,
            "message" => 'Country deleted successfully.'
        ]);
    }
}
