<?php

class TodoEditCest extends AcceptanceTest
{
    public function iCanCreateTodos(AcceptanceTester $I)
    {
        $I->amOnTodoList();
                
        $I->todos->clickCreate();
        $I->todo_edit->setDescription('Get a job');
        $I->todo_edit->clickSubmit();
        
        $I->todos->seeTodo('Get a job');
        $I->todos->seeTodoCount(1);
    }
            
    public function iCanEditNotDoneTodos(AcceptanceTester $I, Database $db)
    {
        $todo = $db->todo->create([
            'user_id' => $I->user->id, 
            'description' => 'Figure out the meaning of ...',
            'done' => false,
        ]);
        
        $I->amOnTodoList();                
        $I->todos->clickEdit($todo->id);
        $I->todo_edit->setDescription('Figure out the meaning of life');
        $I->todo_edit->setDone(true);
        $I->todo_edit->clickSubmit();
        
        $I->todos->seeTodo('Figure out the meaning of life');
        $I->todos->seeTodoStatusDone($todo->id);
    }
        
    public function iCanEditDoneTodos(AcceptanceTester $I, Database $db)
    {
        $todo = $db->todo->create([
            'user_id' => $I->user->id, 
            'description' => 'Bake cake',
            'done' => true,
        ]);
        
        $I->amOnTodoList();                
        $I->todos->clickEdit($todo->id);
        $I->todo_edit->setDescription('Bake cake and eat it');
        $I->todo_edit->setDone(false);
        $I->todo_edit->clickSubmit();
        
        $I->todos->seeTodo('Bake cake and eat it');
        $I->todos->seeTodoStatusNotDone($todo->id);
    }
        
    public function iCantEditTodosThatAreNotMine(AcceptanceTester $I, Database $db)
    {
        $someone_else = $db->user->create();
        $todo = $db->todo->create(['user_id' => $someone_else->id]);
        
        $I->amOnTodoList();
        $I->todo_edit->goToPage($todo->id);
        
        $I->see('403');
        $I->see('Sorry, you are forbidden from accessing this page.');
    }
}
