<?php

namespace App\Http\Controllers;

use App\Continent;
use Illuminate\Http\Request;
use Auth;

class ContinentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function all()
    {
        return response()->json(Continent::all());
    }

    public function get($id)
    {
        return response()->json(Continent::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $continent = Continent::create($request->all());

        return response()->json($continent, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $continent = Continent::findOrFail($id);
        $continent->update($request->all());

        return response()->json($continent, 200);
    }

    public function delete($id)
    {
        Continent::findOrFail($id)->delete();
        return response('', 200);
    }
}
