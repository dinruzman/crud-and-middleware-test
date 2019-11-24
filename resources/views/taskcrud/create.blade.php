@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        <h1>Create page</h1>
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

    <form action="{{url('/task')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">title</label>
            <input type="text" class="form-control rounded-0" placeholder="title" name="title">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">description</label>
            <textarea class="form-control" placeholder="desciprtion" name="description"></textarea>
        </div>
        <button type="submit">create task</button>
    </form>
</div>
@endsection
