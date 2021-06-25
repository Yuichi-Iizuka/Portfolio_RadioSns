<?php

namespace App\Repositories\User;

use App\User;

class UserRepository implements UserRepositoryInterface
{
  public function getUser($id)
  {
    return User::find($id);
  }
  
  public function updateUserinfo($data,$id)
  {
    User::find($id)->update($data);
  }

  public function getUserbyEmail($email)
  {
    return User::where('email',$email)->first();
  }

  public function createUser($data)
  {
    return User::create($data);
  }
}