<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface{


    public function findByEmail($email){

        return User::where('email', $email)->first();
    }

    // public function findByToken($email){

    //     return User::where('token', $email)->first();
    // }

    public function create(array $data){

        return User::create($data);
    }

    public function update(array $data, User $user){

        return $user->update($data);
    }


}