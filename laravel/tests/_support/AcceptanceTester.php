<?php


/**
 * 
 * @property Fixture\Database $db
 * @property App\User $user
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
        
        $this->db = new Fixture\Database();
        
        $this->user = $this->db->user->create();
    }
    
    public function amLoggedIn()
    {
        $password = $this->db->user->passwordForUser($this->user->name);
        
        $this->login->login($this->user->email, $password);
    }
    
    public function amOnTodoList()
    {
        $this->amLoggedIn();
    }
}
