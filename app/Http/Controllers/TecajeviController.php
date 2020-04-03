<?php

namespace App\Http\Controllers;

use App\Tecaj;
use Illuminate\Http\Request;

class TecajeviController extends Controller
{
    
    public function getAll()
    {
        $tecajevi = Tecaj::with([
            'vjestina',
            'tipNastave',
            'razinaNastave',
            'predavac',
            'sudionici'
        ])->get();
        return response()->json($tecajevi);
    }

    public function get($id)
    {
        $tecaj = Tecaj::with([
            'vjestina',
            'tipNastave',
            'razinaNastave',
            'predavac',
            'sudionici'
        ])->whereIn('id', array($id))->get()->first();
        return response()->json($tecaj);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'naziv'    => 'required',
        ]);

        try{
            $tecaj = new Tecaj([
                'naziv' => $request->input('naziv'),
                'opis'  => $request->input('opis'),
                'vjestinaID' => $request->input('vjestinaID'),
                'predavacID' => $request->input('predavacID'),
                'tipNastaveID' => $request->input('tipNastaveID'),
                'razinaNastaveID' => $request->input('razinaNastaveID'),
                'sudionici' => $request->input('sudionici')
            ]);
            $tecaj->save();
            $arr = explode(',', $request->input('sudionici'));
            $tecaj->sudionici()->attach($arr);
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja tečaja! " . $e->getMessage(), 500);
        }

        $res = Tecaj::with([
            'vjestina',
            'tipNastave',
            'razinaNastave',
            'predavac',
            'sudionici'
        ])->whereIn('id', array($tecaj->id))->get()->first();
        return response()->json($res, 200);
    }

    public function delete($id)
    {
        $tecaj = Tecaj::destroy($id);
        if(!$tecaj){
            return response()->json("Tečaj nije pronađen!", 500);
        }
        return response()->json("Tečaj obrisan!", 200);
    }

    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'naziv'     => 'required',
        ]);

        $tecaj = Tecaj::find($id);
        if(!$tecaj){
            return response()->json("Tečaj nije pronađen!", 500);
        }

        try{
            $tecaj->update([
                'naziv' => $request->input('naziv'),
                'opis'  => $request->input('opis'),
                'vjestinaID' => $request->input('vjestinaID'),
                'predavacID' => $request->input('predavacID'),
                'razinaNastaveID' => $request->input('razinaNastaveID'),
                'razinaNastaveID' => $request->input('razinaNastaveID'),
                'sudionici' => $request->input('sudionici')
            ]);
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja izmjene tečaja! " . $e->getMessage(), 500);
        }

        $arr = explode(',', $request->input('sudionici'));
        $tecaj->sudionici()->sync($arr);

        $res = Tecaj::with([
            'vjestina',
            'tipNastave',
            'razinaNastave',
            'predavac',
            'sudionici'
        ])->whereIn('id', array($tecaj->id))->get()->first();
        return response()->json($res, 200);
    }

}
