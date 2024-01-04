<?php

namespace App\Contracts\Services\Intefaces;

use App\Models\User;
use App\ValueObjects\Phone;
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
