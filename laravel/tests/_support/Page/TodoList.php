<?php

namespace Page;

class TodoList extends Page 
{
    const TODO = "#todo-%d";
    const TODOS = '.todo';
    const STATUS_NOT_DONE_TEXT = 'Pending';
    const STATUS_DONE_TEXT = 'Done';
    const STATUS = '.status';
    
    public function seeTodo($description)
    {
        $this->tester->waitForText($description);
    }
    
    public function seeTodoCount($count)
    {
        $this->tester->seeNumberOfElements(self::TODOS, $count);
    }
    
    public function seeTodoStatusDone($id)
    {
        $this->waitForText(self::STATUS_DONE_TEXT, $this->todoStatusSelector($id));
    }
    
    public function seeTodoStatusNotDone($id)
    {
        $this->waitForText(self::STATUS_NOT_DONE_TEXT, $this->todoStatusSelector($id));
    }
        
    protected function todoStatusSelector($id)
    {
        return $this->todoSelector($id) . " " . self::STATUS;
    }
    
    protected function todoSelector($id)
    {
        return sprintf(self::TODO, $id);
    }
}
