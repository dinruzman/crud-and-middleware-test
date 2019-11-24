@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        <h1>Show task</h1>
        <a href="{{url('/task')}}" method="GET" class="btn btn-primary rounded-0 mb-2"> back to list of task </a>
    </div>

    {{-- <form action="{{url('/task')}}" method="POST">
        @csrf --}}
        @foreach($tasks as $task)
            {{-- <div class="form-group"> --}}
                <label for="exampleFormControlInput1">title</label>
                <input type="text" class="form-control rounded-0" placeholder="{{$task->title}}" name="title" readonly>
            {{-- </div> --}}
            {{-- <div class="form-group"> --}}
                <label for="exampleFormControlTextarea1" class="mt-2">description</label>
                <textarea class="form-control " placeholder="{{$task->description}}" name="description" readonly></textarea>
            {{-- </div> --}}
            <div class="mt-3">
                <a href="{{url('/task/'.$task->id.'/edit')}}" class="btn btn-primary btn-sm active mb-3 rounded-0" method="GET">Edit</a>
            </div>

            <form action="{{url('/task/'.$task->id)}}"  method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-primary btn-sm active mb-3 rounded-0">Delete</button>
            </form>
        @endforeach
    {{-- </form> --}}
</div>
@endsection
