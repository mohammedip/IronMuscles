<?php

namespace App\Repositories;

use App\Models\User;


interface AuthRepositoryInterface{


    public function findByEmail($email);

    public function create(array $data);

    public function update(array $data, User $user);

}