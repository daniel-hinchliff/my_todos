<?php

namespace Page;

class TodoEdit extends Page 
{
    const SUBMIT = 'button.btn-primary';
    
    public function setDescription($text)
    {
        $this->tester->fillField('description', $text);
    }
    
    public function clickSubmit()
    {
        $this->tester->click(self::SUBMIT);
    }
}
