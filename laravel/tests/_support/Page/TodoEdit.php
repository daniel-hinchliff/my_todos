<?php

namespace Page;

class TodoEdit extends Page 
{
    const SUBMIT = 'button.btn-primary';
    
    public function setDescription($text)
    {
        $this->tester->fillField('description', $text);
    }
    
    public function setDone($bool)
    {
        $this->tester->checkOption('done');
    }
    
    public function clickSubmit()
    {
        $this->tester->click(self::SUBMIT);
    }
}
