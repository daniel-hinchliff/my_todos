<?php

namespace Fixture;

/*
 * @property UserFixture $user
 */

class Database 
{
    public function __construct() 
    {
        $this->user = new UserFixture();
    }
}
