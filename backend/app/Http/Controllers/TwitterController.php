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


    public function getTimeline(Request $request,$id)
    {
        $program = Program::find($id);
        // \Log::info('program="'.$program.'"');
        $time = $request->clock;
        $start_time = $program->start_time;
        $start_date = $program->start_date;

        function getSumTime($aaa,$time){
            $aaatime = explode(':',$aaa);
            $timetime = explode(':',$time);

            return date('H:i:s',mktime($aaatime[0] + $timetime[0],$aaatime[1] + $timetime[1],$aaatime[2] + $timetime[2]));
        };

        $resulttime = getSumTime($start_time,$time);
        
        // \Log::info('program->time="' . $program->start_time . '"');
        // \Log::info('resulttime="' . $resulttime . '"');
        

        $word = '#'. $program->tag;
        // \Log::info('word="' . $word . '"');
        $since = $start_date . '_' .  $start_time . '_JST' ;
        // \Log::info('since="' . $since . '"');
        $until = $start_date . '_' . $resulttime . '_JST';
        // \Log::info('until="' . $until .  '"');



        $result = \Twitter::get('search/tweets',['q' => $word,'since' => $since,'until' => $until,'count' => 10,]);

        
        return response()->json($result);
    }
}
