<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\User;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function store(Request $request, Program $program)
    {
        $program->likes()->attach($request->user()->id);

        return back();
    }

    public function destroy(Request $request, Program $program)
    {
        $program->likes()->detach($request->user()->id);

        return back();
    }

}
