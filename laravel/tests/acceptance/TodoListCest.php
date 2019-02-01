<?php

class TodoListCest
{
    public function iSeeEmptyList(AcceptanceTester $I)
    {
        $I->amLoggedIn();
        
        $I->see('You have no Todos');
        $I->todos->seeTodoCount(0);
    }
}
