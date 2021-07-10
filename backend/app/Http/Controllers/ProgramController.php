<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProgramMakeRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Program\ProgramRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    protected $programRepository;

    public function __construct(ProgramRepositoryInterface $programRepository)
    {
        $this->programRepository = $programRepository;
    }
    /**
     * 全番組を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = $this->programRepository->getAllData();
        return view('program.index', compact('program'));
    }

    /**
     * 番組作成フォーム
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program.create');
    }

    /**
     * 番組を作成する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramMakeRequest $request)
    {
        //s3へのアップロード
        $image = $request->file('image_path');
        $path = Storage::disk('s3')->putFile('programs', $image ,'public');
        $image_path = Storage::disk('s3')->url($path);

        $form = ['title' => $request->title, 'body' => $request->body, 'tag' => $request->tag, 'start_date' => $request->start_date, 'start_time' => $request->start_time, 'user_id' => Auth::user()->id, 'image_path' => $image_path];
        unset($form['_token']);
        $this->programRepository->createData($form);
        session()->flash('flash_message', '番組を作成しました');
        return redirect()->route('program.index');
    }

    /**
     * 番組の詳細を取得
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = $this->programRepository->findDataById($id);
        return view('program.detail', compact('program'));
    }

    /**
     * 番組の情報の編集ホーム
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = $this->programRepository->findDataById($id);
        return view('program.edit', compact('program'));
    }

    /**
     * 番組の編集した情報を保存する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = $request->all();
        unset($form['_token']);
        $this->programRepository->updateDateById($form, $id);
        session()->flash('flash_message', '番組を編集しました');
        return redirect('/program');
    }

    /**
     * 番組を削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->programRepository->deleteDataById($id);
        session()->flash('flash_message', '番組を削除しました');
        return redirect('/program');
    }
}
