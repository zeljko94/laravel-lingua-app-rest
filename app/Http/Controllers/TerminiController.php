<?php

namespace App\Http\Controllers;

use App\Termin;
use Illuminate\Http\Request;

class TerminiController extends Controller
{
    public function getAll()
    {
        $termini = Termin::with([
            'kreator',
            'ucionica',
            'tecaj' => function ($query){
                $query->with([
                    'vjestina',
                    'tipNastave',
                    'razinaNastave',
                    'predavac',
                    'sudionici'
                ])->get();
            }
        ])->get();
        return response()->json($termini);
    }

    public function get($id)
    {
        $termini = Termin::with([
            'kreator',
            'ucionica',
            'tecaj' => function ($query){
                $query->with([
                    'vjestina',
                    'tipNastave',
                    'razinaNastave',
                    'predavac',
                    'sudionici'
                ])->get();
            }
        ])->whereIn('id', array($id))->get()->first();
        return response()->json($termini);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
        ]);

        try{
            $user = new Termin([
                'title' => $request->input('title'),
                'pocetniDatum' => $request->input('pocetniDatum'),
                'zavrsniDatum' => $request->input('zavrsniDatum'),
                'user_id'  => $request->input('user_id'),
                'ucionica_id'  => $request->input('ucionica_id'),
                'tecaj_id' => $request->input('tecaj_id'),

            ]);
            $user->save();
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja termina!", 500);
        }

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $res = Termin::destroy($id);
        if(!$res){
            return response()->json("Termin nije pronađena!", 500);
        }
        return response()->json("Termin obrisan!", 200);
    }

    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'title'     => 'required',
        ]);

        $tecaj = Termin::find($id);
        if(!$tecaj){
            return response()->json("Termin nije pronađen!", 500);
        }

        try{
            $tecaj->update([
                'title' => $request->input('title'),
                'pocetniDatum' => $request->input('pocetniDatum'),
                'zavrsniDatum' => $request->input('zavrsniDatum'),
                'user_id'  => $request->input('user_id'),
                'ucionica_id'  => $request->input('ucionica_id'),
                'tecaj_id' => $request->input('tecaj_id'),
            ]);
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja izmjene termina! " . $e->getMessage(), 500);
        }

        $res = Termin::with([
            'kreator',
            'ucionica',
            'tecaj' => function ($query){
                $query->with([
                    'vjestina',
                    'tipNastave',
                    'razinaNastave',
                    'predavac',
                    'sudionici'
                ])->get();
            }
        ])->whereIn('id', array($id))->get()->first();
        return response()->json($res, 200);
    }

}
