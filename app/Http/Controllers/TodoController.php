<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('list')->with('todos', $todos);
    }

    public function create(Request $request)
    {
        $todo = new Todo;
        $todo->name = $request->text;
        $todo->save();
        return 'created';
    }
    
    public function update(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->name = $request->value;
        $todo->save();
        return $request->all();
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->delete();
        return 'deleted';
    }

}
