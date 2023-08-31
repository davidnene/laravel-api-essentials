<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;
use Validator;

class CountryControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Country::get(), 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'iso' => 'required|min:2|max:2'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $country = Country::find($id);

        if(is_null($country)){
            return response()->json(["message"=> "Record not found"], 404);
        }
        return response()->json($country, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        
        $country = Country::find($id);

        if(is_null($country)){
            return response()->json(["message"=> "Record not found"], 404);
        }
        $country -> update($request->all());
        return response()->json($country, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::find($id);

        if(is_null($country)){
            return response()->json(["message" => "Record not found"], 404);
        }
        $id -> delete();
        return response()->json(null, 204);
    }
}
