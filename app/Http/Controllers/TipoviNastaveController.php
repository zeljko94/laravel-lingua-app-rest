<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipNastave;

class TipoviNastaveController extends Controller
{
    
    public function getAll()
    {
        $ucionice = TipNastave::all();
        return response()->json($ucionice);
    }

    public function get($id)
    {
        $user = TipNastave::find($id);
        return response()->json($user);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'naziv'    => 'required',
        ]);

        try{
            $user = new TipNastave([
                'naziv' => $request->input('naziv'),
                'opis'  => $request->input('opis')
            ]);
            $user->save();
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja tipa nastave!", 500);
        }

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $res = TipNastave::destroy($id);
        if(!$res){
            return response()->json("Tip nastave nije pronađen!", 500);
        }
        return response()->json("Tip nastave obrisan!", 200);
    }

    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'naziv'     => 'required',
        ]);

        $user = TipNastave::find($id);
        if(!$user){
            return response()->json("Tip nastave nije pronađen!", 500);
        }
        $user->update([
            'naziv' => $request->input('naziv'),
            'opis'  => $request->input('opis')
        ]);

        return response()->json($user, 200);
    }

}
