<?php

class WelcomeCest 
{
    public function iSeeWelcomePage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        
        $I->see('Login');
        $I->see('Register');
        $I->see('MyTodos');
    }
}
