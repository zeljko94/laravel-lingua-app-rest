<?php

namespace App\Http\Controllers;

use App\ForumPost;
use Illuminate\Http\Request;

class ForumPostsController extends Controller
{
    
    public function getAll()
    {
        $posts = ForumPost::with([
            'kreator'
        ])->get();
        return response()->json($posts);
    }

    public function get($id)
    {
        $post = ForumPost::with([
            'kreator'
        ])->whereIn('id', array($id))->get()->first();
        return response()->json($post);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'message'    => 'required',
        ]);

        try{
            $post = new ForumPost([
                'message' => $request->input('message'),
                'forum_id'  => $request->input('forum_id'),
                'user_id' => $request->input('user_id')
            ]);
            $post->save();
        }
        catch(\Exception $e){
            return response()->json("Greška prilikom spremanja posta! " . $e->getMessage(), 500);
        }

        $res = ForumPost::with([
            'kreator',
        ])->whereIn('id', array($post->id))->get()->first();
        return response()->json($res, 200);
    }

    public function delete($id)
    {
        $forum = ForumPost::destroy($id);
        if(!$forum){
            return response()->json("Post nije pronađen!", 500);
        }
        return response()->json("Post obrisan!", 200);
    }

    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'message'     => 'required',
        ]);

        $forum = ForumPost::find($id);
        if(!$forum){
            return response()->json("Post nije pronađen!", 500);
        }

        $forum->update([
            'message' => $request->input('message'),
            'forum_id' => $request->input('forum_id'),
            'user_id' => $request->input('user_id')
        ]); 
        
        $res = ForumPost::with([
            'kreator',
        ])->whereIn('id', array($forum->id))->get()->first();
        return response()->json($res, 200);
    }
}
