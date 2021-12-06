<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog/index', compact('blogs'))->with(['no'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'title.required' => 'Title is required',
            'image.required' => 'Image is required',
            'image.mimes' => 'Image format should be jpg, jpeg, png',
            'short_description.required' => 'Short description is required',
            'description.required' => 'Description is required',
        ];

        $request->validate([
            'title' => 'required|min:3',
            'image' => 'required|mimes:jpg,jpeg,png',
            'short_description' => 'required',
            'description' => 'required'
        ], $message);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        if($file = $request->image){
            $name = time().$file->getClientOriginalName();
            $file->move('images/blog',$name); 
            $blog->image = $name;
        }

        if($blog->save()){
            return redirect()->back()->with('message','Blog saved successfully');
        }
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if($blog->delete()){
            return redirect()->back()->with('message','Blog deleted');
        }
    }
}
