<?php

namespace Hillel;

final class User extends Model
{
    public $name;
    public $email;

    static public function find($id)
    {
        $user = new User();
        $user->findUser($id);

        return $user;
    }
}