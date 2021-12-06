<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'))->with(['no'=>1]);
    }

    public function allposts()
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'Post title is required',
            'description.required' => 'Post description is required',
            'image.required' => 'Post image is required',
            'image.mimes' => 'Image format must be jpg, jpeg, png',
        ];
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg'
        ],$messages);

        $post = new Post();
        $post->title = $request->title;
        $post->image = $request->image;
        $post->description = $request->description;

        if($file = $request->image){
            $name = time().$file->getClientOriginalName();
            $file->move('images/post',$name); 
            $post->image = $name;
        }

        if($post->save()){
            return view('dashboard');
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('view_post', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->delete()){
            return redirect()->route('index');
        }
    }

}
