<?php

namespace App\Http\Controllers;

use App\Nationality;
use Illuminate\Http\Request;
use Auth;

class NationalityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function all()
    {
        return response()->json(Nationality::all());
    }

    public function get($id)
    {
        return response()->json(Nationality::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $nationality = Nationality::create($request->all());

        return response()->json($nationality, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $nationality = Nationality::findOrFail($id);
        $nationality->update($request->all());

        return response()->json($nationality, 200);
    }

    public function delete($id)
    {
        Nationality::findOrFail($id)->delete();
        return response('', 200);
    }
}
