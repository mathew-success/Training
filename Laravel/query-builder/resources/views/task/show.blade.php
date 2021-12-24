<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="text-left">Task Details</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{ route('task.index') }}" class="btn btn-sm btn-primary text-right">Back to List</a>
                    </div>
                </div>
                <br/><br/>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Task Name : </strong>{{ $task->name }}</td>
                            <td><strong>Project Name : </strong>{{ !empty($task->project) ? $task->project->name:null }}</td>
                        </tr>
                        <tr>
                            <td><strong>Organization Name : </strong>{{ !empty($task->project) ?$task->project->organization->name:''}}</td>
                            <td><strong>Workspace Name :</strong>{{ !empty($task->project) ?$task->project->workspace->name:''}}</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
