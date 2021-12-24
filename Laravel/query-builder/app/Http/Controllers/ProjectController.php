<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = QueryBuilder::for(Project::class)
                        ->allowedFilters(['name'])
                        ->allowedSorts(['name'])
                        ->allowedIncludes(['tasks','organization','workspace'])
                        ->withCount('tasks')
                        ->get();

        return view('project.index', compact('projects'))->with('no',1);
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
        $project = Project::where('id',$id)->with(['organization','workspace'])->first();
        $tasks = QueryBuilder::for(Task::class)
                            ->where('project_id', $id)
                            ->allowedFilters(['name','projects.name'])
                            ->allowedSorts(['name','projects.name'])
                            ->allowedFields(['name','projects.name'])
                            ->allowedIncludes(['projects','projects.organization','projects.workspace'])
                            ->get(); 
                        
        return view('project.show', compact('tasks','project'));
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
