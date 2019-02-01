<?php

namespace App\Modules\Todo\Http\Middleware;

use Closure;
use App\Modules\Todo\Models\Todo;

class VerifyTodoOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $todo = Todo::findOrFail($request->id);
        
        if ($todo->user_id !== $request->user()->id) {
            return abort(403);
        }

        return $next($request);
    }
}
