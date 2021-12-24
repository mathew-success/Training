<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workspaces = QueryBuilder::for(Workspace::class)
                        ->allowedFilters(['name'])
                        ->allowedSorts(['name'])
                        ->allowedIncludes(['projects'])
                        ->withCount(['projects'])
                        ->get();

        return view('workspace.index', compact('workspaces'))->with('no',1);
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
        $workspace = Workspace::where('id',$id)->first();
                        
        $projects = QueryBuilder::for(Project::class)
                    ->where('workspace_id', $id)
                    ->allowedFilters(['name'])
                    ->allowedSorts(['name'])
                    ->allowedFields(['name'])
                    ->allowedIncludes(['tasks'])
                    ->withCount(['tasks'])
                    ->get();
                        
        return view('workspace.show', compact('workspace','projects'));
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
