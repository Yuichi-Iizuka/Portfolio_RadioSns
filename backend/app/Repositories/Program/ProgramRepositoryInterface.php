<?php

namespace App\Repositories\Program;

interface ProgramRepositoryInterface
{

  public function getAllData();

  public function findDataById($id);

  public function createData($data);

  public function updateDateById($data,$id);

  public function deleteDataById($id);

  public function findUserCreateByID($id);

  public function createCommentData($data,$id);

  public function deleteCommentData($data,$id);

}