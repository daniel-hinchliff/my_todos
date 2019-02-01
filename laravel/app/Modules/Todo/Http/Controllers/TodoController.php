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
}
