<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{

  public function getUser($id);

  public function updateUserinfo($data,$id);

  public function getUserbyEmail($email);

  public function createUser($data);

}