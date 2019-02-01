<?php
        
class TodoListCest extends AcceptanceTest
{   
    public function iSeeEmptyList(AcceptanceTester $I)
    {
        $I->amOnTodoList();
        
        $I->see('You have no Todos');
        $I->todos->seeTodoCount(0);
    }
    
    public function iSeeMyTodosInList(AcceptanceTester $I, Database $db)
    {
        $db->todo->create([
            'user_id' => $I->user->id, 
            'description' => 'Write Code',
        ]);
        $db->todo->create([
            'user_id' => $I->user->id, 
            'description' => 'Fix Bugs',
        ]);
        
        $I->amOnTodoList();
        
        $I->todos->seeTodo('Write Code');
        $I->todos->seeTodo('Fix Bugs');
        $I->todos->seeTodoCount(2);
    }
        
    public function iSeeTodoStatus(AcceptanceTester $I, Database $db)
    {
        $todo_a = $db->todo->create(['user_id' => $I->user->id, 'done' => true]);
        $todo_b = $db->todo->create(['user_id' => $I->user->id, 'done' => false]);
        
        $I->amOnTodoList();
        
        $I->todos->seeTodoStatusDone($todo_a->id);
        $I->todos->seeTodoStatusNotDone($todo_b->id);
    }
    
    public function iCanDeleteATodo(AcceptanceTester $I, Database $db)
    {
        $todo = $db->todo->create([
            'user_id' => $I->user->id, 
            'description' => 'Delete me',
        ]);
        $db->todo->create([
            'user_id' => $I->user->id, 
            'description' => 'Do not delete me',
        ]);
        
        $I->amOnTodoList();
        
        $I->todos->clickDelete($todo->id);
        $I->todos->seeTodo('Do not delete me');
        $I->todos->seeTodoCount(1);
    }
        
    public function iCantSeeTodosThatAreNotMine(AcceptanceTester $I, Database $db)
    {
        $someone_else = $db->user->create();
        $db->todo->create(['user_id' => $someone_else->id]);
        
        $I->amOnTodoList();

        $I->see('You have no Todos');
        $I->todos->seeTodoCount(0);
    }
}
