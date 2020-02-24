<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RazinaNastave;

class RazineNastaveController extends Controller
{

    public function getAll()
    {
        $ucionice = RazinaNastave::all();
        return response()->json($ucionice);
    }

    public function get($id)
    {
        $user = RazinaNastave::find($id);
        return response()->json($user);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'naziv'    => 'required',
        ]);

        try{
            $user = new RazinaNastave([
                'naziv' => $request->input('naziv'),
                'opis'  => $request->input('opis')
            ]);
            $user->save();
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja razine nastave!", 500);
        }

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $res = RazinaNastave::destroy($id);
        if(!$res){
            return response()->json("Razina nastave nije pronađena!", 500);
        }
        return response()->json("Razina nastave obrisana!", 200);
    }

    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'naziv'     => 'required',
        ]);

        $user = RazinaNastave::find($id);
        if(!$user){
            return response()->json("Razina nastave nije pronađena!", 500);
        }
        $user->update([
            'naziv' => $request->input('naziv'),
            'opis'  => $request->input('opis')
        ]);

        return response()->json($user, 200);
    }
}
