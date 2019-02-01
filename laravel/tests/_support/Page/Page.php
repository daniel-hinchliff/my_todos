<?php

namespace Page;

/**
 * @property \AcceptanceTester $tester
 */

class Page 
{
    const TITLE = '.card-header';
    
    public function __construct(\AcceptanceTester $tester) 
    {
        $this->tester = $tester;
    }
    
    public function seeTitle($text)
    {
        $this->waitForText($text, self::TITLE);
    }
    
    public function waitForText($text, $context = null)
    {
        $this->tester->waitForText($text, null, $context);
    }
}
