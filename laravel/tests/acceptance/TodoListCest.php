<?php

class TodoListCest
{
    public function iSeeEmptyList(AcceptanceTester $I)
    {
        $I->amLoggedIn();
        
        $I->see('You have no Todos');
        $I->todos->seeTodoCount(0);
    }
    
    public function iSeeMyTodosInList(AcceptanceTester $I)
    {
        $I->db->todo->create([
            'user_id' => $I->user->id, 
            'description' => 'Write Code',
        ]);
        $I->db->todo->create([
            'user_id' => $I->user->id, 
            'description' => 'Fix Bugs',
        ]);
        
        $I->amLoggedIn();
        
        $I->todos->seeTodo('Write Code');
        $I->todos->seeTodo('Fix Bugs');
        $I->todos->seeTodoCount(2);
    }
}
