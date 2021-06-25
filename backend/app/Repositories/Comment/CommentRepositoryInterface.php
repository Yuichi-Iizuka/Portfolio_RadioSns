<?php

namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{

  public function createData($data,$id);

  public function deleteData($request,$id);

}