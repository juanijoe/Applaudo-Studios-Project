<?php

namespace App\Services;

class IsAdmin
{
    public function verify($user)
    {
        return $user->roles()->first()->name;
    }
}
