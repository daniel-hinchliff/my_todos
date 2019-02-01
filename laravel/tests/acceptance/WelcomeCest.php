<?php

class WelcomeCest extends AcceptanceTest
{
    public function iSeeWelcomePage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        
        $I->see('Login');
        $I->see('Register');
        $I->see('MyTodos');
    }
}
