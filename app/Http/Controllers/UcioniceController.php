<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ucionica;

class UcioniceController extends Controller
{
    
    public function getAll()
    {
        $ucionice = Ucionica::all();
        return response()->json($ucionice);
    }

    public function get($id)
    {
        $user = Ucionica::find($id);
        return response()->json($user);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'naziv'    => 'required',
        ]);

        try{
            $user = new Ucionica([
                'naziv' => $request->input('naziv'),
                'opis'  => $request->input('opis'),
                'color' => $request->input('color')
            ]);
            $user->save();
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja učionice!", 500);
        }

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $res = Ucionica::destroy($id);
        if(!$res){
            return response()->json("Učionica nije pronađena!", 500);
        }
        return response()->json("Učionica obrisana!", 200);
    }

    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'naziv'     => 'required',
        ]);

        $user = Ucionica::find($id);
        if(!$user){
            return response()->json("Učionica nije pronađena!", 500);
        }
        $user->update([
            'naziv' => $request->input('naziv'),
            'opis'  => $request->input('opis'),
            'color' => $request->input('color')
        ]);

        return response()->json($user, 200);
    }

}
