<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
                <div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Add latest updates here!</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{route('index')}}" class="btn-primary btn-sm">View Posts</a>
                    </div>
                </div>
                <br/>
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}}<br/>
                    @endforeach
                </div>
                @endif
                <br/>
                <form action="/posts" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Title : </label>
                    <input type="text" name="title" id="" value="{{old('title')}}" class="form-control">
                    <br/>
                    <label>Description : </label>
                    <textarea class="form-control" name="description">{{old('description')}}</textarea>
                    <br/>
                    <label>Upload image : </label>
                    <input type="file" name="image" class="form-control" id="">
                    <br/>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
