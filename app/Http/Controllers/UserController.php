<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function isEmailTaken(Request $request) {
        $user = User::where('email', '=', $request->input('email'))->first();
        if($user){
            return response()->json(true);
        }
        return response()->json(false);
    }

    public function getPredavaci() 
    {
        $predavaci = User::where('role', '=', 'predavac')->get();
        return response()->json($predavaci);
    }

    public function getUcenici() 
    {
        $ucenici = User::where('role', '=', 'user')->get();
        return response()->json($ucenici);
    }

    public function getAll()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function get($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function post(Request $request)
    {/*
        $this->validate($request, [
            'email'    => 'email|required|unique:users',
            'password' => 'required|min:4',
            'role'     => 'required'
        ]);
*/
        $validator = Validator::make($request->all(), [
            'email'    => 'email|required|unique:users',
            'password' => 'required|min:4',
            'role'     => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->messages()->first(), 500);
        }

        try{
            $user = new User([
                'name'     => $request->input('name'),
                'lastname'     => $request->input('lastname'),
                'RFID'     => $request->input('RFID'),
                'email'    => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'telefon'  => $request->input('telefon'),
                'adresa'  => $request->input('adresa'),
                'about'    => $request->input('about'),
                'dodatno'    => $request->input('dodatno'),
                'edukacija'    => $request->input('edukacija'),
                'vjestine'     => $request->input('vjestine'),
                'titula'    => $request->input('titula'),
                'spol'    => $request->input('spol'),
                'role'     => $request->input('role')
            ]);
            $user->save();
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja korisnika!" . $e->getMessage(), 500);
        }

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $res = User::destroy($id);
        if(!$res){
            return response()->json("Korisnik nije pronađen!", 500);
        }
        return response()->json("Korisnik obrisan!", 200);
    }

    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required',
            'lastname'     => 'required',
            'RFID'     => 'required',
            'email'    => 'email|required|unique:users',
            'password' => 'required|min:4',
            'role'     => 'required'
        ]);

        $user = User::find($id);
        if(!$user){
            return response()->json("Korisnik nije pronađen!", 500);
        }
        $user->update([
            'name'     => $request->input('name'),
            'lastname'     => $request->input('lastname'),
            'RFID'     => $request->input('RFID'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'telefon'  => $request->input('telefon'),
            'adresa'  => $request->input('adresa'),
            'about'    => $request->input('about'),
            'dodatno'    => $request->input('dodatno'),
            'edukacija'    => $request->input('edukacija'),
            'vjestine'     => $request->input('vjestine'),
            'titula'    => $request->input('titula'),
            'spol'    => $request->input('spol'),
            'role'     => $request->input('role')
        ]);

        return response()->json($user, 200);
    }


    public function login(Request $request)
    {
        if(Auth::attempt([
            'email'  => $request->input('email'),
            'password'  => $request->input('password'),
        ])){
            return response()->json(Auth::getUser(), 200);
        }
        return response()->json("Greška prilikom logiranja!", 500);
    }

    public function logout()
    {

    }
}
