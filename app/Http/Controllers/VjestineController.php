<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Vjestina;

class VjestineController extends Controller
{
    
    public function getAll()
    {
        $ucionice = Vjestina::all();
        return response()->json($ucionice);
    }

    public function get($id)
    {
        $user = Vjestina::find($id);
        return response()->json($user);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'naziv'    => 'required',
        ]);

        try{
            $user = new Vjestina([
                'naziv' => $request->input('naziv'),
                'opis'  => $request->input('opis')
            ]);
            $user->save();
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja vještine!", 500);
        }

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $res = Vjestina::destroy($id);
        if(!$res){
            return response()->json("Vještina nije pronađena u bazi!", 500);
        }
        return response()->json("Vještina obrisana!", 200);
    }

    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'naziv'     => 'required',
        ]);

        $user = Vjestina::find($id);
        if(!$user){
            return response()->json("Vještina nije pronađena!", 500);
        }
        $user->update([
            'naziv' => $request->input('naziv'),
            'opis'  => $request->input('opis')
        ]);

        return response()->json($user, 200);
    }

}
