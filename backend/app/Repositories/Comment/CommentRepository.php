<?php

namespace App\Repositories\Comment;

use App\Program;


class CommmentRepository implements CommentRepositoryInterface
{
  
  public function createData($data,$id)
  {
    Program::find($id)->comments()->create($data);
    return Program::create($data);
  }

  public function deleteData($request,$id)
  {
    $comment = Program::find($request->program_id)->comment()->where('id',$id)->first();
    $comment->delete();
  }

}