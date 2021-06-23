<?php

namespace App\Repositories\Program;

use App\Program;

class ProgramRepository implements ProgramRepositoryInterface
{
  public function getAllData()
  {
    return Program::orderBy('start_date','desc')->get();
  }

  public function findDataById($id)
  {
    return Program::find($id);
  }

  public function createData($data)
  {
    // $program = new Program;
    // $program->user_id = $id;
    // $program->fill($data)->save();
    Program::create($data);
  }

  public function updateDateById($data, $id)
  {
    Program::find($id)->update($data);
  }

  public function deleteDataById($id)
  {
    $program = Program::find($id);
    $program->delete();
  }

  public function findUserCreateByID($id)
  {
    return Program::where('user_id',$id)->get();
  }

  public function createCommentData($data, $id)
  {
    Program::find($id)->comments()->create($data);
  }

  public function deleteCommentData($data, $id)
  {
    $comment = Program::find($data)->comments()->where('id',$id)->first();
    $comment->delete();
  }
}