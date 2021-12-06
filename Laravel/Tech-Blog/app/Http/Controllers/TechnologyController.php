<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('technology/index', compact('technologies'))->with(['no'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technology/create');
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
            'name.required' => 'Name is required',
            'image.required' => 'Image is required',
            'image.mimes' => 'Image format should be jpg, jpeg, png',
            'description.required' => 'Description is required',
        ];

        $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required'
        ], $message);

        $technology = new Technology;
        $technology->name = $request->name;
        $technology->description = $request->description;
        if($file = $request->image){
            $name = time().$file->getClientOriginalName();
            $file->move('images/technology',$name); 
            $technology->image = $name;
        }

        if($technology->save()){
            return redirect()->back()->with('message','Technology saved successfully');
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
        $technology = Technology::find($id);
        if($technology->delete()){
            return redirect()->back()->with('message','Technology deleted');
        }
    }
}
