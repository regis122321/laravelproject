<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::orderBy('created_at','DESC')->first();
        $posts = Post::orderBy('updated_at','DESC')->where('id','!=',$post->id)->get();
        $pred = ["red", "green", "blue", "yellow"];
        return view('posts.index', [
                'posts' => $posts,
                'pred' => $pred,
                'latest' => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     


       $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' =>'required|mimes:jpg,png,jpeg,gif,svg,webp|max:5048'
      ]);
     
      $newimg = time().'-'.$request->title.'.'.$request->image->extension();
      
       $test =  $request->image->move(public_path('images'), $newimg);
     
       Post::create([
           'title' => $request->input('title'),
           'content' => $request->input('content'),
           'image' => $newimg,
           'user_id' => $request->input('id'),
      ]);

      return redirect('/blog');
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
        $post = Post::where('id', '=',$id)->first();
        return view('posts.show')->with('latest',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::where('id', '=',$id)->first();
        return view('posts.edit')->with('post',$post);
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


       Post::where('id',$id)->update([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'user_id' => $request->input('id'),
       ]);

      return redirect('/blog');
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
        Post::where('id',$id)->delete();
        return redirect('/blog');
    
    }
}
