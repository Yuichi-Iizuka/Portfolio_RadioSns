<?php

namespace App\Http\Controllers;

use App\Program;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }
    /**
     * ユーザー情報と作成した番組を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $name)
    {
        $user = User::where('name',$name)->first();
        \Log::info('$user="' . $user . '"');
        $id = $user->id;
        $program = Program::where('user_id',$id)->get();
        \Log::info('$program="' . $program . '"');
        return view('mypage.mypage',compact('user','program'));
    }

    /**
     *ユーザー情報といいねした番組を取得
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function showLike(string $name)
    {
        $user = User::where('name',$name)->first();
        $program = $user->likes;
        \Log::info('$program="' . $program . '"');
        return view('mypage.likes',compact('program','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function edit(string $name)
    {
        $user = User::where('name',$name)->first();

        $this->authorize('update',$user);

        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,string $name)
    {
        $user = User::where('name',$name)->first();

        $this->authorize('update',$user);

        $user->fill($request->formparam())->save();

        session()->flash('flash_message','編集しました');
        return redirect()->route('mypage.user',$name);

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
