<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return \App\Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new \App\Post;
        $post->user_id = \Auth::user()->id;
        $post->title = $request->title;
        $post->post_description = $request->description;
        $post->save();

        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return \App\Post::with([
            'postUsers',
            'user'
        ])->($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = \App\Post::find($id);
        if ($post->user_id = \Auth::user()->id) {
        $post->title = $request->title;
        $post->post_description = $request->description;
        $post->save();
        } else {
          return resoponse ("Unauthorized", 403);
        }
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = \App\Post::find($id);
        if ($post->user_id = \Auth::user()->id) {
          $post->delete();
        } else {
          return response ("Unauthorized", 403);
        }
        return $post;
    }
}
