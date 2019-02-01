<?php

class AcceptanceTest 
{
    public function _before(\AcceptanceTester $I, Database $db)
    {
        $user = $db->user->create();
        $pass = $db->user->passwordForUser($user->name);

        $I->setUser($user, $pass);
    }
}
