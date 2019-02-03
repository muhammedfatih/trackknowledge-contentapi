<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Auth;

class CountryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function all()
    {
        return response()->json(Country::all());
    }

    public function get($id)
    {
        return response()->json(Country::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'continent_id'=>'required'
        ]);

        $country = Country::create($request->all());

        return response()->json($country, 201);
    }

    public function update($id, Request $request)
    {
        $country = Country::findOrFail($id);
        $country->update($request->all());

        return response()->json($country, 200);
    }

    public function delete($id)
    {
        Country::findOrFail($id)->delete();
        return response('', 200);
    }
}
