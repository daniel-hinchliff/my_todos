<?php

namespace Page;

class TodoEdit extends Page 
{
    const SUBMIT = 'button.btn-primary';
        
    public function goToPage($id)
    {
        $this->tester->amOnPage("todo/$id");
    }
        
    public function setDescription($text)
    {
        $this->tester->fillField('description', $text);
    }
    
    public function setDone($bool)
    {
        if ($bool) {
            $this->tester->checkOption('done');
        } else {
            $this->tester->uncheckOption('done');
        }
    }
    
    public function clickSubmit()
    {
        $this->tester->click(self::SUBMIT);
    }
}
