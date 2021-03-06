<?php

namespace Page;

class TodoList extends Page 
{
    const TODO = "#todo-%d";
    const TODOS = '.todo';
    const EDIT_BUTTON = 'a.btn';
    const DELETE_BUTTON = 'form button';
    const CREATE_LINK = 'Create a new Todo';
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
    
    public function clickDelete($id)
    {
        $this->tester->click($this->todoDeleteSelector($id));
    }
    
    public function clickCreate()
    {
        $this->tester->click(self::CREATE_LINK);
    }
    
    public function clickEdit($id)
    {
        $this->tester->click($this->todoEditSelector($id));
    }
    
    protected function todoEditSelector($id)
    {
        return $this->todoSelector($id) . " " . self::EDIT_BUTTON;
    }
    
    protected function todoDeleteSelector($id)
    {
        return $this->todoSelector($id) . " " . self::DELETE_BUTTON;
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
