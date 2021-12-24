<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = QueryBuilder::for(Organization::class)
                        ->allowedFilters(['name'])
                        ->allowedSorts(['name'])
                        ->allowedIncludes(['workspaces','projects','roles','users'])
                        ->withCount(['workspaces','projects','roles','users'])
                        ->get();
        return view('organization.index', compact('organizations'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::where('id',$id)
                                     ->with(['workspaces','projects','roles','users'])
                                     ->withCount(['workspaces','projects','roles','users'])
                                     ->first();

        $projects = QueryBuilder::for(Project::class)
                        ->allowedFilters(['name'])
                        ->allowedSorts(['name'])
                        ->allowedIncludes(['tasks'])
                        ->withCount(['tasks'])
                        ->where('organization_id',$id)
                        ->get();

        return view('organization.show', compact('organization','projects'));
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
        //
    }
}
