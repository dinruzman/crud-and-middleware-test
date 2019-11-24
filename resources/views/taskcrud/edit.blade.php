@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        <h1>Edit task</h1>
        <a href="{{url('/task')}}" method="GET" class="btn btn-primary rounded-0 mb-2"> back to list of task </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @foreach($tasks as $task)
      <form action="{{url('/task/'.$task->id)}}" method="POST">
        @method('PATCH')
        @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">title</label>
                <input type="text" class="form-control rounded-0" placeholder="{{$task->title}}" name="title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="mt-2">description</label>
                <textarea class="form-control " placeholder="{{$task->description}}" name="description"></textarea>
            </div>
            <button type="submit">Edit task</button>
        </form>
    @endforeach
</div>
@endsection
