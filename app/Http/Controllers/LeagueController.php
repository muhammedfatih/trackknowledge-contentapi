<?php

namespace App\Http\Controllers;

use App\League;
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
        return response()->json(League::all());
    }

    public function get($id)
    {
        return response()->json(League::find($id));
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
