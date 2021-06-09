<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Program;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{

    /**
     * ユーザー情報と作成した番組を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $program = Program::where('user_id',$userId)->get();
        \Log::info('$program="' . $program . '"');
        return view('mypage.mypage',compact('user','program'));
    }

    /**
     *ユーザー情報といいねした番組を取得
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showLike(Request $request)
    {
        $user = Auth::user();
        $program = $user->likes;
        \Log::info('$program="' . $program . '"');
        return view('mypage.likes',compact('program','user'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
