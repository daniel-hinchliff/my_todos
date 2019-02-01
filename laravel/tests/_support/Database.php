<?php

/**
 * @property Fixture\UserFixture $user
 * @property Fixture\TodoFixture $todo
 */

class Database 
{
    public function __construct() 
    {
        $this->user = new Fixture\UserFixture();
        $this->todo = new Fixture\TodoFixture();
    }
}
