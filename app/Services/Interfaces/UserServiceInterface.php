<?php

namespace App\Services\Interfaces;

use App\Models\User;
use LogicException;

interface UserServiceInterface
{
    /**
     * @param $name , $email, $username, $password
     * @return User
     * @throws LogicException
     */
    public function create($name, $email, $username, $password): User;
}
