<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Session;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::get();
        return view('taskcrud.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taskcrud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' =>'required',
        ]);

        Task::create([
            'title' => $request->title,
            'description'=>$request->description,
        ]);

        Session::flash('message', 'Successfully create task!');
        return Redirect::to('task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::where('id','=',$id)->get();
        return view('taskcrud.showtask',compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = Task::where('id','=',$id)->get();
        return view('taskcrud.edit',compact('tasks'));
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
        $request->validate([
            'title' => 'required|min:3',
            'description' =>'required',
        ]);

        $update = Task::find($id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->save();

        Session::flash('message', 'Successfully updated task!');
        return Redirect::to('task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Task::find($id);
        $delete->delete();

        Session::flash('message', 'Successfully deleted the task!');
        return Redirect::to('task');
    }
}
