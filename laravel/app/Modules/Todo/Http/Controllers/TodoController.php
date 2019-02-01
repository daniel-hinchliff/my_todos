<?php

namespace App\Modules\Todo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Todo\Models\Todo;
use App\Modules\Todo\Http\Middleware\VerifyTodoOwnership;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(VerifyTodoOwnership::class)->except([
            'index', 'create', 'createSubmit'
        ]);
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
        $todo = new Todo();
        
        return view('todo::edit', compact('todo'));
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
    
    public function edit(Request $request, $id)
    {       
        $todo = Todo::findOrFail($id);
        
        return view('todo::edit', compact('todo'));
    }
    
    public function editSubmit(Request $request, $id)
    {
        $request->validate($this->rules());
        
        $todo = Todo::findOrFail($id);
        $todo->description = $request->input('description');
        $todo->done = $request->input('done', false);
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
