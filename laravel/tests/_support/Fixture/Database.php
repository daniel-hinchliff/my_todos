<?php

namespace Fixture;

/*
 * @property UserFixture $user
 * @property TodoFixture $todo
 */

class Database 
{
    public function __construct() 
    {
        $this->user = new UserFixture();
        $this->todo = new TodoFixture();
    }
}
