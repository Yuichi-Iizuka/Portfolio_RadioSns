<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\User;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    /**
    *番組をいいねする
    *
    *@param  \Illuminate\Http\Request  $request
    *@param  Program $program
    *
    */

    public function store(Request $request, Program $program)
    {
        $program->likes()->attach($request->user()->id);
        
        return redirect()->route('program.show',$program->id);
    }

    /**
    *番組のいいねを取り消す
    *
    *@param  \Illuminate\Http\Request  $request
    *@param  Program $program
    *
    */

    public function destroy(Request $request, Program $program)
    {
        $program->likes()->detach($request->user()->id);

        return redirect()->route('program.show',$program->id);
    }

}
