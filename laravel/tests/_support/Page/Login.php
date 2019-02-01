<?php

namespace Page;

class Login extends Page
{ 
   const URL = '/login';
   const SUBMIT = 'button.btn-primary';
   
   public function login($email, $password)
   {
        $this->tester->amOnPage(self::URL);
       
        $this->seeTitle('Login');
       
        $this->tester->submitForm('form', [
            'password' => $password,
            'email' => $email,
        ], self::SUBMIT);
       
        $this->seeTitle('Todos');
   }
}
