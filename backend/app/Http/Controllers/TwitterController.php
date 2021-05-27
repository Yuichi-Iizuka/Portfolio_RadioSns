<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{
    public function index($id)
    {
    
    $program = Program::find($id);

    return view('program.timeline',compact('program'));
    }

    public function getTimeline(Request $request)
    {   
        $program = Program::find($request->id);
        $word = $program->tag;
        $since = ['2021-05-22_' + $request->clock  + 'JST'];
        $until = ['2021-05-22_03:08:00_JST'];

        $result = \Twitter::get('search/tweets',['q' => $word,'since' => $since,'until' => $until,'count' => 10,]);

        
        return response()->json($result);
    }
}
