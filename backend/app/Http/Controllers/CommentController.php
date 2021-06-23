<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Repositories\Program\ProgramRepository;

class CommentController extends Controller
{

    protected $programRepository;

    public function __construct(ProgramRepository $programRepository)
    {
        $this->programRepository = $programRepository;
    }
    /**
     *番組に対してのコメントを作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $form = ['body' => $request->body,'user_id' => Auth::user()->id];
        $this->programRepository->createCommentData($form,$id);
        session()->flash('flash_message','コメントを投稿しました');
        return redirect()->route('program.show',$id);

    }

    /**
     * コメント削除機能
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {  
        $form = $request->program_id;
        $this->programRepository->deleteCommentData($form,$id);
        session()->flash('flash_message','コメントを削除しました');
        return redirect()->route('program.show',$request->program_id);
    }
}
