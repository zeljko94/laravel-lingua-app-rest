<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;

class ForumiController extends Controller
{
    
    public function getAll()
    {
        $forumi = Forum::with([
            'kreator',
            'sudionici',
            'posts' => function ($query){
                $query->with(['kreator'])->get();
            }
        ])->get();
        return response()->json($forumi);
    }
     

    public function get($id)
    {
        $forum = Forum::with([
            'kreator',
            'sudionici',
            'posts' => function ($query){
                $query->with(['kreator'])->get();
            }
        ])->whereIn('id', array($id))->get()->first();
        return response()->json($forum);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'naziv'    => 'required',
        ]);

        try{
            $forum = new Forum([
                'naziv' => $request->input('naziv'),
                'kreatorID'  => $request->input('kreatorID'),
                'sudionici' => $request->input('sudionici')
            ]);
            $forum->save();
            $arr = explode(',', $request->input('sudionici'));
            $forum->sudionici()->attach($arr);
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja foruma! " . $e->getMessage(), 500);
        }

        $res = Forum::with([
            'kreator',
            'sudionici',
            'posts' => function ($query){
                $query->with(['kreator'])->get();
            }
        ])->whereIn('id', array($forum->id))->get()->first();
        return response()->json($res, 200);
    }

    public function delete($id)
    {
        $forum = Forum::destroy($id);
        if(!$forum){
            return response()->json("Forum nije pronađen!", 500);
        }
        return response()->json("Forum obrisan!", 200);
    }

    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'naziv'     => 'required',
        ]);

        $forum = Forum::find($id);
        if(!$forum){
            return response()->json("Forum nije pronađen!", 500);
        }

        $forum->update([
            'naziv' => $request->input('naziv'),
            'kreatorID' => $request->input('kreatorID'),
            'sudionici' => $request->input('sudionici')
        ]); 

        $arr = explode(',', $request->input('sudionici'));
        $forum->sudionici()->sync($arr);

        $res = Forum::with([
            'kreator',
            'sudionici',
            'posts' => function ($query){
                $query->with(['kreator'])->get();
            }
        ])->whereIn('id', array($forum->id))->get()->first();
        return response()->json($res, 200);
    }

}
