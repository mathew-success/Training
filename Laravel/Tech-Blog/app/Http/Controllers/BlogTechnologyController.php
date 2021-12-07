<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogTechnology;
use App\Models\Technology;
use Illuminate\Http\Request;

class BlogTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogTechnology::with(['blogs','technology'])->get();
        return view('techBlogs/index', compact('blogs'))->with(['no'=>1]);
    }

    public function allposts()
    {
        $blogs = BlogTechnology::with(['blogs','technology'])->get();
        return view('front/home', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogs = Blog::all();
        $technologies = Technology::all();
        return view('techBlogs/create', compact('blogs','technologies'));
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
            'blog_id.required' => 'Blog is required',
            'technology_id.required' => 'Technology is required'
        ];

        $request->validate([
            'blog_id' => 'required',
            'technology_id' => 'required'
        ], $message);

        $blog = new BlogTechnology();
        $blog->blog_id = $request->blog_id;
        $blog->technology_id = $request->technology_id;

        if($blog->save()){
            return redirect()->back()->with('message','Blog technology is associated');
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
        $blog = BlogTechnology::with(['blogs','technology'])->where('id',$id)->first();
        return view('front/view_post', compact('blog'));
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
        $blog = BlogTechnology::find($id);
        if($blog->delete()){
            return redirect()->back()->with('message','Blog technology deleted');
        }
    }
}
