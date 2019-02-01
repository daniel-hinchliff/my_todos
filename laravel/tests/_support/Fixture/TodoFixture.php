<?php

namespace Fixture;

use App\Modules\Todo\Models\Todo;

class TodoFixture 
{
    public function create($data = [])
    {
        $todo = new Todo($data + [
            'description' => 'Laundry',
            'done' => false,
        ]);
        
        $todo->save();
               
        return $todo;
    }
}
