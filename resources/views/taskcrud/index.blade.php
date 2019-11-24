@extends('layouts.app')

@section('content')
<div class="container">

    <a href="/task/create" class="btn btn-primary btn-lg active mb-3">Add task</a>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @foreach($tasks as $task)
    <li class="list-group-item">
        <a href="{{url('/task/'.$task->id)}}" method="GET">{{$task->title}}</a>
    </li>
    @endforeach
</div>
@endsection
