<?php

namespace App\Http\Controllers\country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\Country;
class CountryController extends Controller
{
    public function country(){
        return response()->json(Country::get(), 200);
    }

    public function countryByID($id) {
        return response()->json(Country::find($id), 200);
    }

    public function countrySave(Request $request) {
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

    public function countryUpdate(Request $request, Country $id) {
        $id -> update($request->all());
        return response()->json($id, 200);
    }

    public function countryDelete(Request $request, Country $id) {
        
        $country = Country::find($id);

        if(is_null($country)){
            return response()->json(["message" => "Record not found"], 404);
        }
        $id -> delete();
        return response()->json(null, 204);
    }
}
