<?php

namespace App\Http\Controllers;

use App\Country;
use App\Continent;
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
        $retval=[];
        foreach(Country::all() as $country){
            $continent=Continent::find($country->continent_id);
            $country['continent']=$continent;
            array_push($retval, $country);
        }
        return response()->json($retval);
    }

    public function get($id)
    {
        $country=Country::find($id);
        $continent=Continent::find($country->continent_id);
        $country['continent']=$continent;
        return response()->json($country);
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
