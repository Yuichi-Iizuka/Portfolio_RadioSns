<?php

namespace Tests\Feature;

use App\User;
use App\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProgramControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 未ログイン時の番組一覧の表示テスト
     *
     * @return void
     */
    public function testGuestIndex()
    {
        $response = $this->get(route('program.index'));

        $response->assertStatus(200)
            ->assertViewIs('program.index')
            ->assertSee('番組作成')
            ->assertSee('ログイン')
            ->assertSee('ユーザー登録');
    }

    /**
     * ログイン時の番組一覧画面の表示テスト
     *
     * @return void
     */
    public function testAuthIndex()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('program.index'));

        $response->assertStatus(200)
            ->assertViewIs('program.index')
            ->assertSee('番組作成')
            ->assertSee($user->name)
            ->assertSee('ログアウト')
            ->assertSee('マイページ');
    }

    /**
     * 未ログイン時の番組作成画面の表示テスト
     *
     * @return void
     */
    public function testGuestProgramCreate()
    {
        $response = $this->get(route('program.create'));

        $response->assertStatus(200)
            ->assertViewIs('program.create')
            ->assertSee('ログイン')
            ->assertSee('すると作成できるようになります。');
    }

    /**
     * ログイン時の番組作成画面の表示テスト
     *
     * @return void
     */
    public function testAuthProgramCreate()
    {
        
        $user = factory(User::class)->create();

        $title = 'testANN';
        $body = 'testtesttest';
        $tag = 'testANN';
        $start_date = '2021-06-19';
        $start_time = '01:00:00';
        $user_id = $user->id;

        $response = $this->actingAs($user)->post(route(
            'program.store',
            [
                'title' => $title,
                'body' => $body,
                'tag' => $tag,
                'start_date' => $start_date,
                'start_time' => $start_time,
                'user_id' => $user_id,
            ]
        ));

        $this->assertDatabaseHas('programs', 
            [
            'title' => $title,
            'body' => $body,
            'tag' => $tag,
            'start_date' => $start_date,
            'start_time' => $start_time,
            'user_id' => $user_id
        ]);

        $response->assertRedirect(route('program.index'));
    }

    // /**
    //  * ログイン時の番組編集の表示テスト
    //  *
    //  * @return void
    //  */

    // public function testAuthProgramEdit()
    // {

    //     $this->withMiddleware();
    //     $program = factory(Program::class)->create();
    //     $user = $program->user;

    //     $response = $this->get(route('program.edit',$program->id));

    //     $response->assertStatus(200)->assertViewIs('program.edit',$program);
    // }

    // /**
    //  * ログイン時の番組編集の表示テスト
    //  *
    //  * @return void
    //  */
    // public function testAuthProgramUpdate()
    // {
    //     $this->withoutExceptionHandling();
    //     $program = factory(Program::class)->create();

    // }





    /**
     * ログイン時の番組削除の表示テスト
     *
     * @return void
     */

    public function testAuthProgramDelete()
    {
        $user = factory(User::class)->create();

        $title = 'テストのANN';
        $body = 'テストテスト';
        $tag = 'テストANN';
        $start_date = '2021-06-19';
        $start_time = '01:00:00';
        $user_id = $user->id;

        $program = Program::create([
            'title' => $title,
            'body' => $body,
            'tag' => $tag,
            'start_date' => $start_date,
            'start_time' => $start_time,
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->delete(route('program.destroy', $program->id));

        $this->assertDeleted('programs', [
            'title' => $title,
            'body' => $body,
            'tag' => $tag,
            'start_date' => $start_date,
            'start_time' => $start_time,
            'user_id' => $user_id
        ]);

        $response->assertRedirect(route('program.index'));
    }
}
