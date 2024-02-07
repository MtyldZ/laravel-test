<?php

namespace App\Services;


use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function create($name, $email, $username, $password): User
    {
        $user = new User();
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }

    public function updateUser($user, $name, $email, $password)
    {
    }

    public function deleteUser($user)
    {
    }
}
