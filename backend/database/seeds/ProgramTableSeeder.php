<?php

use Illuminate\Database\Seeder;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'title' => '三四郎のオールナイトニッポン0',
            'body' => 'ひゃ〜〜おもしれ〜い！',
            'tag' => '三四郎ANN0',
            'image' => 'pathkari',
            
        ];
        DB::table('programs')->insert($param);
    }
}
