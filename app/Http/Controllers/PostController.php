<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result = Post::latest()->paginate(5);
        // return view('posts.index',compact('result'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        $result = Post::paginate(5);
        // return view('posts.index', ['result' => $result]);
        return view('posts.index', compact('result'));
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
        $validateData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($files = $request->file('images')){
            $image = time().'.'.$files->getClientOriginalExtension();
            $request->image->move(public_path('images'), $image);
        }

        Post::create($validateData);
        Session::flash('message', 'Insert Post Successfully');
        return redirect('posts');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.edit', compact('posts'));
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
        $validateData = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        Post::whereId($id)->update($validateData);
        return redirect('/posts')->with('message', 'Post is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts')->with('message', 'Post is successfully deleted.');
    }
}
