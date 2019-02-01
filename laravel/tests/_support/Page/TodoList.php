<?php

namespace Page;

class TodoList extends Page 
{
    const TODOS = '.todo';
    
    public function seeTodoCount($count)
    {
        $this->tester->seeNumberOfElements(self::TODOS, $count);
    }
}
