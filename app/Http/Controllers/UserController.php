<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
       //query list of todos from db
       $users = User::paginate(6);

       //return to view - resources/views/todos/index.blade.php
       return view('users.index', compact('users'));
    }

    public function create()
    {
        //show create form
        return view('users.create');
    }

    public function store(Request $request)
    {
       $user=new User();
       $user->name = $request-> name;
       $user->email = $request-> email;
       $user->save();

       return redirect()->to('/users');

       
        // store to todos table using model
        //return todos index
        
    }

    public function show(User $user)
    {
       return view('users.show', compact('user'));
        
    }


    public function edit(User $user)
    {
       return view('users.edit', compact('user'));
        
    }


    public function update(User $user, Request $request)
    {
       $user->name=$request->name;
       $user->email=$request->email;
       $user->save();
       return redirect()->to('/users');
        
    }

    public function delete(User $user)
{
    //delete from table using model
    $user->delete();

    //return todos index
    return redirect()->to('users');

   }
}


