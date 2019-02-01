<?php

class TodoEditCest 
{
    public function iCanCreateTodos(AcceptanceTester $I)
    {
        $I->amLoggedIn();
                
        $I->todos->clickCreate();
        $I->todo_edit->setDescription('Get a job');
        $I->todo_edit->clickSubmit();
        
        $I->todos->seeTodo('Get a job');
        $I->todos->seeTodoCount(1);
    }
}
