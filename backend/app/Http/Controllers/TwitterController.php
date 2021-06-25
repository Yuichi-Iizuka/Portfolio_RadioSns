<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Program\ProgramRepositoryInterface;

class TwitterController extends Controller
{
    protected $programRepository;

    public function __construct(ProgramRepositoryInterface $programRepository)
    {
        $this->programRepository = $programRepository;
    }
    /** 
     *番組情報を取得する
     *
     *@param int $id 
     *@return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $program = $this->programRepository->findDataById($id);

        return view('program.timeline', compact('program'));
    }

    /** 
     *TwitterAPIを経由してTweetを取得する
     *
     *@param \Illuminate\Http\Request  $request
     *@param int id
     *@return array
     */

    public function getTimeline(Request $request, $id)
    {
        // 番組を検索
        $program = $this->programRepository->findDataById($id);

        // 取得した番組のログ
        \Log::info('program="' . $program . '"');

        // 変数に格納する
        $time = $request->clock;
        $start_time = $program->start_time;
        $start_date = $program->start_date;

        // 番組のスタート時間と経過時間を足し算する
        function getSumTime($aaa, $time)
        {
            $aaatime = explode(':', $aaa);
            $timetime = explode(':', $time);

            return date('H:i:s', mktime($aaatime[0] + $timetime[0], $aaatime[1] + $timetime[1], $aaatime[2] + $timetime[2]));
        };

        // getSumTime()で取得した値を変数に格納
        $resulttime = getSumTime($start_time, $time);

        \Log::info('program->time="' . $program->start_time . '"');
        \Log::info('resulttime="' . $resulttime . '"');

        // 番組タグに'#'をつける
        $word = '#' . $program->tag;
        \Log::info('word="' . $word . '"');

        // 検索クエリ用に成形
        $since = $start_date . '_' . $start_time . '_JST';
        \Log::info('since="' . $since . '"');
        $until = $start_date . '_' . $resulttime . '_JST';
        \Log::info('until="' . $until .  '"');


        // TwitterAPIでツイートを10件取得
        $result = \Twitter::get('search/tweets', ['q' => $word, 'since' => $since, 'until' => $until, 'count' => 10,]);


        return response()->json($result);
    }
}
