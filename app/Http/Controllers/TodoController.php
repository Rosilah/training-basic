<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use File;
use Storage;


class TodoController extends Controller
{
     public function  __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
       //query list of todos from db
       $todos = Todo::paginate(1);
      //  $user = auth()->user();
      //  $todos = $user->todos;



       //return to view - resources/views/todos/index.blade.php
       return view('todos.index', compact('todos'));
    }

    public function create()
    {
        //show create form
        return view('todos.create');
    }

    public function store(Request $request)
    {
       $todo=new Todo();
       $todo->title = $request-> title;
       $todo->description = $request-> description;
       $todo->user_id=auth()->user()->id;
       $todo->save();

       if($request->hasFile('attachment')){
          //rename
          $filename=$todo->id.'-'.date("Y-M-D").'.'.$request->attachment->getclientOriginalExtension();
          //store at file storage
          Storage::disk('public')->put($filename, File::get($request->attachment));
          //update rown on db
          $todo->attachment=$filename;
          $todo->save();
       }
         //return todos index
       return redirect()->to('/todos')->with([
          'type'=>'alert-primary',
          'message'=>'Successfuly store your todo!'
       ]);

       
        // store to todos table using model
        //return todos index
        
    }

    public function show(Todo $todo)
    {
       return view('todos.show', compact('todo'));
        
    }


    public function edit(Todo $todo)
    {
       return view('todos.edit', compact('todo'));
        
    }


    public function update(Todo $todo, Request $request)
    {
       $todo->title=$request->title;
       $todo->description=$request->description;
       $todo->save();
       return redirect()->to('/todos')->with([
         'type'=>'alert-success',
         'message'=>'Successfuly update your todo!'
      ]);

        
    }

    public function delete(Todo $todo)
{
    //delete from table using model
    $todo->delete();

    //return todos index
    return redirect()->to('/todos')->with([
      'type'=>'alert-danger',
      'message'=>'Successfuly delete your todo!'
   ]);

   }
}
