<?php

namespace Fixture;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserFixture
{
    protected $passwords = [];
    
    public function create($data = [])
    {
        $user = new User($data + [
            'name' => str_random(20),
            'password' => str_random(10),
            'email' => str_random(20) . "@example.com"
        ]);
        
        $this->passwords[$user->name] = $user->password;
        $user->password = Hash::make($user->password);
        $user->save();
        
        return $user;
    }
    
    public function passwordForUser($name)
    {
        return $this->passwords[$name];
    }
}
