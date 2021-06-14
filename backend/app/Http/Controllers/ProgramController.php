<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProgramMakeRequest;
use App\Program;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\User;


class ProgramController extends Controller
{
    /**
     * 全番組を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = Program::orderBy('start_date','desc')->get();
        \Log::info('$program="'.$program.'"');
        return view('program.index',compact('program'));
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
        $program = new Program;
        $form = $request->all();
        unset($form['_token']);
        $program->user_id = Auth::user()->id;
        $program->fill($form)->save();
        session()->flash('flash_message','番組を作成しました');
        return redirect('/program');
    }

    /**
     * 番組の詳細を取得
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);
        return view('program.detail',compact('program'));
    }

    /**
     * 番組の情報の編集ホーム
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::find($id);
        return view('program.edit',compact('program'));
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
        $program = Program::find($id);
        $program->title = $request->title;
        $program->body = $request->body;
        $program->tag = $request->tag;
        $program->start_date = $request->start_date;
        $program->start_time = $request->start_time;
        $program->save();
        session()->flash('flash_message','番組を編集しました');
        
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
        $program = Program::find($id);
        $program->delete();
        session()->flash('flash_message','番組を削除しました');
        return redirect('/program');
    }
}
