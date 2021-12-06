<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('country/index', compact('countries'))->with(['no'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country/create');
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
            'country_code.required' => 'Country code is required',
            'flag.required' => 'Flag is required',
            'flag.mimes' => 'Image format should be jpg, jpeg, png',
        ];

        $request->validate([
            'name' => 'required',
            'country_code' => 'required',
            'flag' => 'required|mimes:jpg,jpeg,png',
        ], $message);

        $country = new Country();
        $country->name = $request->name;
        $country->country_code = $request->country_code;
        if($file = $request->flag){
            $name = time().$file->getClientOriginalName();
            $file->move('images/flag',$name); 
            $country->flag = $name;
        }

        if($country->save()){
            return redirect()->back()->with('message','Country saved successfully');
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
        $country = Country::find($id);
        if($country->delete()){
            return redirect()->back()->with('message','country deleted');
        }
    }
}
