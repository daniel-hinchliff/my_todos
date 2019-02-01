<?php


/**
 * Actor
 * @property App\User $user
 * @property string $password
 * 
 * Page Drivers
 * @property Page\Login $login 
 * @property Page\TodoList $todos 
 * @property Page\TodoEdit $todo_edit 
 * 
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    public function __construct(\Codeception\Scenario $scenario) 
    {
        parent::__construct($scenario);
        
        $this->login = new Page\Login($this);
        $this->todos = new Page\TodoList($this);
        $this->todo_edit = new Page\TodoEdit($this);
    }
    
    public function setUser($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }
    
    public function amLoggedIn()
    {
        $this->login->login($this->user->email, $this->password);
    }
    
    public function amOnTodoList()
    {
        $this->amLoggedIn();
    }
}
