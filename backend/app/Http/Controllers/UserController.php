<?php

namespace App\Http\Controllers;

use App\Program;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Program\ProgramRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;
    protected $programRepository;
    

    public function __construct(UserRepositoryInterface $userRepository,ProgramRepositoryInterface $programRepository) {
        $this->userRepository = $userRepository;
        $this->programRepository = $programRepository;
    }
    

    /**
     * ユーザー情報と作成した番組を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getUser($id);
        \Log::info('$user="' . $user . '"');
        // $id = $user->id;
        $program = $this->programRepository->findUserCreateByID($id);
        \Log::info('$program="' . $program . '"');
        return view('mypage.mypage',compact('user','program'));
    }

    /**
     *ユーザー情報といいねした番組を取得
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function showLike($id)
    {
        $user = $this->userRepository->getUser($id);
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
    public function edit($id)
    {
        $user = $this->userRepository->getUser($id);
        // $this->authorize('update',$user);

        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,$id)
    {
        // $user = $user = $this->userRepository->getUser($name);

        // $this->authorize('update',$user);
        $form = $request->all();
        unset($form['_token']);
        // $user->fill($request->formparam())->save();
        // \Log::info('$data="' . $form . '"');
        $this->userRepository->updateUserinfo($form,$id);

        session()->flash('flash_message','編集しました');
        return redirect()->route('mypage.user',$id);

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
