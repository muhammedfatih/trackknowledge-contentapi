<?php

namespace App\Http\Controllers;

use App\League;
use App\Country;
use App\Continent;
use Illuminate\Http\Request;
use Auth;

class LeagueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function all()
    {
        $retval=[];
        foreach(League::all() as $league){
            $country=Country::find($league->country_id);
            $continent=Continent::find($country->continent_id);
            $league['country']=$country;
            $country['continent']=$continent;
            array_push($retval, $league);
        }
        return response()->json($retval);
    }

    public function get($id)
    {
        $league=League::find($id);
        $country=Country::find($league->country_id);
        $continent=Continent::find($country->continent_id);
        $league['country']=$country;
        $country['continent']=$continent;
        return response()->json($league);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $league = League::create($request->all());

        return response()->json($league, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $league = League::findOrFail($id);
        $league->update($request->all());

        return response()->json($league, 200);
    }

    public function delete($id)
    {
        League::findOrFail($id)->delete();
        return response('', 200);
    }
}
