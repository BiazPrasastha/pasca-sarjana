<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function admin(User $user)
    {
        $user->load('role');
        return $user->role->name == 'admin';
    }

    public function lecturer(User $user)
    {
        $user->load('role');
        return $user->role->name == 'dosen';
    }

    public function student(User $user)
    {
        $user->load('role');
        return $user->role->name == 'mahasiswa';
    }
}
