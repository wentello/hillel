<?php

namespace Hillel;

final class User extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    static public function find($id)
    {
        $user = new User();
        $user->findUser($id);

        return $user;
    }

    public function save()
    {
        if ($this->id) {
            $this->update();
        } else {
            $this->create();
        }
        return $this;
    }
}