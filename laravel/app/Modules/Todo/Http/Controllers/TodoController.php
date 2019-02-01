<?php

namespace App\Modules\Todo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Todo\Models\Todo;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $todos = Todo::where('user_id', $request->user()->id)
            ->orderBy('done', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->get();
        
        return view('todo::index', compact('todos'));
    }
    
    public function create(Request $request)
    {             
        return view('todo::edit');
    }
    
    public function createSubmit(Request $request)
    {
        $request->validate($this->rules());
                
        $todo = new Todo();
        $todo->description = $request->input('description');
        $todo->user_id = $request->user()->id;
        $todo->done = false;
        $todo->save();
        
        return redirect('todo');
    }
    
    public function delete(Request $request, $id)
    {
        Todo::findOrFail($id)->delete();
        
        return redirect('todo');
    }
    
    protected function rules()
    {
        return [
            'description' => 'required|max:30',
        ];
    }
}
